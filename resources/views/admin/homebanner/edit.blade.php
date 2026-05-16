@extends('admin.layouts.layout')
@section('styles')
<style>
    .banner-preview-wrap {
        margin-top: 16px;
    }

    .banner-preview-frame {
        width: 100%;
        max-width: 720px;
        height: 420px;
        border: 1px solid #ddd;
        border-radius: 8px;
        overflow: hidden;
        background: #f7f7f7;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .banner-preview-frame img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
        display: block;
    }

    .banner-preview-placeholder {
        color: #888;
        font-size: 14px;
    }
</style>
@endsection
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Edit Home Banner</a>
            </li>
            <li class="page-back"><a href="{{ route('admin.homebanner.index') }}"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Home Banner</h4>
                <p>Update banner information</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.homebanner.update', $banner->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="input-field col s12">
                            @if($banner->banner_image)
                                <div class="banner-preview-wrap" style="margin-bottom: 15px;">
                                    <p style="margin-bottom:8px;"><strong>Current Image (Fixed Layout)</strong></p>
                                    <div class="banner-preview-frame">
                                        <img src="{{ asset($banner->banner_image) }}" alt="Current Banner">
                                    </div>
                                </div>
                            @endif
                            <div class="file-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="banner_image" id="banner_image" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload New Banner Image (leave empty to keep current)">
                                </div>
                            </div>
                            @error('banner_image')
                                <span class="red-text">{{ $message }}</span>
                            @enderror

                            <div class="banner-preview-wrap">
                                <p style="margin-bottom:8px;"><strong>New Upload Preview (Fixed Layout)</strong></p>
                                <div id="banner-preview" class="banner-preview-frame">
                                    <span class="banner-preview-placeholder">Select a new image to preview</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="heading" name="heading" type="text" class="validate" value="{{ old('heading', $banner->heading) }}">
                            <label for="heading">Heading</label>
                            @error('heading')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="mid_heading" name="mid_heading" type="text" class="validate" value="{{ old('mid_heading', $banner->mid_heading) }}">
                            <label for="mid_heading">Mid Heading</label>
                            @error('mid_heading')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="description" name="description" class="materialize-textarea">{{ old('description', $banner->description) }}</textarea>
                            <label for="description">Description</label>
                            @error('description')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update</button>
                            <a href="{{ route('admin.homebanner.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    (function () {
        const input = document.getElementById('banner_image');
        const preview = document.getElementById('banner-preview');

        if (!input || !preview) {
            return;
        }

        input.addEventListener('change', function () {
            const file = this.files && this.files[0];
            preview.innerHTML = '';

            if (!file) {
                preview.innerHTML = '<span class="banner-preview-placeholder">Select a new image to preview</span>';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'New Banner Preview';
                preview.appendChild(img);
            };

            reader.readAsDataURL(file);
        });
    })();
</script>
@endsection
