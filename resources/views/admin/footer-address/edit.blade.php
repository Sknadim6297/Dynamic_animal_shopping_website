@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active-bre"><a href="#"> Edit Shop</a></li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Shop</h4>
            </div>

            <div class="bor">
                <form method="POST" action="{{ route('admin.footer.address.update', $address->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="shop_name" value="{{ $address->shop_name }}">
                            <label class="active">Shop Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="address" value="{{ $address->address }}">
                            <label class="active">Address</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="phone" value="{{ $address->phone }}">
                            <label class="active">Phone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email" name="email" value="{{ $address->email }}">
                            <label class="active">Email</label>
                        </div>
                    </div>

                    <button class="btn">Update</button>
                    <a href="{{ route('admin.footer.address.index') }}" class="btn grey">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection