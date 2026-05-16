@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Add Gallery Item</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add Gallery Item</h4>
                <p>Add a new gallery item with multiple images</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pet_name" name="pet_name" type="text" class="validate" value="{{ old('pet_name') }}" required>
                            <label for="pet_name">Pet Name <span class="red-text">*</span></label>
                            @error('pet_name')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select id="gallery_category" name="gallery_category" class="validate" required>
                                <option value="" disabled selected>Choose Gallery Category</option>
                                <option value="bird" {{ old('gallery_category') == 'bird' ? 'selected' : '' }}>Birds</option>
                                <option value="cat" {{ old('gallery_category') == 'cat' ? 'selected' : '' }}>Cats</option>
                                <option value="dog" {{ old('gallery_category') == 'dog' ? 'selected' : '' }}>Dogs</option>
                                <option value="kitten" {{ old('gallery_category') == 'kitten' ? 'selected' : '' }}>Kittens</option>
                            </select>
                            <label for="gallery_category">Category <span class="red-text">*</span></label>
                            @error('gallery_category')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Select Images</span>
                                    <input type="file" name="images[]" id="images" multiple accept="image/*" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload one or more images">
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
                            <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
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
});
</script>

@endsection
