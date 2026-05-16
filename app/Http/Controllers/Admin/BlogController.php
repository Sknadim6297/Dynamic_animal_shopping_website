<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
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
     * Display the blog index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new blog.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_heading' => 'required|string|max:255',
            'blog_details' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_category' => 'required|in:Accessories,Cats,Dogs,Lifestyle,Nutrition,Pet,Toys',
            'posted_by' => 'required|string|max:255',
            'posted_by_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posting_date' => 'required|date',
        ]);

        // Handle blog image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/blogs');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $validated['image'] = 'uploads/blogs/' . $imageName;
        }

        // Handle posted by image upload
        if ($request->hasFile('posted_by_image')) {
            $postedByImage = $request->file('posted_by_image');
            $postedByImageName = time() . '_posted_by_' . uniqid() . '.' . $postedByImage->getClientOriginalExtension();
            $uploadPath = public_path('uploads/blogs/posted_by');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            $postedByImage->move($uploadPath, $postedByImageName);
            $validated['posted_by_image'] = 'uploads/blogs/posted_by/' . $postedByImageName;
        }

        Blog::create($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog created successfully.');
    }

    /**
     * Show the form for editing the specified blog.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified blog in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'blog_heading' => 'required|string|max:255',
            'blog_details' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'blog_category' => 'required|in:Accessories,Cats,Dogs,Lifestyle,Nutrition,Pet,Toys',
            'posted_by' => 'required|string|max:255',
            'posted_by_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'posting_date' => 'required|date',
        ]);

        // Handle blog image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($blog->image && File::exists(public_path($blog->image))) {
                File::delete(public_path($blog->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('uploads/blogs');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            $image->move($uploadPath, $imageName);
            $validated['image'] = 'uploads/blogs/' . $imageName;
        } else {
            // Keep existing image if no new image is uploaded
            $validated['image'] = $blog->image;
        }

        // Handle posted by image upload
        if ($request->hasFile('posted_by_image')) {
            // Delete old image if exists
            if ($blog->posted_by_image && File::exists(public_path($blog->posted_by_image))) {
                File::delete(public_path($blog->posted_by_image));
            }

            $postedByImage = $request->file('posted_by_image');
            $postedByImageName = time() . '_posted_by_' . uniqid() . '.' . $postedByImage->getClientOriginalExtension();
            $uploadPath = public_path('uploads/blogs/posted_by');
            
            // Create directory if it doesn't exist
            if (!File::exists($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true);
            }
            
            $postedByImage->move($uploadPath, $postedByImageName);
            $validated['posted_by_image'] = 'uploads/blogs/posted_by/' . $postedByImageName;
        } else {
            // Keep existing image if no new image is uploaded
            $validated['posted_by_image'] = $blog->posted_by_image;
        }

        $blog->update($validated);

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog updated successfully.');
    }

    /**
     * Remove the specified blog from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete images if exist
        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }
        if ($blog->posted_by_image && File::exists(public_path($blog->posted_by_image))) {
            File::delete(public_path($blog->posted_by_image));
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')
            ->with('success', 'Blog deleted successfully.');
    }
}
