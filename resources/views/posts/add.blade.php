@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="py-3 text-center text-primary fw-bold">
        Add New Post
    </h1>
</div>

<div class="col-8 mx-auto">
    <div class="card shadow-sm rounded-3">
        <div class="card-body">
            <form action="{{ url('posts') }}" method="POST" enctype="multipart/form-data">
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

                <!-- Success -->
                @if (session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif

                <!-- Title -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Post Title</label>
                    <input type="text" value="{{ old('title') }}" class="form-control" name="title" placeholder="Enter post title">
                </div>

                <!-- Description -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Post Description</label>
                    <textarea name="description" class="form-control" rows="6" placeholder="Enter post description">{{ old('description') }}</textarea>
                </div>

                <!-- Writer -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Writer</label>
                    <select name="user_id" class="form-select">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tags -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tags</label>
                    <select name="tags[]" multiple class="form-select">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold CTRL (Windows) or CMD (Mac) to select multiple tags</small>
                </div>

                <!-- Image -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Post Image</label>
                    <input type="file" class="form-control" name="image">
                </div>

                <!-- Submit -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-success rounded-pill py-2">
                        Save Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
