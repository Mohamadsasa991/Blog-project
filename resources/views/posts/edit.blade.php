@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="py-3 text-center text-primary fw-bold">
        Edit Your Post
    </h1>
</div>

<div class="col-8 mx-auto">
    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <form action="{{ url('posts/'.$post->id) }}"
                  method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <!-- Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Post Title</label>
                    <input type="text" value="{{ $post->title }}" class="form-control" name="title">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Post Description</label>
                    <textarea name="description" class="form-control" rows="6">{{ $post->description }}</textarea>
                </div>

                <!-- Tags -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tags</label>
                    <select name="tags[]" multiple class="form-select">
                        @foreach ($tags as $tag)
                            <option
                                @if($post->tags->contains($tag)) selected @endif
                                value="{{ $tag->id }}">
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple tags</small>
                </div>

                <!-- Writer -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Writer</label>
                    <select name="user_id" class="form-select">
                        @foreach ($users as $user)
                            <option @selected($user->id == $post->user_id) value="{{ $user->id }}">
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Current Image -->
                @if($post->image())
                <div class="mb-3">
                    <label class="form-label fw-semibold">Current Image</label>
                    <div>
                        <img src="{{ $post->image() }}" class="img-thumbnail rounded mb-2" width="200" alt="">
                    </div>
                </div>
                @endif

                <!-- Upload new Image -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Upload New Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success rounded-pill py-2">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
