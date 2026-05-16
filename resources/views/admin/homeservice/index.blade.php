@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Home Services</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <h4>All Home Services</h4>
                            <p>Manage your home page services</p>
                        </div>
                        <a class="btn waves-effect waves-light" href="{{ route('admin.homeservice.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                        <th>Heading</th>
                                        <th>Description</th>
                                        <th>Video</th>
                                        <th>Source</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($services as $service)
                                    <tr>
                                        <td>{{ $service->heading ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($service->description ?? 'N/A', 50) }}</td>
                                        <td>
                                            @if($service->video_file)
                                                <a href="{{ asset('storage/' . $service->video_file) }}" target="_blank" style="color: #2196F3;">
                                                    <i class="fa fa-file-video-o" aria-hidden="true"></i> Uploaded Video
                                                </a>
                                            @elseif($service->video)
                                                <a href="{{ $service->video }}" target="_blank" style="color: #2196F3;">
                                                    <i class="fa fa-video-camera" aria-hidden="true"></i> Video URL
                                                </a>
                                            @else
                                                <span>No Video</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $service->video_file ? 'Upload' : ($service->video ? 'Link' : 'None') }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.homeservice.edit', $service->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.homeservice.destroy', $service->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this service?');">
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
                                            No services found. <a href="{{ route('admin.homeservice.create') }}">Create your first service</a>
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
