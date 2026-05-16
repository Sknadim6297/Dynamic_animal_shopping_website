@extends('admin.layouts.layout')
@section('styles')
<style>
    .home-banner-thumb {
        width: 180px;
        height: 100px;
        object-fit: cover;
        object-position: center;
        border-radius: 6px;
        border: 1px solid #ddd;
        display: block;
    }
</style>
@endsection
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Home Banners</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <h4>All Home Banners</h4>
                            <p>Manage your home page banners</p>
                        </div>
                        <a class="btn waves-effect waves-light" href="{{ route('admin.homebanner.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                        <th>Heading</th>
                                        <th>Mid Heading</th>
                                        <th>Description</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($banners as $banner)
                                    <tr>
                                        <td>
                                            @if($banner->banner_image)
                                                <span class="list-img">
                                                    <img src="{{ asset($banner->banner_image) }}" alt="Banner" class="home-banner-thumb">
                                                </span>
                                            @else
                                                <span class="list-img">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $banner->heading ?? 'N/A' }}</td>
                                        <td>{{ $banner->mid_heading ?? 'N/A' }}</td>
                                        <td>{{ Str::limit($banner->description ?? 'N/A', 50) }}</td>
                                        <td>
                                            <a href="{{ route('admin.homebanner.edit', $banner->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.homebanner.destroy', $banner->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this banner?');">
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
                                            No banners found. <a href="{{ route('admin.homebanner.create') }}">Create your first banner</a>
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
