@extends('layout.app')

@section('content')
<div class="col-12">
    <a href="{{route('users.create')}}" class="btn btn-primary my-3">
        Add new user
    </a>
<h1 class="py-3 border m-3 text-center text-primary">All Users</h1>
</div>
<div class="col-12">
    @if (session()->get('success'))
    <p class="text-success p-1">{{session()->get('success')}}</p>
@endif
<table class="table table-borderd">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Type</th>
        <th>Posts</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $user )
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>{!!$user->type()!!}</td>
        <td>
        <a href="{{route('users.edit',$user->id)}}" class="btn btn-info">Edit</a>
        </td>
        <td>
        <a href="{{route('user.posts',$user->id)}}" class="btn btn-primary">Show Posts</a>
        </td>
        <td>
            <form action="{{route('users.destroy',$user->id)}}" method="post">
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
    {{$users->links()}}
</div>
</div>
@endsection
