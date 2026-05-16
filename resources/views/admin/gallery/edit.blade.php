@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Edit Gallery Item</a>
            </li>
            <li class="page-back"><a href="{{ route('admin.gallery.index') }}"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Gallery Item</h4>
                <p>Update gallery item information</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pet_name" name="pet_name" type="text" class="validate" value="{{ old('pet_name', $gallery->pet_name) }}" required>
                            <label for="pet_name">Pet Name <span class="red-text">*</span></label>
                            @error('pet_name')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select id="gallery_category" name="gallery_category" class="validate" required>
                                <option value="bird" {{ old('gallery_category', $gallery->gallery_category ?? '') == 'bird' ? 'selected' : '' }}>Birds</option>
                                <option value="cat" {{ old('gallery_category', $gallery->gallery_category ?? '') == 'cat' ? 'selected' : '' }}>Cats</option>
                                <option value="dog" {{ old('gallery_category', $gallery->gallery_category ?? '') == 'dog' ? 'selected' : '' }}>Dogs</option>
                                <option value="kitten" {{ old('gallery_category', $gallery->gallery_category ?? '') == 'kitten' ? 'selected' : '' }}>Kittens</option>
                            </select>
                            <label for="gallery_category">Category <span class="red-text">*</span></label>
                            @error('gallery_category')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    @if($gallery->images && count($gallery->images) > 0)
                    <div class="row">
                        <div class="input-field col s12">
                            <h6 style="margin-bottom: 15px; font-weight: 600;">Existing Images</h6>
                            <div style="display: flex; flex-wrap: wrap; gap: 15px; margin-bottom: 20px;">
                                @foreach($gallery->images as $index => $image)
                                <div style="position: relative; border: 2px solid #ddd; border-radius: 4px; padding: 5px;">
                                    <img src="{{ asset($image) }}" alt="Gallery Image" style="width: 150px; height: 150px; object-fit: cover; border-radius: 4px;">
                                    <label style="position: absolute; top: 5px; right: 5px; background: white; padding: 5px; border-radius: 50%; cursor: pointer;">
                                        <input type="checkbox" name="existing_images[]" value="{{ $image }}" checked style="display: none;" id="img_{{ $index }}">
                                        <i class="fa fa-check-circle" id="icon_{{ $index }}" style="color: #4caf50; font-size: 20px;"></i>
                                    </label>
                                    <p style="text-align: center; margin: 5px 0; font-size: 12px;">Uncheck to remove</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Add More Images</span>
                                    <input type="file" name="images[]" id="images" multiple accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload additional images (optional)">
                                </div>
                            </div>
                            <small class="grey-text">You can select multiple images at once. Supported formats: JPEG, PNG, JPG, GIF (Max 2MB each)</small>
                            @error('images')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                            @error('images.*')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                            <div id="image-preview" style="margin-top: 20px; display: flex; flex-wrap: wrap; gap: 10px;"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update</button>
                            <a href="{{ route('admin.gallery.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('images');
    const previewContainer = document.getElementById('image-preview');

    // Handle existing image checkboxes
    @if($gallery->images && count($gallery->images) > 0)
        @foreach($gallery->images as $index => $image)
            document.getElementById('img_{{ $index }}').addEventListener('change', function() {
                const icon = document.getElementById('icon_{{ $index }}');
                if (this.checked) {
                    icon.style.color = '#4caf50';
                    icon.className = 'fa fa-check-circle';
                } else {
                    icon.style.color = '#f44336';
                    icon.className = 'fa fa-times-circle';
                }
            });
        @endforeach
    @endif

    // Handle new image preview
    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            previewContainer.innerHTML = '';
            
            if (this.files && this.files.length > 0) {
                Array.from(this.files).forEach((file, index) => {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.style.width = '150px';
                            img.style.height = '150px';
                            img.style.objectFit = 'cover';
                            img.style.border = '1px solid #ddd';
                            img.style.borderRadius = '4px';
                            img.style.margin = '5px';
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        });
    }
});
</script>

@endsection
