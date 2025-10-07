@extends('layout.app')

@section('content')
<div class="col-12 d-flex justify-content-between align-items-center">
<h1 class="py-3 text-primary fw-bold mb-0">
All Posts
</h1>
@can('create-post')
<a href="{{ url('posts/create') }}" class="btn btn-primary rounded-pill px-4">
+ Add New Post
</a>
@endcan
</div>

<div class="col-12 mt-3">
@if (session()->get('success'))
<div class="alert alert-success">
{{ session()->get('success') }}
</div>
@endif

<div class="table-responsive">
<table class="table table-striped table-hover align-middle shadow-sm">
<thead class="table-primary text-center">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Writer</th>
        <th>Tags</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach ($posts as $post)
    <tr>
        <td class="text-center">{{ $post->id }}</td>
        <td class="fw-semibold">{{ $post->title }}</td>
        <td class="text-truncate" style="max-width: 200px;">{{ $post->description }}</td>
        <td>{{ $post->user->name }}</td>
        <td class="text-center">
            @foreach ($post->tags as $tag)
                <span class="badge bg-primary">{{ $tag->name }}</span>
            @endforeach
        </td>
        <td class="text-center">
            <img src="{{ $post->image() }}" class="img-thumbnail rounded" width="100" height="100" alt="">
        </td>
        <td class="text-center">
            @can('update-control', $post)
            <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn-info btn-sm rounded-pill px-3">
                Edit
            </a>
            @endcan
        </td>
        <td class="text-center">
            <form action="{{ url('posts/'.$post->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-3">
                    Delete
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>

<div class="d-flex justify-content-center mt-3">
{{ $posts->links() }}
</div>
</div>
@endsection
