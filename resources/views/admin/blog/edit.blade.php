@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Edit Blog</a>
            </li>
            <li class="page-back"><a href="{{ route('admin.blog.index') }}"><i class="fa fa-backward" aria-hidden="true"></i> Back</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Blog</h4>
                <p>Update blog post information</p>
            </div>
            <div class="bor">
                <form method="POST" action="{{ route('admin.blog.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="blog_heading" name="blog_heading" type="text" class="validate" value="{{ old('blog_heading', $blog->blog_heading) }}" required>
                            <label for="blog_heading">Blog Heading <span class="red-text">*</span></label>
                            @error('blog_heading')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label for="blog_details">Blog Details <span class="red-text">*</span></label>
                            <textarea id="blog_details" name="blog_details" class="materialize-textarea" rows="10" required>{{ old('blog_details', $blog->blog_details) }}</textarea>
                            @error('blog_details')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            @if($blog->image)
                                <div style="margin-bottom: 15px;">
                                    <p>Current Blog Image:</p>
                                    <img src="{{ asset($blog->image) }}" alt="Current Image" style="width: 300px; height: 200px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                                </div>
                            @endif
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Change Blog Image</span>
                                    <input type="file" name="image" id="image" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload new image (optional)">
                                </div>
                            </div>
                            <small class="grey-text">Leave empty to keep current image. Supported formats: JPEG, PNG, JPG, GIF (Max 2MB)</small>
                            @error('image')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                            <div id="image-preview" style="margin-top: 20px;"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select id="blog_category" name="blog_category" class="validate" required>
                                <option value="" disabled>Choose Blog Category</option>
                                <option value="Accessories" {{ old('blog_category', $blog->blog_category) == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                                <option value="Cats" {{ old('blog_category', $blog->blog_category) == 'Cats' ? 'selected' : '' }}>Cats</option>
                                <option value="Dogs" {{ old('blog_category', $blog->blog_category) == 'Dogs' ? 'selected' : '' }}>Dogs</option>
                                <option value="Lifestyle" {{ old('blog_category', $blog->blog_category) == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                                <option value="Nutrition" {{ old('blog_category', $blog->blog_category) == 'Nutrition' ? 'selected' : '' }}>Nutrition</option>
                                <option value="Pet" {{ old('blog_category', $blog->blog_category) == 'Pet' ? 'selected' : '' }}>Pet</option>
                                <option value="Toys" {{ old('blog_category', $blog->blog_category) == 'Toys' ? 'selected' : '' }}>Toys</option>
                            </select>
                            <label for="blog_category">Blog Category <span class="red-text">*</span></label>
                            @error('blog_category')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="posted_by" name="posted_by" type="text" class="validate" value="{{ old('posted_by', $blog->posted_by) }}" required>
                            <label for="posted_by">Posted By <span class="red-text">*</span></label>
                            @error('posted_by')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            @if($blog->posted_by_image)
                                <div style="margin-bottom: 15px;">
                                    <p>Current Posted By Image:</p>
                                    <img src="{{ asset($blog->posted_by_image) }}" alt="Current Image" style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd; border-radius: 50%;">
                                </div>
                            @endif
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Change Posted By Image</span>
                                    <input type="file" name="posted_by_image" id="posted_by_image" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload new image (optional)">
                                </div>
                            </div>
                            <small class="grey-text">Leave empty to keep current image. Supported formats: JPEG, PNG, JPG, GIF (Max 2MB)</small>
                            @error('posted_by_image')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                            <div id="posted-by-image-preview" style="margin-top: 20px;"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="posting_date" name="posting_date" type="date" class="validate" value="{{ old('posting_date', $blog->posting_date->format('Y-m-d')) }}" required>
                            <label for="posting_date">Posting Date <span class="red-text">*</span></label>
                            @error('posting_date')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update</button>
                            <a href="{{ route('admin.blog.index') }}" class="waves-effect waves-light btn-large grey" style="margin-left: 10px;">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Materialize components
    if (typeof M !== 'undefined') {
        M.updateTextFields();
        M.FormSelect.init(document.querySelectorAll('select'));
    }

    // Initialize CKEditor for blog details
    CKEDITOR.replace('blog_details', {
        height: 400,
        toolbar: [
            { name: 'document', items: ['Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates'] },
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt'] },
            { name: 'forms', items: ['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'] },
            '/',
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl'] },
            { name: 'links', items: ['Link', 'Unlink', 'Anchor'] },
            { name: 'insert', items: ['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe'] },
            '/',
            { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize'] },
            { name: 'colors', items: ['TextColor', 'BGColor'] },
            { name: 'tools', items: ['Maximize', 'ShowBlocks'] },
            { name: 'about', items: ['About'] }
        ]
    });

    // Image preview for blog image
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
                        img.style.width = '300px';
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

    // Image preview for posted by image
    const postedByFileInput = document.getElementById('posted_by_image');
    const postedByPreviewContainer = document.getElementById('posted-by-image-preview');

    if (postedByFileInput) {
        postedByFileInput.addEventListener('change', function(e) {
            postedByPreviewContainer.innerHTML = '';
            
            if (this.files && this.files[0]) {
                const file = this.files[0];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.style.width = '150px';
                        img.style.height = '150px';
                        img.style.objectFit = 'cover';
                        img.style.border = '1px solid #ddd';
                        img.style.borderRadius = '50%';
                        postedByPreviewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            }
        });
    }

    // Sync CKEditor content to textarea before form submission
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            // Update textarea with CKEditor content
            for (var instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        });
    }
});
</script>

@endsection
