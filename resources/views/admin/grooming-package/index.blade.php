@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Grooming Packages</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <h4>Grooming Packages</h4>
                            <p>Manage grooming service packages</p>
                        </div>
                        <a class="btn waves-effect waves-light" href="{{ route('admin.grooming-package.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
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
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($packages as $package)
                                    <tr>
                                        <td><strong>{{ $package->name }}</strong></td>
                                        <td>Rs. {{ number_format($package->price, 2) }}</td>
                                        <td>
                                            <span class="text-muted" style="font-size: 12px;">{{ Str::limit($package->description, 50) }}</span>
                                        </td>
                                        <td>
                                            @if($package->is_active)
                                                <span class="badge" style="background-color: #4caf50; color: white; padding: 5px 10px; border-radius: 3px;">Active</span>
                                            @else
                                                <span class="badge" style="background-color: #f44336; color: white; padding: 5px 10px; border-radius: 3px;">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.grooming-package.edit', $package->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.grooming-package.destroy', $package->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this package?');">
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
                                            No packages found. <a href="{{ route('admin.grooming-package.create') }}">Create your first package</a>
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
