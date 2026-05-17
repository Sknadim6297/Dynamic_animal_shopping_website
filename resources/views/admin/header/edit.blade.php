@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Edit Header Settings</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-add-blog sb2-2-1">
        <div class="box-inn-sp">
            <div class="inn-title">
                <h4>Edit Header Settings</h4>
                <p>Update header contact information and social media links</p>
            </div>
            <div class="bor">
                @if (session('success'))
                    <div class="alert alert-success" style="padding: 15px; margin-bottom: 20px; background-color: #4caf50; color: white; border-radius: 4px;">
                        {{ session('success') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.header.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <h5 style="margin-top: 20px; margin-bottom: 15px; color: #2196F3;">Logo Settings</h5>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <label style="font-size: 14px; color: #666;">Desktop Logo</label>
                            @if($headerSettings->logo_dark)
                                <div style="margin-bottom: 15px;">
                                    <p>Current Logo:</p>
                                    <img src="{{ asset($headerSettings->logo_dark) }}" alt="Current Logo" style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            @endif
                            <div class="file-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="logo_dark" id="logo_dark" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload Desktop Logo (leave empty to keep current)">
                                </div>
                            </div>
                            @error('logo_dark')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <label style="font-size: 14px; color: #666;">Mobile Logo</label>
                            @if($headerSettings->logo_white)
                                <div style="margin-bottom: 15px;">
                                    <p>Current Logo:</p>
                                    <img src="{{ asset($headerSettings->logo_white) }}" alt="Current Logo" style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            @endif
                            <div class="file-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="logo_white" id="logo_white" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload Mobile Logo (leave empty to keep current)">
                                </div>
                            </div>
                            @error('logo_white')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <label style="font-size: 14px; color: #666;">Footer Logo</label>
                            @if($headerSettings->logo_footer)
                                <div style="margin-bottom: 15px;">
                                    <p>Current Logo:</p>
                                    <img src="{{ asset($headerSettings->logo_footer) }}" alt="Current Logo" style="max-width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            @endif
                            <div class="file-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="logo_footer" id="logo_footer" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload Footer Logo (leave empty to keep current)">
                                </div>
                            </div>
                            @error('logo_footer')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <h5 style="margin-top: 30px; margin-bottom: 15px; color: #2196F3;">Contact Information</h5>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="address" name="address" type="text" class="validate" value="{{ old('address', $headerSettings->address) }}">
                            <label for="address">Address</label>
                            @error('address')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" type="email" class="validate" value="{{ old('email', $headerSettings->email) }}">
                            <label for="email">Email</label>
                            @error('email')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea id="phone" name="phone" class="materialize-textarea validate" rows="3">{{ old('phone', $headerSettings->phone) }}</textarea>
                            <label for="phone">Phone Numbers</label>
                            <span class="helper-text">Add one or more numbers separated by commas or new lines.</span>
                            @error('phone')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <h5 style="margin-top: 30px; margin-bottom: 15px; color: #2196F3;">Social Media Links</h5>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="social_text" name="social_text" type="text" class="validate" value="{{ old('social_text', $headerSettings->social_text) }}">
                            <label for="social_text">Social Text (e.g., "We are social")</label>
                            @error('social_text')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="facebook_url" name="facebook_url" type="url" class="validate" value="{{ old('facebook_url', $headerSettings->facebook_url) }}">
                            <label for="facebook_url">Facebook URL</label>
                            @error('facebook_url')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="twitter_url" name="twitter_url" type="url" class="validate" value="{{ old('twitter_url', $headerSettings->twitter_url) }}">
                            <label for="twitter_url">Twitter URL</label>
                            @error('twitter_url')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="instagram_url" name="instagram_url" type="url" class="validate" value="{{ old('instagram_url', $headerSettings->instagram_url) }}">
                            <label for="instagram_url">Instagram URL</label>
                            @error('instagram_url')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <button type="submit" class="waves-effect waves-light btn-large">Update Header Settings</button>
                        </div>
                    </div>
                    
                    <h5 style="margin-top: 30px; margin-bottom: 15px; color: #2196F3;">Breadcrumb Settings</h5>
                    <div class="row">
                        <div class="input-field col s12">
                            <label style="font-size: 14px; color: #666;">Breadcrumb Background Image</label>
                            @if($headerSettings->breadcrumb_bg)
                                <div style="margin-bottom: 15px;">
                                    <p>Current Image:</p>
                                    <img src="{{ asset($headerSettings->breadcrumb_bg) }}" alt="Current Breadcrumb Background" style="max-width: 300px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                </div>
                            @endif
                            <div class="file-field">
                                <div class="btn">
                                    <span>File</span>
                                    <input type="file" name="breadcrumb_bg" id="breadcrumb_bg" accept="image/*">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text" placeholder="Upload Breadcrumb Background (leave empty to keep current)">
                                </div>
                            </div>
                            @error('breadcrumb_bg')
                                <span class="red-text">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
