<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
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
     * Display a listing of appointments.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $serviceType = request('service_type', 'all');
        
        $query = Appointment::with(['groomingPackage']);
        
        if ($serviceType !== 'all') {
            $query->where('service_type', $serviceType);
        }
        
        $appointments = $query->latest()->get();
        
        return view('admin.appointment.index', compact('appointments', 'serviceType'));
    }

    /**
     * Update the appointment status.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update($validated);

        return redirect()->route('admin.appointment.index')
            ->with('success', 'Appointment status updated successfully.');
    }

    /**
     * Remove the specified appointment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('admin.appointment.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
