<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeaderSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeaderController extends Controller
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
     * Display the header settings edit page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit()
    {
        $headerSettings = HeaderSettings::firstOrCreate([]);
        return view('admin.header.edit', compact('headerSettings'));
    }

    /**
     * Update the header settings in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'address' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:500',
            'social_text' => 'nullable|string|max:255',
            'facebook_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_white' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo_footer' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'breadcrumb_bg' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $headerSettings = HeaderSettings::firstOrCreate([]);

        // Handle logo uploads
        $uploadPath = public_path('uploads/logos');
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Handle logo_dark upload
        if ($request->hasFile('logo_dark')) {
            // Delete old logo if exists
            if ($headerSettings->logo_dark && File::exists(public_path($headerSettings->logo_dark))) {
                File::delete(public_path($headerSettings->logo_dark));
            }
            
            $image = $request->file('logo_dark');
            $imageName = 'logo_dark_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $validated['logo_dark'] = 'uploads/logos/' . $imageName;
        } else {
            unset($validated['logo_dark']);
        }

        // Handle logo_white upload
        if ($request->hasFile('logo_white')) {
            // Delete old logo if exists
            if ($headerSettings->logo_white && File::exists(public_path($headerSettings->logo_white))) {
                File::delete(public_path($headerSettings->logo_white));
            }
            
            $image = $request->file('logo_white');
            $imageName = 'logo_white_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $validated['logo_white'] = 'uploads/logos/' . $imageName;
        } else {
            unset($validated['logo_white']);
        }

        // Handle logo_footer upload
        if ($request->hasFile('logo_footer')) {
            // Delete old logo if exists
            if ($headerSettings->logo_footer && File::exists(public_path($headerSettings->logo_footer))) {
                File::delete(public_path($headerSettings->logo_footer));
            }
            
            $image = $request->file('logo_footer');
            $imageName = 'logo_footer_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move($uploadPath, $imageName);
            $validated['logo_footer'] = 'uploads/logos/' . $imageName;
        } else {
            unset($validated['logo_footer']);
        }

        // Handle breadcrumb background upload
        if ($request->hasFile('breadcrumb_bg')) {
            // Delete old image if exists
            if ($headerSettings->breadcrumb_bg && File::exists(public_path($headerSettings->breadcrumb_bg))) {
                File::delete(public_path($headerSettings->breadcrumb_bg));
            }

            $image = $request->file('breadcrumb_bg');
            $imageName = 'breadcrumb_bg_' . time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $uploadPathBg = public_path('uploads/breadcrumbs');
            if (!File::exists($uploadPathBg)) {
                File::makeDirectory($uploadPathBg, 0755, true);
            }
            $image->move($uploadPathBg, $imageName);
            $validated['breadcrumb_bg'] = 'uploads/breadcrumbs/' . $imageName;
        } else {
            unset($validated['breadcrumb_bg']);
        }

        $headerSettings->update($validated);

        return redirect()->route('admin.header.edit')
            ->with('success', 'Header settings updated successfully.');
    }
}
