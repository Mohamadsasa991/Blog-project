@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="py-3 text-center text-primary fw-bold border-bottom">
        {{ $post->title }}
    </h1>
</div>

<div class="col-10 mx-auto">
    <div class="card shadow-sm border-0 my-4">
        <div class="card-header bg-light fw-semibold">
            {{ $post->user->name }}
            <span class="text-muted"> • {{ $post->created_at->format('Y-m-d') }}</span>
        </div>
        <div class="card-body">
            @if ($post->image())
                <div class="mb-3">
                    <img src="{{ $post->image() }}" class="img-fluid rounded" alt="Post image" style="max-height: 400px; object-fit: cover; width: 100%;">
                </div>
            @endif

            <h4 class="card-title text-primary">{{ $post->title }}</h4>
            <p class="card-text text-secondary">{{ $post->description }}</p>

            @if ($post->tags->count() > 0)
                <div class="mt-3">
                    @foreach ($post->tags as $tag)
                        <span class="badge bg-primary">{{ $tag->name }}</span>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
