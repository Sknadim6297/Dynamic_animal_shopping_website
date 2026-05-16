@extends('admin.layouts.layout')
@section('styles')
@endsection
@section('content')

<!--== BODY INNER CONTAINER ==-->
<div class="sb2-2">
    <!--== breadcrumbs ==-->
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Dashboard</a>
            </li>
        </ul>
    </div>
    <!--== WELCOME MESSAGE ==-->
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title">
                        <h4>Welcome to Animal Pride Admin Panel</h4>
                    </div>
                    <div class="tab-inn" style="padding: 40px; text-align: center;">
                        <h2 style="color: #2196F3; margin-bottom: 20px;">Welcome to Animal Pride Admin Panel</h2>
                        <p style="font-size: 16px; color: #666;">Manage your website content, appointments, and settings from here.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')

@endsection