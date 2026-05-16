@extends('admin.layouts.layout')
@section('content')
    <div class="sb2-2">
        <div class="sb2-2-2">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
                <li class="active-bre"><a href="#"> Video Gallery</a></li>
            </ul>
        </div>

        <div class="sb2-2-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="box-inn-sp">

                        <!-- Header -->
                        <div class="inn-title" style="display:flex; justify-content:space-between; align-items:flex-start;">
                            <div>
                                <h4>All Videos</h4>
                                <p>Manage your video gallery</p>
                            </div>
                            <a class="btn waves-effect waves-light" href="{{ route('admin.video.gallery.create') }}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </div>

                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="alert alert-success"
                                style="margin:15px; padding:10px; background:#4caf50; color:#fff; border-radius:4px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Table -->
                        <div class="tab-inn">
                            <div class="table-responsive table-desi">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Video</th>
                                            <th>Pet Name</th>
                                            <th>Pet Type</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse($videos as $video)
                                            <tr>

                                                <!-- Video Preview -->
                                                <td>
                                                    @if ($video->video)
                                                        <video width="120" height="80"
                                                            style="object-fit:cover; border-radius:6px;" controls>
                                                            <source src="{{ asset($video->video) }}" type="video/mp4">
                                                        </video>
                                                    @else
                                                        <span class="grey-text">No video</span>
                                                    @endif
                                                </td>

                                                <!-- Name -->
                                                <td><strong>{{ $video->pet_name ?? 'N/A' }}</strong></td>

                                                <!-- Type -->
                                                <td>
                                                    <span
                                                        style="background:#2196f3; color:#fff; padding:5px 10px; border-radius:3px;">
                                                        {{ ucfirst($video->pet_type ?? 'Pet') }}
                                                    </span>
                                                </td>

                                                <!-- Edit -->
                                                <td>
                                                    <a href="{{ route('admin.video.gallery.edit', $video->id) }}">
                                                        <i class="fa fa-pencil-square-o"></i>
                                                    </a>
                                                </td>

                                                <!-- Delete -->
                                                <td>
                                                    <form method="POST"
                                                        action="{{ route('admin.video.gallery.destroy', $video->id) }}"
                                                        onsubmit="return confirm('Are you sure you want to delete this video?');">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit"
                                                            style="background:none; border:none; color:#f44336;">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                    </form>
                                                </td>

                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="5" style="text-align:center; padding:20px;">
                                                    No videos found.
                                                    <a href="{{ route('admin.video.gallery.create') }}">Upload your first
                                                        video</a>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- End Table -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
