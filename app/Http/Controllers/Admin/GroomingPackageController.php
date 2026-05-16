<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GroomingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GroomingPackageController extends Controller
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
     * Display the grooming packages index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $packages = GroomingPackage::latest()->get();
        return view('admin.grooming-package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new grooming package.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('admin.grooming-package.create');
    }

    /**
     * Store a newly created grooming package in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:9999.99',
            'description' => 'required|string',
            'is_active' => 'boolean',
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);

        GroomingPackage::create($validated);

        return redirect()->route('admin.grooming-package.index')
            ->with('success', 'Grooming package created successfully!');
    }

    /**
     * Show the form for editing the specified grooming package.
     *
     * @param  \App\Models\GroomingPackage  $grooming_package
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(GroomingPackage $grooming_package)
    {
        return view('admin.grooming-package.edit', compact('grooming_package'));
    }

    /**
     * Update the specified grooming package in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroomingPackage  $grooming_package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, GroomingPackage $grooming_package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0|max:9999.99',
            'description' => 'required|string',
            'is_active' => 'boolean',
        ]);

        // Generate slug from name
        $validated['slug'] = Str::slug($validated['name']);

        $grooming_package->update($validated);

        return redirect()->route('admin.grooming-package.index')
            ->with('success', 'Grooming package updated successfully!');
    }

    /**
     * Remove the specified grooming package from storage.
     *
     * @param  \App\Models\GroomingPackage  $grooming_package
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(GroomingPackage $grooming_package)
    {
        $grooming_package->delete();

        return redirect()->route('admin.grooming-package.index')
            ->with('success', 'Grooming package deleted successfully!');
    }
}
