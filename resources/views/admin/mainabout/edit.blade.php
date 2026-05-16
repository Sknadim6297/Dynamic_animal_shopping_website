@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Edit About Page Section</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit About Page Section</h4>
                <p>Edit the selected About page section</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.mainabout.update', $mainAbout->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h5 style="margin-top: 20px; margin-bottom: 15px; font-weight: 600;">Main Section</h5>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="main_heading" name="main_heading" type="text" class="validate" value="{{ old('main_heading', $mainAbout->main_heading) }}">
                            <label for="main_heading">Main Heading</label>
                            @error('main_heading')<span class="red-text">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="main_heading_highlight" name="main_heading_highlight" type="text" class="validate" value="{{ old('main_heading_highlight', $mainAbout->main_heading_highlight) }}">
                            <label for="main_heading_highlight">Highlighted Heading</label>
                            @error('main_heading_highlight')<span class="red-text">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="main_description" name="main_description" class="materialize-textarea">{{ old('main_description', $mainAbout->main_description) }}</textarea>
                            <label for="main_description">Description</label>
                            @error('main_description')<span class="red-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="video_url" name="video_url" type="url" class="validate" value="{{ old('video_url', $mainAbout->video_url) }}">
                            <label for="video_url">Video URL</label>
                            @error('video_url')<span class="red-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="how_we_work_label" name="how_we_work_label" type="text" class="validate" value="{{ old('how_we_work_label', $mainAbout->how_we_work_label) }}" placeholder="HOW WE WORK">
                            <label for="how_we_work_label">Video Label (short, e.g. HOW WE WORK)</label>
                            @error('how_we_work_label')<span class="red-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="years_of_experience" name="years_of_experience" type="text" class="validate" value="{{ old('years_of_experience', $mainAbout->years_of_experience) }}">
                            <label for="years_of_experience">Years of Experience (small label)</label>
                            @error('years_of_experience')<span class="red-text">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <h5 style="margin-top: 20px; margin-bottom: 15px; font-weight: 600;">Vision / Mission</h5>
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="vision_heading" name="vision_heading" type="text" class="validate" value="{{ old('vision_heading', $mainAbout->vision_heading) }}">
                            <label for="vision_heading">Vision Heading</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="mission_heading" name="mission_heading" type="text" class="validate" value="{{ old('mission_heading', $mainAbout->mission_heading) }}">
                            <label for="mission_heading">Mission Heading</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s6">
                            <textarea id="vision_description" name="vision_description" class="materialize-textarea">{{ old('vision_description', $mainAbout->vision_description) }}</textarea>
                            <label for="vision_description">Vision Description</label>
                        </div>
                        <div class="input-field col s6">
                            <textarea id="mission_description" name="mission_description" class="materialize-textarea">{{ old('mission_description', $mainAbout->mission_description) }}</textarea>
                            <label for="mission_description">Mission Description</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s4">
                            <label for="vision_image">Vision Image</label>
                            <input id="vision_image" name="vision_image" type="file">
                            @if($mainAbout->vision_image)
                                <div style="margin-top: 8px;"><img src="{{ asset($mainAbout->vision_image) }}" alt="" style="max-width:150px;" /></div>
                            @endif
                        </div>
                        <div class="input-field col s4">
                            <label for="mission_image">Mission Image</label>
                            <input id="mission_image" name="mission_image" type="file">
                            @if($mainAbout->mission_image)
                                <div style="margin-top: 8px;"><img src="{{ asset($mainAbout->mission_image) }}" alt="" style="max-width:150px;" /></div>
                            @endif
                        </div>
                        <div class="input-field col s4">
                            <label for="why_choose_image">Why Choose Image</label>
                            <input id="why_choose_image" name="why_choose_image" type="file">
                            @if($mainAbout->why_choose_image)
                                <div style="margin-top: 8px;"><img src="{{ asset($mainAbout->why_choose_image) }}" alt="" style="max-width:150px;" /></div>
                            @endif
                        </div>
                    </div>

                    <h5 style="margin-top: 20px; margin-bottom: 15px; font-weight: 600;">Why Choose Items</h5>
                    <p class="grey-text">Enter up to 6 bullet items. Example: "Professional grooming services for all pet breeds and sizes"</p>
                    @php $items = old('why_choose_items', $mainAbout->why_choose_items ?? []) @endphp
                    @for($i = 0; $i < 6; $i++)
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="why_choose_items_{{ $i }}" name="why_choose_items[]" type="text" class="validate" value="{{ $items[$i] ?? '' }}" placeholder="Bullet {{ $i + 1 }}">
                            <label for="why_choose_items_{{ $i }}">Bullet {{ $i + 1 }}</label>
                        </div>
                    </div>
                    @endfor

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="why_choose_heading" name="why_choose_heading" type="text" class="validate" value="{{ old('why_choose_heading', $mainAbout->why_choose_heading) }}">
                            <label for="why_choose_heading">Why Choose Heading</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="why_choose_community_text" name="why_choose_community_text" type="text" class="validate" value="{{ old('why_choose_community_text', $mainAbout->why_choose_community_text) }}">
                            <label for="why_choose_community_text">Community Short Text</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="callout_description" name="callout_description" class="materialize-textarea">{{ old('callout_description', $mainAbout->callout_description) }}</textarea>
                            <label for="callout_description">Callout / Footer Description</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update</button>
                            <a href="{{ route('admin.mainabout.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
