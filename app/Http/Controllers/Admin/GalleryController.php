<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
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
     * Display the gallery index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new gallery item.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created gallery item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'images' => 'required|array|min:1',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pet_name' => 'required|string|max:255',
            'gallery_category' => 'nullable|in:bird,cat,dog,kitten',
            'pet_type' => 'nullable|in:dog,cat',
        ]);

        $galleryCategory = $validated['gallery_category'] ?? $validated['pet_type'] ?? null;

        if (!$galleryCategory) {
            return back()->withErrors(['gallery_category' => 'Category is required.'])->withInput();
        }

        $uploadedImages = [];

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            $uploadPath = public_path('uploads/galleries');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move($uploadPath, $imageName);
                $uploadedImages[] = 'uploads/galleries/' . $imageName;
            }
        }

        Gallery::create([
            'images' => $uploadedImages,
            'pet_name' => $validated['pet_name'],
            'pet_type' => $this->resolveLegacyPetType($galleryCategory),
            'gallery_category' => $galleryCategory,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item created successfully.');
    }

    /**
     * Show the form for editing the specified gallery item.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.gallery.edit', compact('gallery'));
    }

    /**
     * Update the specified gallery item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $validated = $request->validate([
            'images' => 'nullable|array',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'pet_name' => 'required|string|max:255',
            'gallery_category' => 'nullable|in:bird,cat,dog,kitten',
            'pet_type' => 'nullable|in:dog,cat',
            'existing_images' => 'nullable|array',
            'existing_images.*' => 'nullable|string',
        ]);

        $galleryCategory = $validated['gallery_category'] ?? $validated['pet_type'] ?? null;

        if (!$galleryCategory) {
            return back()->withErrors(['gallery_category' => 'Category is required.'])->withInput();
        }

        $images = $gallery->images ?? [];

        // Handle existing images (keep those that are not removed)
        if ($request->has('existing_images')) {
            $images = $request->existing_images;
        } else {
            // If no existing images are sent, remove all old images
            if ($gallery->images) {
                foreach ($gallery->images as $oldImage) {
                    if (File::exists(public_path($oldImage))) {
                        File::delete(public_path($oldImage));
                    }
                }
            }
            $images = [];
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            $uploadPath = public_path('uploads/galleries');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }

            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '_' . $image->getClientOriginalName();
                $image->move($uploadPath, $imageName);
                $images[] = 'uploads/galleries/' . $imageName;
            }
        }

        // Delete removed images
        if ($gallery->images) {
            foreach ($gallery->images as $oldImage) {
                if (!in_array($oldImage, $images) && File::exists(public_path($oldImage))) {
                    File::delete(public_path($oldImage));
                }
            }
        }

        $gallery->update([
            'images' => $images,
            'pet_name' => $validated['pet_name'],
            'pet_type' => $this->resolveLegacyPetType($galleryCategory),
            'gallery_category' => $galleryCategory,
        ]);

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item updated successfully.');
    }

    /**
     * Remove the specified gallery item from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete all images if they exist
        if ($gallery->images) {
            foreach ($gallery->images as $image) {
                if (File::exists(public_path($image))) {
                    File::delete(public_path($image));
                }
            }
        }

        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('success', 'Gallery item deleted successfully.');
    }

    private function resolveLegacyPetType(string $galleryCategory): string
    {
        return in_array($galleryCategory, ['cat', 'kitten'], true) ? 'cat' : 'dog';
    }
}
