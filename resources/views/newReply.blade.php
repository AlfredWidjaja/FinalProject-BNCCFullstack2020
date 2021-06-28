@extends('layouts.parent')
@section('content')
<!-- Create reply page -->
<div class="col-lg-10 col-md-9 col-8">
    <div class="card card-primary">
        <div class="card-header bg4 tx1">
          <h3 class="card-title my-auto">Create Reply</h3>
        </div>

        <!-- form start -->
        <form role="form" method="POST" action="{{url("/threadList/$threads->id")}}">
            @csrf

          <div class="card-body sans tx3 bg-light">

              <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="user_id" value="{{Auth::user()->id}}">
                @error('user_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <input type="hidden" class="form-control" id="thread_id" name="thread_id" placeholder="user_id" value="">
                @error('thread_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>

            <div class="form-group">
              <label for="title">Reply Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Reply Title" required>
              @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="description">Reply Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>
              @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-md bg4 tx1 change">Create</button>
          </div>

        </form>
      </div>
</div>


@endsection
