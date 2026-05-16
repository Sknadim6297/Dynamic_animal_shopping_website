@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#"> Edit Video</a></li>
            <li class="page-back">
                <a href="{{ route('admin.video.gallery') }}">
                    <i class="fa fa-backward"></i> Back
                </a>
            </li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">

            <div class="inn-title">
                <h4>Edit Video</h4>
                <p>Update video details</p>
            </div>

            <div class="bor">
                <form method="POST" action="{{ route('admin.video.gallery.update', $video->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Pet Name -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pet_name" name="pet_name" type="text" class="validate"
                                   value="{{ old('pet_name', $video->pet_name) }}">
                            <label for="pet_name">Pet Name</label>
                            @error('pet_name')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Pet Type -->
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="pet_type">
                                <option value="" disabled>Select Pet Type</option>
                                <option value="dog" {{ old('pet_type', $video->pet_type) == 'dog' ? 'selected' : '' }}>Dog</option>
                                <option value="cat" {{ old('pet_type', $video->pet_type) == 'cat' ? 'selected' : '' }}>Cat</option>
                            </select>
                            <label>Pet Type</label>
                            @error('pet_type')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Current Video -->
                    <div class="row">
                        <div class="input-field col s12">
                            @if($video->video)
                                <div style="margin-bottom:15px;">
                                    <p>Current Video:</p>
                                    <video width="250" controls style="border-radius:6px;">
                                        <source src="{{ asset($video->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            @endif

                            <!-- Change Video -->
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Change Video</span>
                                    <input type="file" name="video" id="video" accept="video/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload new video (optional)">
                                </div>
                            </div>

                            <small class="grey-text">Leave empty to keep current video (Max 20MB)</small>

                            @error('video')
                                <span class="red-text">{{ $message }}</span>
                            @enderror

                            <!-- Preview -->
                            <div id="video-preview" style="margin-top:20px;"></div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update</button>
                            <a href="{{ route('admin.video.gallery') }}" class="waves-effect waves-light btn-large grey" style="margin-left:10px;">Cancel</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

<!-- JS -->
<script>
document.addEventListener('DOMContentLoaded', function() {

    if (typeof M !== 'undefined') {
        M.FormSelect.init(document.querySelectorAll('select'));
        M.updateTextFields();
    }

    const videoInput = document.getElementById('video');
    const preview = document.getElementById('video-preview');

    if (videoInput) {
        videoInput.addEventListener('change', function() {
            preview.innerHTML = '';

            if (this.files && this.files[0]) {
                const file = this.files[0];

                if (file.type.startsWith('video/')) {
                    const video = document.createElement('video');
                    video.src = URL.createObjectURL(file);
                    video.controls = true;
                    video.style.width = '250px';
                    video.style.border = '1px solid #ddd';
                    video.style.borderRadius = '6px';

                    preview.appendChild(video);
                }
            }
        });
    }

});
</script>

@endsection