<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Mail\BookingConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Store a newly created appointment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pet_name' => 'required|string|max:255',
            'pet_type' => 'required|string|max:255',
            'owner_name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'required|string|max:255',
            'service_type' => 'required|in:grooming,clinic',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required',
            'special_instructions' => 'nullable|string',
            'appointment_reason' => 'nullable|string|max:255',
            'price_package' => 'nullable|exists:grooming_packages,slug',
        ]);

        if (empty($validated['price_package'])) {
            $validated['price_package'] = null;
        }

        // Ensure email key exists to avoid DB errors when column is non-nullable
        if (!array_key_exists('email', $validated) || $validated['email'] === null) {
            $validated['email'] = '';
        }

        $appointment = Appointment::create($validated);

        // Send confirmation email only if an email was provided
        $emailSent = false;
        if (!empty($appointment->email)) {
            try {
                Mail::to($appointment->email)->send(new BookingConfirmation($appointment));
                $emailSent = true;
                Log::info('Booking confirmation email sent successfully to: ' . $appointment->email);
            } catch (\Exception $e) {
                // Log detailed error but don't fail the booking
                Log::error('Failed to send booking confirmation email to: ' . $appointment->email);
                Log::error('Error details: ' . $e->getMessage());
                Log::error('Stack trace: ' . $e->getTraceAsString());
            }
        }

        $successMessage = 'Your appointment has been booked successfully!';
        if ($emailSent) {
            $successMessage .= ' A confirmation email has been sent to ' . $appointment->email;
        } elseif (!empty($appointment->email)) {
            $successMessage .= ' (Note: Email could not be sent. Please check your email configuration.)';
        }

        return redirect()->back()
            ->with('booking_success', $successMessage);
    }
}
