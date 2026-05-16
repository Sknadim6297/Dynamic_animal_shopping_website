@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active-bre"><a href="#"> Add Video</a></li>
        </ul>
    </div>

    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">

            <div class="inn-title">
                <h4>Add Video</h4>
                <p>Upload a new pet video</p>
            </div>

            <div class="bor">
                <form method="POST" action="{{ route('admin.video.gallery.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Pet Name -->
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pet_name" name="pet_name" type="text" class="validate" value="{{ old('pet_name') }}">
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
                                <option value="" disabled selected>Choose Pet Type</option>
                                <option value="dog">Dog</option>
                                <option value="cat">Cat</option>
                            </select>
                            <label>Pet Type</label>
                            @error('pet_type')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Video Upload -->
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Select Video</span>
                                    <input type="file" name="video" id="video" accept="video/*" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload video">
                                </div>
                            </div>
                            <small class="grey-text">Supported: MP4, MOV, AVI (Max 20MB)</small>
                            @error('video')
                                <span class="red-text">{{ $message }}</span>
                            @enderror

                            <!-- Video Preview -->
                            <div id="video-preview" style="margin-top:20px;"></div>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
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

    // Initialize select (Materialize)
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