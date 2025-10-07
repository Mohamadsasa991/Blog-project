@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="my-3 text-center text-primary">Tag Info</h1>
</div>
<div class="col-6 mx-auto">
    <form action="{{route('tags.update',$tag->id)}}" class="form border p-3" method="POST">
        @csrf
        @method('PUT')
        {{-- @if (session()->get('success'))
        <p class="text-success p-1">{{session()->get('success')}}</p>
    @endif --}}
        @include('inc.message')
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" value="{{$tag->name}}" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="">Submit</label>
            <input type="Submit" value="Save" class="form-control bg-success text-white" id="">
        </div>
    </form>
</div>
@endsection
