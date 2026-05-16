<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a newly created contact message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:255',
                'comment' => 'required|string',
            ]);

            $contact = Contact::create([
                'first_name' => $validated['name'],
                'last_name' => $validated['lastname'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'message' => $validated['comment'],
                'status' => 'new',
            ]);

            if ($contact) {
                return redirect()->back()
                    ->with('success', 'Thank you for contacting us! We will get back to you soon.');
            } else {
                return redirect()->back()
                    ->with('error', 'Something went wrong. Please try again.')
                    ->withInput();
            }
        } catch (\Exception $e) {
            \Log::error('Contact form submission error: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'An error occurred. Please try again later.')
                ->withInput();
        }
    }
}
