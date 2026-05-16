@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Testimonials</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <h4>All Testimonials</h4>
                            <p>Manage your testimonials</p>
                        </div>
                        <a class="btn waves-effect waves-light" href="{{ route('admin.testimonial.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                        <th>Image</th>
                                        <th>Client Name</th>
                                        <th>Pet Owner</th>
                                        <th>Review Details</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonials as $testimonial)
                                    <tr>
                                        <td>
                                            @if($testimonial->image)
                                                <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->client_name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">
                                            @else
                                                <span class="grey-text">No image</span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $testimonial->client_name }}</strong></td>
                                        <td>
                                            @if($testimonial->is_pet_owner)
                                                <span  style="background-color: #4caf50; color: white;padding: 5px 10px; border-radius: 3px;">Yes</span>
                                            @else
                                                <span style="background-color: #9e9e9e; color: white;padding: 5px 10px; border-radius: 3px;">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($testimonial->review_details)
                                                <span style="max-width: 200px; display: inline-block; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;" title="{{ $testimonial->review_details }}">
                                                    {{ Str::limit($testimonial->review_details, 50) }}
                                                </span>
                                            @else
                                                <span class="grey-text">No review</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.testimonial.edit', $testimonial->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.testimonial.destroy', $testimonial->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: #f44336;">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 20px;">
                                            No testimonials found. <a href="{{ route('admin.testimonial.create') }}">Create your first testimonial</a>
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
