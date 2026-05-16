@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#"> Footer Address</a></li>
        </ul>
    </div>

    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">

                    <div class="inn-title" style="display:flex; justify-content:space-between;">
                        <div>
                            <h4>All Shops</h4>
                            <p>Manage footer addresses</p>
                        </div>
                        <a class="btn" href="{{ route('admin.footer.address.create') }}">
                            <i class="fa fa-plus"></i> Add New
                        </a>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success" style="margin:15px; padding:10px; background:#4caf50; color:#fff;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="tab-inn">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Shop Name</th>
                                        <th>Address</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse($addresses as $item)
                                    <tr>
                                        <td><strong>{{ $item->shop_name }}</strong></td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->email }}</td>

                                        <td>
                                            <a href="{{ route('admin.footer.address.edit', $item->id) }}">
                                                <i class="fa fa-pencil-square-o"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <form method="POST" action="{{ route('admin.footer.address.destroy', $item->id) }}" onsubmit="return confirm('Delete this?')">
                                                @csrf
                                                @method('DELETE')
                                                <button style="border:none; background:none; color:red;">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No data found</td>
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