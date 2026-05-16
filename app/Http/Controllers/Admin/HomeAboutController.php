<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAbout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeAboutController extends Controller
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
     * Display the home about index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $abouts = HomeAbout::latest()->get();
        return view('admin.homeabout.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new home about.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.homeabout.create');
    }

    /**
     * Store a newly created home about in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'section_heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'year_of_experience' => 'nullable|string|max:255',
            'right_heading_1' => 'nullable|string|max:255',
            'right_description_1' => 'nullable|string',
            'right_heading_2' => 'nullable|string|max:255',
            'right_description_2' => 'nullable|string',
            'right_heading_3' => 'nullable|string|max:255',
            'right_description_3' => 'nullable|string',
            'right_heading_4' => 'nullable|string|max:255',
            'right_description_4' => 'nullable|string',
        ]);

        HomeAbout::create($validated);

        return redirect()->route('admin.homeabout.index')
            ->with('success', 'Home about section created successfully.');
    }

    /**
     * Show the form for editing the specified home about.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit($id)
    {
        $about = HomeAbout::findOrFail($id);
        return view('admin.homeabout.edit', compact('about'));
    }

    /**
     * Update the specified home about in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $about = HomeAbout::findOrFail($id);

        $validated = $request->validate([
            'section_heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'year_of_experience' => 'nullable|string|max:255',
            'right_heading_1' => 'nullable|string|max:255',
            'right_description_1' => 'nullable|string',
            'right_heading_2' => 'nullable|string|max:255',
            'right_description_2' => 'nullable|string',
            'right_heading_3' => 'nullable|string|max:255',
            'right_description_3' => 'nullable|string',
            'right_heading_4' => 'nullable|string|max:255',
            'right_description_4' => 'nullable|string',
        ]);

        $about->update($validated);

        return redirect()->route('admin.homeabout.index')
            ->with('success', 'Home about section updated successfully.');
    }

    /**
     * Remove the specified home about from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $about = HomeAbout::findOrFail($id);
        $about->delete();

        return redirect()->route('admin.homeabout.index')
            ->with('success', 'Home about section deleted successfully.');
    }
}


