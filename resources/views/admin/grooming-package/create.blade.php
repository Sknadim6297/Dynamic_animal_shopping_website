@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li><a href="{{ route('admin.grooming-package.index') }}"> Grooming Packages</a>
            </li>
            <li class="active-bre"><a href="#"> Add Package</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add Grooming Package</h4>
                <p>Create a new grooming service package</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.grooming-package.store') }}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}" required>
                            <label for="name">Package Name <span class="red-text">*</span></label>
                            @error('name')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="price" name="price" type="number" step="0.01" min="0" class="validate" value="{{ old('price') }}" required>
                            <label for="price">Price <span class="red-text">*</span></label>
                            @error('price')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea" required>{{ old('description') }}</textarea>
                            <label for="description">Description <span class="red-text">*</span></label>
                            @error('description')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label for="is_active" style="display: flex; align-items: center;">
                                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} style="margin-right: 10px;">
                                <span>Active</span>
                            </label>
                            @error('is_active')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s6">
                            <button class="btn waves-effect waves-light" type="submit" name="action">
                                <i class="fa fa-save" aria-hidden="true"></i> Save Package
                            </button>
                        </div>
                        <div class="col s6" style="text-align: right;">
                            <a href="{{ route('admin.grooming-package.index') }}" class="btn" style="background-color: #666;">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
