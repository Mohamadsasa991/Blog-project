@extends('layout.app')

@section('content')
<div class="col-12">
    <a href="{{route('tags.create')}}" class="btn btn-primary my-3">
        Add new tag
    </a>
<h1 class="py-3 border m-3 text-center text-primary">All Tags</h1>
</div>
<div class="col-12">
    @if (session()->get('success'))
    <p class="text-success p-1">{{session()->get('success')}}</p>
@endif
<table class="table table-borderd">
    <thead>
    <tr>
        <th>#</th>
        <th>Tag name</th>
        <th>Posts</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach ($tags as $tag )
    <tr>
        <td>{{$tag->id}}</td>
        <td>{{$tag->name}}</td>
        <td>
            @foreach ($tag->posts as $post )
            <span class=" badge bg-success m-2">{{$post->title}}-</span><br>
            @endforeach
        </td>
        <td>
            <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-info">Edit</a>
        </td>
        <td>
            <form action="{{route('tags.destroy',$tag->id)}}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </td>
    </tr>
    @endforeach
</tbody>
</table>
<div>
    {{$tags->links()}}
</div>
</div>
@endsection
