@extends('layouts.parent')
@section('content')
<!-- Update reply detail page -->
<div class="col-lg-10 col-md-9 col-8">
    <div class="card card-primary">
      <div class="card-header bg4 tx1">
        <h3 class="card-title my-auto">Update Reply</h3>
      </div>

      <form role="form" method="POST" action="{{url("/threadList/edited/$reply->id")}}">
        @csrf
        @method('PUT')
        <div class="card-body sans tx3">

          <div class="form-group">
            <label for="title">Reply Title</label>
          <input type="text" value="{{old('title', $reply->title) }}" class="form-control" id="title" name="title" placeholder="Reply Title" required>

          @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          </div>

          <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" value="{{old('description', $reply->description) }}" name="description" placeholder="Description" required>

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
