@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Contacts</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <div>
                            <h4>All Contact Messages</h4>
                            <p>Manage contact form submissions</p>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success" style="margin: 15px; padding: 10px; background-color: #4caf50; color: white; border-radius: 4px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Message</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $contact)
                                    <tr>
                                        <td>#{{ $contact->id }}</td>
                                        <td>
                                            <strong>{{ $contact->first_name }} {{ $contact->last_name }}</strong>
                                        </td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ Str::limit($contact->message, 50) }}</td>
                                        <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.contact.updateStatus', $contact->id) }}" style="display: inline;">
                                                @csrf
                                                @method('PUT')
                                                <select name="status" onchange="this.form.submit()" class="status-select status-{{ $contact->status }}" style="padding: 6px 12px; border-radius: 4px; border: 1px solid #ddd; font-size: 13px; cursor: pointer; min-width: 100px; font-weight: 500;">
                                                    <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                                                    <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                                                    <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <a href="{{ route('admin.contact.show', $contact->id) }}" style="color: #2196F3; font-size: 18px; text-decoration: none;" title="View Details">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <form method="POST" action="{{ route('admin.contact.destroy', $contact->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="action-btn" style="background: none; border: none; padding: 0; cursor: pointer; color: #f44336; font-size: 18px;" title="Delete Contact">
                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" style="text-align: center; padding: 20px;">
                                            No contact messages found.
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
    .status-select.status-new {
        background-color: #fff3cd;
        color: #856404;
        border-color: #ffc107;
    }
    
    .status-select.status-read {
        background-color: #d1ecf1;
        color: #0c5460;
        border-color: #17a2b8;
    }
    
    .status-select.status-replied {
        background-color: #d4edda;
        color: #155724;
        border-color: #28a745;
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
    
    a[title="View Details"]:hover {
        color: #1976D2 !important;
        transform: scale(1.2);
    }
    
    button.action-btn[style*="color: #f44336"]:hover {
        color: #d32f2f !important;
        transform: scale(1.2);
    }
</style>
@endsection
