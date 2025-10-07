@extends('layout.app')

@section('content')
<div class="col-12">
    <h1 class="my-3 text-center text-primary">Create New User</h1>
</div>
<div class="col-6 mx-auto">
    <form action="{{route('users.store')}}" class="form border p-3" method="POST">
        @csrf
        @include('inc.message')
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="">Password</label>
            <input type="password" name="password" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control" id="">
        </div>
        <div class="mb-3">
            <label for="">Type</label>
            <select name="type" class="form-control" id="">
                <option value="admin">Admin</option>
                <option value="writer">Writer</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="">Submit</label>
            <input type="Submit" value="Save" class="form-control bg-success text-white" id="">
        </div>
    </form>
</div>
@endsection
