<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class HomeServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the home service index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = HomeService::latest()->get();
        return view('admin.homeservice.index', compact('services'));
    }

    /**
     * Show the form for creating a new home service.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.homeservice.create');
    }

    /**
     * Convert video URL to embed format
     *
     * @param  string  $url
     * @return string
     */
    private function convertToEmbedUrl($url)
    {
        if (empty($url)) {
            return $url;
        }

        // Handle YouTube URLs
        if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $url, $matches)) {
            return 'https://www.youtube.com/embed/' . $matches[1] . '?rel=0&modestbranding=1';
        }
        
        // If already a YouTube embed URL, clean and format it
        if (strpos($url, 'youtube.com/embed') !== false) {
            // Remove autoplay if exists (Magnific Popup handles it)
            $url = preg_replace('/[?&]autoplay=\d+/', '', $url);
            // Remove existing parameters and add proper ones
            $url = preg_replace('/\?.*$/', '', $url);
            return $url . '?rel=0&modestbranding=1';
        }

        // Handle Vimeo URLs - convert regular Vimeo URL to player URL
        if (preg_match('/vimeo\.com\/(\d+)/', $url, $matches)) {
            return 'https://player.vimeo.com/video/' . $matches[1];
        }
        
        // If already a Vimeo player URL, clean it
        if (strpos($url, 'player.vimeo.com') !== false) {
            // Remove autoplay if exists
            $url = preg_replace('/[?&]autoplay=\d+/', '', $url);
            return $url;
        }

        // Return as is for other formats
        return $url;
    }

    /**
     * Store a newly created home service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video' => 'nullable|url|max:500',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/webm,video/quicktime|max:51200',
        ]);

        if (empty($validated['video']) && !$request->hasFile('video_file')) {
            throw ValidationException::withMessages([
                'video' => 'Please upload a video file or provide a video URL.',
            ]);
        }

        if ($request->hasFile('video_file')) {
            $validated['video_file'] = $request->file('video_file')->store('home-services', 'public');
        }

        if ($request->hasFile('background_image')) {
            $validated['background_image'] = $request->file('background_image')->store('home-services', 'public');
        }

        if (!empty($validated['video'])) {
            $validated['video'] = $this->convertToEmbedUrl($validated['video']);
        }

        HomeService::create($validated);

        return redirect()->route('admin.homeservice.index')
            ->with('success', 'Home service created successfully.');
    }

    /**
     * Show the form for editing the specified home service.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $service = HomeService::findOrFail($id);
        return view('admin.homeservice.edit', compact('service'));
    }

    /**
     * Update the specified home service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $service = HomeService::findOrFail($id);

        $validated = $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'video' => 'nullable|url|max:500',
            'video_file' => 'nullable|file|mimetypes:video/mp4,video/webm,video/quicktime|max:51200',
        ]);

        if (empty($validated['video']) && !$request->hasFile('video_file') && empty($service->video) && empty($service->video_file)) {
            throw ValidationException::withMessages([
                'video' => 'Please upload a video file or provide a video URL.',
            ]);
        }

        if ($request->hasFile('video_file')) {
            if ($service->video_file) {
                Storage::disk('public')->delete($service->video_file);
            }

            $validated['video_file'] = $request->file('video_file')->store('home-services', 'public');
        }

        if ($request->hasFile('background_image')) {
            if ($service->background_image) {
                Storage::disk('public')->delete($service->background_image);
            }
            $validated['background_image'] = $request->file('background_image')->store('home-services', 'public');
        }

        if (!empty($validated['video'])) {
            $validated['video'] = $this->convertToEmbedUrl($validated['video']);
        }

        $service->update($validated);

        return redirect()->route('admin.homeservice.index')
            ->with('success', 'Home service updated successfully.');
    }

    /**
     * Remove the specified home service from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $service = HomeService::findOrFail($id);

        if ($service->video_file) {
            Storage::disk('public')->delete($service->video_file);
        }

        $service->delete();

        return redirect()->route('admin.homeservice.index')
            ->with('success', 'Home service deleted successfully.');
    }
}

