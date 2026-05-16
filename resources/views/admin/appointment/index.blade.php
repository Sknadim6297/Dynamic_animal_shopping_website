@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Appointments</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <div>
                            <h4>All Appointments</h4>
                            <p>Manage grooming and clinic appointments</p>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success" style="margin: 15px; padding: 10px; background-color: #4caf50; color: white; border-radius: 4px;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Filter Tabs -->
                    <div style="margin: 15px; margin-bottom: 20px;">
                        <a href="{{ route('admin.appointment.index', ['service_type' => 'all']) }}" 
                           class="btn-filter {{ $serviceType == 'all' ? 'active' : '' }}" 
                           style="display: inline-block; padding: 8px 16px; margin-right: 5px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: 500; 
                                  {{ $serviceType == 'all' ? 'background-color: #2196F3; color: white;' : 'background-color: #e0e0e0; color: #333;' }}">
                            <i class="fa fa-list" aria-hidden="true"></i> All Appointments
                        </a>
                        <a href="{{ route('admin.appointment.index', ['service_type' => 'grooming']) }}" 
                           class="btn-filter {{ $serviceType == 'grooming' ? 'active' : '' }}" 
                           style="display: inline-block; padding: 8px 16px; margin-right: 5px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: 500; 
                                  {{ $serviceType == 'grooming' ? 'background-color: #ff9800; color: white;' : 'background-color: #e0e0e0; color: #333;' }}">
                            <i class="fa fa-scissors" aria-hidden="true"></i> Grooming
                        </a>
                        <a href="{{ route('admin.appointment.index', ['service_type' => 'clinic']) }}" 
                           class="btn-filter {{ $serviceType == 'clinic' ? 'active' : '' }}" 
                           style="display: inline-block; padding: 8px 16px; margin-right: 5px; border-radius: 4px; text-decoration: none; font-size: 13px; font-weight: 500; 
                                  {{ $serviceType == 'clinic' ? 'background-color: #4caf50; color: white;' : 'background-color: #e0e0e0; color: #333;' }}">
                            <i class="fa fa-heartbeat" aria-hidden="true"></i> Clinic
                        </a>
                    </div>

                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Service</th>
                                        <th>Pet Name</th>
                                        <th>Pet Type</th>
                                        <th>Details</th>
                                        <th>Owner Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($appointments as $appointment)
                                    <tr style="background-color: {{ $appointment->service_type == 'clinic' ? '#f0f8ff' : '#fff' }};">
                                        <td>#{{ $appointment->id }}</td>
                                        <td>
                                            @if($appointment->service_type == 'clinic')
                                                <span style="background-color: #4caf50; color: white; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 500;">
                                                    <i class="fa fa-heartbeat" aria-hidden="true"></i> CLINIC
                                                </span>
                                            @else
                                                <span style="background-color: #ff9800; color: white; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 500;">
                                                    <i class="fa fa-scissors" aria-hidden="true"></i> GROOMING
                                                </span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $appointment->pet_name }}</strong></td>
                                        <td>
                                            <span style="background-color: #2196F3; color: white; padding: 4px 8px; border-radius: 3px; font-size: 11px;">
                                                {{ $appointment->pet_type }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($appointment->service_type == 'clinic')
                                                @if($appointment->appointment_reason)
                                                    <span style="background-color: #e3f2fd; color: #1976d2; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 500;">
                                                        {{ Str::limit($appointment->appointment_reason, 25) }}
                                                    </span>
                                                @else
                                                    <span style="color: #999; font-size: 11px;">N/A</span>
                                                @endif
                                            @else
                                                @if($appointment->groomingPackage)
                                                    <span style="background-color: #4caf50; color: white; padding: 4px 8px; border-radius: 3px; font-size: 11px; font-weight: 500;">
                                                        {{ $appointment->groomingPackage->name }}
                                                    </span>
                                                    <br>
                                                    <small style="color: #666; font-size: 10px;">Rs. {{ number_format($appointment->groomingPackage->price, 0) }}</small>
                                                @else
                                                    <span style="background-color: #ff9800; color: white; padding: 4px 8px; border-radius: 3px; font-size: 11px;">
                                                        {{ $appointment->price_package ?? 'N/A' }}
                                                    </span>
                                                @endif
                                            @endif
                                        </td>
                                        <td>{{ $appointment->owner_name }}</td>
                                        <td><a href="mailto:{{ $appointment->email }}" style="color: #2196F3; text-decoration: none;">{{ $appointment->email }}</a></td>
                                        <td><a href="tel:{{ $appointment->phone }}" style="color: #2196F3; text-decoration: none;">{{ $appointment->phone }}</a></td>
                                        <td>{{ $appointment->appointment_date->format('M d, Y') }}</td>
                                        <td><strong>{{ date('h:i A', strtotime($appointment->appointment_time)) }}</strong></td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.appointment.updateStatus', $appointment->id) }}" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()" class="status-select status-{{ $appointment->status }}" style="padding: 6px 12px; border-radius: 4px; border: 1px solid #ddd; font-size: 12px; cursor: pointer; min-width: 130px; font-weight: 500;">
                                                    <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                    <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.appointment.destroy', $appointment->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="action-btn" style="background: none; border: none; padding: 0; cursor: pointer; color: #f44336; font-size: 18px;" title="Delete Appointment">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" style="text-align: center; padding: 20px; color: #999;">
                                            <i class="fa fa-inbox" aria-hidden="true"></i> No appointments found.
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
<style>
    /* Status dropdown styling */
    .status-select {
        transition: all 0.3s ease;
        outline: none;
    }
    
    .status-select:hover {
        border-color: #2196F3;
        box-shadow: 0 2px 4px rgba(33, 150, 243, 0.2);
    }
    
    .status-select:focus {
        border-color: #2196F3;
        box-shadow: 0 0 0 3px rgba(33, 150, 243, 0.1);
    }
    
    /* Status-specific background colors */
    .status-select.status-pending {
        background-color: #fff3cd;
        color: #856404;
        border-color: #ffc107;
    }
    
    .status-select.status-confirmed {
        background-color: #d1ecf1;
        color: #0c5460;
        border-color: #17a2b8;
    }
    
    .status-select.status-completed {
        background-color: #d4edda;
        color: #155724;
        border-color: #28a745;
    }
    
    .status-select.status-cancelled {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #dc3545;
    }
    
    /* Action buttons hover effects */
    .action-btn {
        transition: all 0.3s ease;
        display: inline-block;
    }
    
    .action-btn:hover {
        opacity: 0.7;
        transform: scale(1.15);
    }
    
    
    /* Delete button hover */
    button.action-btn[style*="color: #f44336"]:hover {
        color: #d32f2f !important;
        transform: scale(1.2);
    }

    /* Filter button styles */
    .btn-filter {
        transition: all 0.3s ease !important;
    }

    .btn-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .btn-filter.active {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection
