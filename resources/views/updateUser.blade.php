@extends('layouts.parent')
@section('content')
<!-- Update user detail page -->
<div class="col-lg-10 col-md-9 col-8">
    <div class="card card-primary">
      <div class="card-header bg4 tx1 my-auto">
        <h3 class="card-title my-auto">Update User</h3>
      </div>

      <form role="form" method="POST" action="/showUser/{{$user->id}}">
        @csrf
        @method('PUT')
        <div class="card-body sans tx3">

          <div class="form-group">
            <label for="title">Username</label>
          <input type="text" value="{{old('username', $user->username) }}" class="form-control" id="username" name="username" placeholder="Username" required>

          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          </div>

          <div class="form-group">
            <label for="description">Name</label>
            <input type="text" class="form-control" id="name" value="{{old('name', $user->name) }}" name="name" placeholder="name" required>

            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Gender</label>
            <input type="text" class="form-control" id="gender" value="{{old('gender', $user->gender) }}" name="gender" placeholder="gender" required>

            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-md bg4 tx1 change">Post</button>
        </div>

      </form>
    </div>
</div>


@endsection
