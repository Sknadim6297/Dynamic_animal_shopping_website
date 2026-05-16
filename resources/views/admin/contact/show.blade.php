@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li><a href="{{ route('admin.contact.index') }}"> Contacts</a>
            </li>
            <li class="active-bre"><a href="#"> View Contact</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <div>
                            <h4>Contact Message Details</h4>
                            <p>View contact form submission</p>
                        </div>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success" style="margin: 15px; padding: 10px; background-color: #4caf50; color: white; border-radius: 4px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="tab-inn">
                        <div class="row">
                            <div class="col-md-8">
                                <div style="background: #f8f9fa; padding: 2rem; border-radius: 8px; margin-bottom: 2rem;">
                                    <h5 style="margin-bottom: 1.5rem; color: #2196F3;">Contact Information</h5>
                                    
                                    <div style="margin-bottom: 1rem;">
                                        <strong style="color: #666; display: block; margin-bottom: 0.5rem;">Name:</strong>
                                        <p style="font-size: 1.1rem; color: #000;">{{ $contact->first_name }} {{ $contact->last_name }}</p>
                                    </div>
                                    
                                    <div style="margin-bottom: 1rem;">
                                        <strong style="color: #666; display: block; margin-bottom: 0.5rem;">Email:</strong>
                                        <p style="font-size: 1.1rem; color: #000;"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                                    </div>
                                    
                                    <div style="margin-bottom: 1rem;">
                                        <strong style="color: #666; display: block; margin-bottom: 0.5rem;">Phone:</strong>
                                        <p style="font-size: 1.1rem; color: #000;"><a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></p>
                                    </div>
                                    
                                    <div style="margin-bottom: 1rem;">
                                        <strong style="color: #666; display: block; margin-bottom: 0.5rem;">Submitted:</strong>
                                        <p style="font-size: 1rem; color: #666;">{{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
                                    </div>
                                    
                                    <div style="margin-top: 2rem; padding-top: 1.5rem; border-top: 1px solid #ddd;">
                                        <strong style="color: #666; display: block; margin-bottom: 0.5rem;">Message:</strong>
                                        <p style="font-size: 1rem; color: #000; line-height: 1.6; white-space: pre-wrap;">{{ $contact->message }}</p>
                                    </div>
                                </div>
                                
                                <div style="display: flex; gap: 10px;">
                                    <a href="{{ route('admin.contact.index') }}" class="btn btn-secondary">Back to List</a>
                                    <form method="POST" action="{{ route('admin.contact.updateStatus', $contact->id) }}" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="replied">
                                        <button type="submit" class="btn btn-success">Mark as Replied</button>
                                    </form>
                                    <form method="POST" action="{{ route('admin.contact.destroy', $contact->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div style="background: #f8f9fa; padding: 1.5rem; border-radius: 8px;">
                                    <h5 style="margin-bottom: 1rem; color: #2196F3;">Status</h5>
                                    <form method="POST" action="{{ route('admin.contact.updateStatus', $contact->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" onchange="this.form.submit()" class="form-control" style="margin-bottom: 1rem;">
                                            <option value="new" {{ $contact->status == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>Read</option>
                                            <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Replied</option>
                                        </select>
                                    </form>
                                    
                                    <div style="margin-top: 1.5rem; padding-top: 1.5rem; border-top: 1px solid #ddd;">
                                        <small style="color: #666;">Quick Actions</small>
                                        <div style="margin-top: 0.5rem;">
                                            <a href="mailto:{{ $contact->email }}?subject=Re: Your Contact Form Submission" class="btn btn-sm btn-primary" style="width: 100%; margin-bottom: 0.5rem;">
                                                <i class="fa fa-envelope"></i> Reply via Email
                                            </a>
                                            <a href="tel:{{ $contact->phone }}" class="btn btn-sm btn-info" style="width: 100%;">
                                                <i class="fa fa-phone"></i> Call
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
