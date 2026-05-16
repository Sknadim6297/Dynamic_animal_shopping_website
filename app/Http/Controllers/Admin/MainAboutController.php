<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MainAboutController extends Controller
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
     * Display the main about index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $mainAbouts = MainAbout::latest()->get();
        return view('admin.mainabout.index', compact('mainAbouts'));
    }

    /**
     * Show the form for creating a new main about.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.mainabout.create');
    }

    /**
     * Store a newly created main about in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'main_heading' => 'nullable|string|max:255',
            'main_heading_highlight' => 'nullable|string|max:255',
            'main_description' => 'nullable|string',
            'video_url' => 'nullable|url|max:255',
            'how_we_work_label' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vision_heading' => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission_heading' => 'nullable|string|max:255',
            'mission_description' => 'nullable|string',
            'why_choose_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'why_choose_heading' => 'nullable|string|max:255',
            'why_choose_phone_label' => 'nullable|string|max:255',
            'why_choose_community_text' => 'nullable|string|max:255',
            'why_choose_items' => 'nullable|array',
            'why_choose_items.*' => 'nullable|string',
            'callout_description' => 'nullable|string',
        ]);

        // Handle image uploads
        if ($request->hasFile('vision_image')) {
            $validated['vision_image'] = $this->uploadImage($request->file('vision_image'), 'about');
        }

        if ($request->hasFile('mission_image')) {
            $validated['mission_image'] = $this->uploadImage($request->file('mission_image'), 'about');
        }

        if ($request->hasFile('why_choose_image')) {
            $validated['why_choose_image'] = $this->uploadImage($request->file('why_choose_image'), 'about');
        }

        // Filter out empty items from why_choose_items
        if (isset($validated['why_choose_items'])) {
            $validated['why_choose_items'] = array_filter($validated['why_choose_items'], function($item) {
                return !empty($item);
            });
        }

        MainAbout::create($validated);

        return redirect()->route('admin.mainabout.index')
            ->with('success', 'Main about section created successfully.');
    }

    /**
     * Show the form for editing the specified main about.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $mainAbout = MainAbout::findOrFail($id);
        return view('admin.mainabout.edit', compact('mainAbout'));
    }

    /**
     * Update the specified main about in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $mainAbout = MainAbout::findOrFail($id);

        $validated = $request->validate([
            'main_heading' => 'nullable|string|max:255',
            'main_heading_highlight' => 'nullable|string|max:255',
            'main_description' => 'nullable|string',
            'video_url' => 'nullable|url|max:255',
            'how_we_work_label' => 'nullable|string|max:255',
            'years_of_experience' => 'nullable|string|max:255',
            'vision_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'vision_heading' => 'nullable|string|max:255',
            'vision_description' => 'nullable|string',
            'mission_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'mission_heading' => 'nullable|string|max:255',
            'mission_description' => 'nullable|string',
            'why_choose_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'why_choose_heading' => 'nullable|string|max:255',
            'why_choose_phone_label' => 'nullable|string|max:255',
            'why_choose_community_text' => 'nullable|string|max:255',
            'why_choose_items' => 'nullable|array',
            'why_choose_items.*' => 'nullable|string',
            'callout_description' => 'nullable|string',
        ]);

        // Handle image uploads and deletions
        if ($request->hasFile('vision_image')) {
            // Delete old image
            if ($mainAbout->vision_image && File::exists(public_path($mainAbout->vision_image))) {
                File::delete(public_path($mainAbout->vision_image));
            }
            $validated['vision_image'] = $this->uploadImage($request->file('vision_image'), 'about');
        }

        if ($request->hasFile('mission_image')) {
            if ($mainAbout->mission_image && File::exists(public_path($mainAbout->mission_image))) {
                File::delete(public_path($mainAbout->mission_image));
            }
            $validated['mission_image'] = $this->uploadImage($request->file('mission_image'), 'about');
        }

        if ($request->hasFile('why_choose_image')) {
            if ($mainAbout->why_choose_image && File::exists(public_path($mainAbout->why_choose_image))) {
                File::delete(public_path($mainAbout->why_choose_image));
            }
            $validated['why_choose_image'] = $this->uploadImage($request->file('why_choose_image'), 'about');
        }

        // Filter out empty items from why_choose_items
        if (isset($validated['why_choose_items'])) {
            $validated['why_choose_items'] = array_filter($validated['why_choose_items'], function($item) {
                return !empty($item);
            });
        }

        $mainAbout->update($validated);

        return redirect()->route('admin.mainabout.index')
            ->with('success', 'Main about section updated successfully.');
    }

    /**
     * Remove the specified main about from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $mainAbout = MainAbout::findOrFail($id);

        // Delete all images
        $images = ['vision_image', 'mission_image', 'why_choose_image'];
        foreach ($images as $imageField) {
            if ($mainAbout->$imageField && File::exists(public_path($mainAbout->$imageField))) {
                File::delete(public_path($mainAbout->$imageField));
            }
        }

        $mainAbout->delete();

        return redirect()->route('admin.mainabout.index')
            ->with('success', 'Main about section deleted successfully.');
    }

    /**
     * Upload an image to the public directory.
     *
     * @param  \Illuminate\Http\UploadedFile  $file
     * @param  string  $folder
     * @return string
     */
    private function uploadImage($file, $folder = 'uploads')
    {
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $folder . '/images/';
        $file->move(public_path($path), $filename);
        return $path . $filename;
    }
}

