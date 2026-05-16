<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideoGallery;

class VideoGalleryController extends Controller
{
     public function index()
    {
        $videos = VideoGallery::latest()->get();
        return view('admin.video-gallery.index', compact('videos'));
    }

    public function create()
{
    return view('admin.video-gallery.create');
}

public function edit($id)
{
    $video = VideoGallery::findOrFail($id);
    return view('admin.video-gallery.edit', compact('video'));
}
    public function store(Request $request)
    {
        $request->validate([
            'pet_name' => 'nullable|string|max:255',
            'pet_type' => 'nullable|string|max:50',
            'video' => 'required|mimes:mp4,mov,avi|max:20480',
        ]);

        $data = $request->only(['pet_name', 'pet_type']);

        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $videoName = time() . '.' . $video->getClientOriginalExtension();
            $video->move(public_path('uploads/videos'), $videoName);

            $data['video'] = 'uploads/videos/' . $videoName;
        }

        VideoGallery::create($data);

        return back()->with('success', 'Video uploaded successfully!');
    }


    public function update(Request $request, $id)
    {
    $video = VideoGallery::findOrFail($id);

    $data = $request->only(['pet_name', 'pet_type']);

    if ($request->hasFile('video')) {

        // delete old video
        if ($video->video && file_exists(public_path($video->video))) {
            unlink(public_path($video->video));
        }

        $file = $request->file('video');
        $name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/videos'), $name);

        $data['video'] = 'uploads/videos/' . $name;
    }

    $video->update($data);

    return redirect()->route('admin.video.gallery')->with('success', 'Video updated successfully!');
    }

    public function destroy($id)
    {
        $video = VideoGallery::findOrFail($id);

        if ($video->video && file_exists(public_path($video->video))) {
            unlink(public_path($video->video));
        }

        $video->delete();

        return back()->with('success', 'Deleted successfully!');
    }
}
