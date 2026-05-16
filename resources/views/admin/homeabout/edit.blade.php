@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Edit Home About</a>
            </li>
            <li class="page-back"><a href="{{ route('admin.homeabout.index') }}"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Home About Section</h4>
                <p>Update about section information</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.homeabout.update', $about->id) }}">
                    @csrf
                    @method('PUT')
                    
                    <!-- Main Section -->
                    <h5 style="margin-top: 20px; margin-bottom: 15px; font-weight: 600;">Main Section</h5>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="section_heading" name="section_heading" type="text" class="validate" value="{{ old('section_heading', $about->section_heading) }}">
                            <label for="section_heading">Section Heading</label>
                            @error('section_heading')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea">{{ old('description', $about->description) }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="year_of_experience" name="year_of_experience" type="text" class="validate" value="{{ old('year_of_experience', $about->year_of_experience) }}">
                            <label for="year_of_experience">Year of Experience</label>
                            @error('year_of_experience')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Side Section -->
                    <h5 style="margin-top: 30px; margin-bottom: 15px; font-weight: 600;">Right Side Section</h5>
                    
                    @for($i = 1; $i <= 4; $i++)
                    <div style="border: 1px solid #ddd; padding: 15px; margin-bottom: 15px; border-radius: 4px;">
                        <h6 style="margin-bottom: 15px; color: #666;">Item {{ $i }}</h6>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="right_heading_{{ $i }}" name="right_heading_{{ $i }}" type="text" class="validate" value="{{ old('right_heading_' . $i, $about->{'right_heading_' . $i}) }}">
                                <label for="right_heading_{{ $i }}">Heading {{ $i }}</label>
                                @error('right_heading_' . $i)
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="right_description_{{ $i }}" name="right_description_{{ $i }}" class="materialize-textarea">{{ old('right_description_' . $i, $about->{'right_description_' . $i}) }}</textarea>
                                <label for="right_description_{{ $i }}">Description {{ $i }}</label>
                                @error('right_description_' . $i)
                                    <span class="red-text">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endfor

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update</button>
                            <a href="{{ route('admin.homeabout.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
