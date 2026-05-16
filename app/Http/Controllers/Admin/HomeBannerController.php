<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeBannerController extends Controller
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
     * Display the home banner index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = HomeBanner::latest()->get();
        return view('admin.homebanner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new home banner.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.homebanner.create');
    }

    /**
     * Store a newly created home banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'nullable|string|max:255',
            'mid_heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/banners');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $validated['banner_image'] = 'uploads/banners/' . $imageName;
        }

        HomeBanner::create($validated);

        return redirect()->route('admin.homebanner.index')
            ->with('success', 'Home banner created successfully.');
    }

    /**
     * Show the form for editing the specified home banner.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $banner = HomeBanner::findOrFail($id);
        return view('admin.homebanner.edit', compact('banner'));
    }

    /**
     * Update the specified home banner in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $banner = HomeBanner::findOrFail($id);

        $validated = $request->validate([
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'heading' => 'nullable|string|max:255',
            'mid_heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('banner_image')) {
            // Delete old image
            if ($banner->banner_image && File::exists(public_path($banner->banner_image))) {
                File::delete(public_path($banner->banner_image));
            }
            
            $image = $request->file('banner_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/banners');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $validated['banner_image'] = 'uploads/banners/' . $imageName;
        }

        $banner->update($validated);

        return redirect()->route('admin.homebanner.index')
            ->with('success', 'Home banner updated successfully.');
    }

    /**
     * Remove the specified home banner from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $banner = HomeBanner::findOrFail($id);

        // Delete image if exists
        if ($banner->banner_image && File::exists(public_path($banner->banner_image))) {
            File::delete(public_path($banner->banner_image));
        }

        $banner->delete();

        return redirect()->route('admin.homebanner.index')
            ->with('success', 'Home banner deleted successfully.');
    }
}

