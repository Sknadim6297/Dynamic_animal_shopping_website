@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Add Testimonial</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Add Testimonial</h4>
                <p>Add a new testimonial</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.testimonial.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="client_name" name="client_name" type="text" class="validate" value="{{ old('client_name') }}" required>
                            <label for="client_name">Client Name <span class="red-text">*</span></label>
                            @error('client_name')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <div>
                                <p style="margin: 0;">
                                    <input type="checkbox" name="is_pet_owner" id="is_pet_owner" value="1" class="filled-in" style="opacity: 1; position: relative; pointer-events: auto;" {{ old('is_pet_owner') ? 'checked' : '' }} />
                                    <label for="is_pet_owner" >Pet Owner</label>
                                </p>
                            </div>
                            @error('is_pet_owner')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Select Image</span>
                                    <input type="file" name="image" id="image" accept="image/*" required>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload image with pet">
                                </div>
                            </div>
                            <small class="grey-text">Supported formats: JPEG, PNG, JPG, GIF (Max 2MB)</small>
                            @error('image')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                            <div id="image-preview" style="margin-top: 20px;"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <h5 style="margin-top: 30px; margin-bottom: 15px; font-weight: 600;">Review Details</h5>
                            <textarea id="review_details" name="review_details" class="materialize-textarea" rows="5">{{ old('review_details') }}</textarea>
                            <label for="review_details">Review Details</label>
                            @error('review_details')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Submit</button>
                            <a href="{{ route('admin.testimonial.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Materialize components
    if (typeof M !== 'undefined') {
        M.updateTextFields();
    }

    const fileInput = document.getElementById('image');
    const previewContainer = document.getElementById('image-preview');

    if (fileInput) {
        fileInput.addEventListener('change', function(e) {
            previewContainer.innerHTML = '';
            
            if (this.files && this.files[0]) {
                const file = this.files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '200px';
                        img.style.height = '200px';
                        img.style.objectFit = 'cover';
                        img.style.border = '1px solid #ddd';
                        img.style.borderRadius = '4px';
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    }
});
</script>

@endsection
