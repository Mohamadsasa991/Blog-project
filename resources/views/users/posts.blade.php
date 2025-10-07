@extends('layout.app')

@section('content')
<div class="col-12">
    <a href="{{url('posts/create')}}" class="btn btn-primary my-3">
        Add new post
    </a>
<h1 class="py-3 border m-3 text-center text-primary">All Posts For {{$user->name}}</h1>
</div>
<div class="col-12">
    @if (session()->get('success'))
    <p class="text-success p-1">{{session()->get('success')}}</p>
@endif
<table class="table table-borderd">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Writer</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach ($user->posts as $post )
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>{{$post->user->name}}</td>
        <td>
        <a href="{{url('posts/'.$post->id.'/edit')}}" class="btn btn-info">Edit</a>
        </td>
        <td>
            <form action="{{url('posts/'.$post->id)}}" method="post">
                @method('DELETE')
                @csrf

                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
@endsection
