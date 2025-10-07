@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="py-3 text-center text-primary fw-bold border-bottom">
        All Posts
    </h1>
</div>

@foreach ($posts as $post)
<div class="col-8 mx-auto">
    <div class="card m-4 shadow-sm border-0">
        <div class="card-header bg-light fw-semibold">
            {{ $post->user->name }}
            <span class="text-muted"> • {{ $post->created_at->format('Y-m-d') }}</span>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <img src="{{ $post->image() }}" class="img-fluid rounded" alt="Post image" style="max-height: 350px; object-fit: cover; width: 100%;">
            </div>
            <h4 class="card-title text-primary">{{ $post->title }}</h4>
            <p class="card-text text-secondary">{{ $post->description }}</p>
            <a href="{{ url('posts/'.$post->id) }}" class="btn btn-primary rounded-pill px-4">
                Show Post
            </a>
        </div>
    </div>
</div>
@endforeach

<div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
</div>
@endsection
