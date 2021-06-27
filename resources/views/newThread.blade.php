@extends('layouts.parent')
@section('content')
<div class="col-lg-10 col-md-9 col-8">
    <div class="card card-primary">
        <div class="card-header  bg4 tx1">
          <h3 class="card-title my-auto">Create Thread</h3>
        </div>

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="POST" action="/threadList">
            @csrf

          <div class="card-body sans tx3 bg-light">

              <div class="form-group">
                <input type="hidden" class="form-control" id="user_id" name="user_id" placeholder="user_id" value='{{Auth::user()->id}}'>

                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

              </div>

            <div class="form-group">
              <label for="title">Thread Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Thread Title" required>

              @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror

            </div>

            <div class="form-group">
              <label for="description">Thread Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Description" required>

              @error('description')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror

            </div>

            <button type="submit" class="btn btn-md bg4 tx1 change">Create</button>
          </div>

          <!-- /.card-body -->



        </form>
      </div>
</div>


@endsection
