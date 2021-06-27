@extends('layouts.parent')

@section('content')
<div class="col-lg-10 col-md-9 col-8">

    <div class="card-header bg4 tx1 border-bottom-0">
        <div class="row d-flex justify-content-between my-auto">
            <h3 class="my-auto ml-3 tx1 mr-auto">Thread List</h3>
            <div class="mb-3 mr-4 ml-auto my-auto">
              <a class="btn bg1 tx2 mb-3 my-auto font-weight-bold change1" href="{{url("/threadList/create")}}">New Thread</a>
            </div>
        </div>
    </div>

    <div class="p-0">
      @if(session('success'))
        <div class="alert alert-success">
          {{session('success')}}
        </div>
      @endif

        @forelse ($threads as $key => $t)
          <div class="card-body bg-light sans border tx3">
              <div class="row">
                  <div class="text-center col-2 my-auto">
                      <div class="icon my-auto row">
                          <img class="mx-auto border rounded-circle ml-2" src="{{url('img/profile.png')}}" width="40" height="40">
                          <div class="col-12 mx-auto">
                              <a href="{{url("/showUser/$t->user_id")}}" class="tx2 change1">{{$t->task->username}}</a>
                          </div>
                      </div>
                  </div>
                  <div class="col-9 text-left">
                      <h5><strong>{{$t->title}}</strong></h5>
                      <p>{{$t->description}}</p>

                      <div class="row ml-2">
                           <a href="{{ url("/threadList/$t->id") }}" class="btn btn-sm bg4 tx1 change">Show</a>&emsp;
                           @if(auth::user()!=false)
                             @if (auth::user()->id == $t->user_id)
                                 <a href="{{ url("/threadList/$t->id/edit") }}" class="btn btn-sm bg4 tx1 change">Update</a>&emsp;
                                 <form method="POST" action="{{ url("/threadList/$t->id")}}">
                                     @csrf

                                     @method('DELETE')
                                     <input type="submit" value="Delete"class="btn btn-sm bg4 tx1 change">
                                 </form>
                             @endif
                           @endif
                      </div>
                  </div>
              </div>
          </div>
          @empty
                <div class="card-body bg-light sans border tx3">
                  <p>There aren't any thread</p>
              </div>
          @endforelse
    </div>
  </div>
@endsection
