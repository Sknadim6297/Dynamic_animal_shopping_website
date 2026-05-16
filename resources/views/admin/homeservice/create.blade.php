@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Add Home Service</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add Home Service</h4>
                <p>Add a new service for the home page</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.homeservice.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="heading" name="heading" type="text" class="validate" value="{{ old('heading') }}">
                            <label for="heading">Heading</label>
                            @error('heading')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea">{{ old('description') }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field" style="margin-top: 0;">
                                <div class="btn">
                                    <span>Upload Background Image</span>
                                    <input type="file" name="background_image" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload a background image (optional)">
                                </div>
                            </div>
                            <span class="helper-text">Recommended: JPG/PNG/WebP. Keep aspect ratio landscape for best results.</span>
                            @error('background_image')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="video" name="video" type="text" class="validate" value="{{ old('video') }}">
                            <label for="video">Video URL</label>
                            <span class="helper-text">Enter YouTube or Vimeo URL. Examples: YouTube: https://www.youtube.com/watch?v=VIDEO_ID or https://youtu.be/VIDEO_ID | Vimeo: https://vimeo.com/VIDEO_ID or https://player.vimeo.com/video/VIDEO_ID</span>
                            @error('video')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field" style="margin-top: 0;">
                                <div class="btn">
                                    <span>Upload Video</span>
                                    <input type="file" name="video_file" accept="video/mp4,video/webm,video/quicktime">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload a direct video file (optional)">
                                </div>
                            </div>
                            <span class="helper-text">Upload an MP4, WebM, or MOV file if you want a direct video instead of a link.</span>
                            @error('video_file')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
                            <a href="{{ route('admin.homeservice.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
