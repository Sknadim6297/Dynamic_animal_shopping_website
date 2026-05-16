@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="active-bre"><a href="#"> Add Shop</a></li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add Shop</h4>
            </div>

            <div class="bor">
                <form method="POST" action="{{ route('admin.footer.address.store') }}">
                    @csrf

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="shop_name" required>
                            <label>Shop Name</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="address" required>
                            <label>Address</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="text" name="phone" required>
                            <label>Phone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input type="email" name="email" required>
                            <label>Email</label>
                        </div>
                    </div>

                    <button class="btn">Submit</button>
                    <a href="{{ route('admin.footer.address.index') }}" class="btn grey">Cancel</a>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection