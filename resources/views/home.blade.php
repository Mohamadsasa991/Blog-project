@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="py-3 border-bottom text-center text-primary fw-bold">
        All Posts
    </h1>
</div>

@foreach ($posts as $post)
<div class="col-8 mx-auto">
    <div class="card m-3 shadow-sm rounded-3">
        <!-- Card header -->
        <div class="card-header bg-light">
            <strong>{{ $post->user->name }}</strong>
            <span class="text-muted">- {{ $post->created_at->format('Y-m-d') }}</span>
        </div>

        <!-- Card body -->
        <div class="card-body">
            <!-- Image -->
            <div class="mb-3">
                <img src="{{ $post->image() }}" class="img-fluid rounded" style="max-height: 350px; object-fit: cover;" alt="">
            </div>

            <!-- Title & Description -->
            <h5 class="card-title fw-bold text-primary">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->description }}</p>

            <!-- Actions -->
            <a href="{{ url('posts/'.$post->id) }}" class="btn btn-primary btn-sm rounded-pill px-3">
                Show Post
            </a>
        </div>
    </div>
</div>
@endforeach

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $posts->links() }}
</div>
@endsection
