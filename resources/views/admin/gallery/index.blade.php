@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Gallery Items</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <h4>All Gallery Items</h4>
                            <p>Manage your gallery items</p>
                        </div>
                        <a class="btn waves-effect waves-light" href="{{ route('admin.gallery.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                        <th>Image(s)</th>
                                        <th>Pet Name</th>
                                        <th>Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($galleries as $gallery)
                                    <tr>
                                        <td>
                                            @if($gallery->images && count($gallery->images) > 0)
                                                <div style="display: flex; gap: 5px; flex-wrap: wrap;">
                                                    @foreach(array_slice($gallery->images, 0, 3) as $image)
                                                        <img src="{{ asset($image) }}" alt="{{ $gallery->pet_name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                                                    @endforeach
                                                    @if(count($gallery->images) > 3)
                                                        <div style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center; background: #f5f5f5; border-radius: 4px; border: 1px solid #ddd; font-size: 12px; font-weight: bold;">
                                                            +{{ count($gallery->images) - 3 }}
                                                        </div>
                                                    @endif
                                                </div>
                                            @else
                                                <span class="grey-text">No images</span>
                                            @endif
                                        </td>
                                        <td><strong>{{ $gallery->pet_name }}</strong></td>
                                        <td>{{ $gallery->category_label }}</td>
                                        <td>
                                            <a href="{{ route('admin.gallery.edit', $gallery->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.gallery.destroy', $gallery->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this gallery item?');">
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
                                        <td colspan="5" style="text-align: center; padding: 20px;">
                                            No gallery items found. <a href="{{ route('admin.gallery.create') }}">Create your first gallery item</a>
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
