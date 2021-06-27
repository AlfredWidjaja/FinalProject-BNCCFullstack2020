@extends('layouts.parent')
@section('content')
<div class="col-lg-10 col-md-9 col-8">
    <div class="card card-primary">
      <div class="card-header bg4 tx1 my-auto">
        <h3 class="card-title my-auto">Update Thread</h3>
      </div>

      <form role="form" method="POST" action="/threadList/{{$threads->id}}">
        @csrf
        @method('PUT')
        <div class="card-body bg-light sans tx3">

          <div class="form-group">
            <label for="title">Thread Title</label>
          <input type="text" value="{{old('title', $threads->title) }}" class="form-control" id="title" name="title" placeholder="Thread Title" required>

          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          </div>

          <div class="form-group">
            <label for="description">Thread Description</label>
            <input type="text" class="form-control" id="description" value="{{old('description', $threads->description) }}" name="description" placeholder="Description" required>

            @error('description')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-group">
            <label for="description">Thread Status Locked</label>
            <input type="text" class="form-control" id="close" value="{{old('close', $threads->close) }}" name="close" placeholder="yes to locked, else is open" required>

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
