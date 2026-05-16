@extends('admin.layouts.layout')
@section('content')

<div class="sb2-2">
    <div class="sb2-2-2">
        <ul>
            <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
            </li>
            <li class="active-bre"><a href="#"> Blogs</a>
            </li>
        </ul>
    </div>
    <div class="sb2-2-3">
        <div class="row">
            <div class="col-md-12">
                <div class="box-inn-sp">
                    <div class="inn-title" style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div>
                            <h4>All Blogs</h4>
                            <p>Manage your blog posts</p>
                        </div>
                        <a class="btn waves-effect waves-light" href="{{ route('admin.blog.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success" style="margin: 15px; padding: 10px; background-color: #4caf50; color: white; border-radius: 4px;">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="tab-inn">
                        <div class="table-responsive table-desi">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Blog Heading</th>
                                        <th>Category</th>
                                        <th>Posted By</th>
                                        <th>Posting Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($blogs as $blog)
                                    <tr>
                                        <td>
                                            @if($blog->image)
                                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->blog_heading }}" style="width: 80px; height: 60px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px;">
                                            @else
                                                <span class="grey-text">No image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>{{ Str::limit($blog->blog_heading, 50) }}</strong>
                                        </td>
                                        <td>
                                            <span style="background-color: #2196F3; color: white; padding: 5px 10px; border-radius: 3px; font-size: 12px;">
                                                {{ $blog->blog_category }}
                                            </span>
                                        </td>
                                        <td>
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                @if($blog->posted_by_image)
                                                    <img src="{{ asset($blog->posted_by_image) }}" alt="{{ $blog->posted_by }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%; border: 1px solid #ddd;">
                                                @endif
                                                <span>{{ $blog->posted_by }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $blog->posting_date->format('M d, Y') }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.edit', $blog->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.blog.destroy', $blog->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this blog?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer; color: #f44336;">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" style="text-align: center; padding: 20px;">
                                            No blogs found. <a href="{{ route('admin.blog.create') }}">Create your first blog post</a>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
