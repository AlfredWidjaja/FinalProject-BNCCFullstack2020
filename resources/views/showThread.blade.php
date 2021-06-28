@extends('layouts.parent')
@section('content')
    <div class="col-lg-10 col-md-9 col-8">
        <div class="card bg-light">
            <div class="card-header bg4 tx1 border-bottom-0">
                <h3 class="my-auto tx1">Thread Detail</h3>
            </div>

            <div class="card-body sans tx3">
              <div class="row">
                <div class="col-7">
                <h2 id = "title" class="tx2"><strong>{{$threads->title}}</strong></h2>
                <p class="text-sm tx3" id="description">{{$threads->description}}</p>
                </div>

              </div>
            </div>

            <div class="card-header bg4 tx1 border-bottom-0">
                <div class="row d-flex justify-content-between my-auto">
                    <h4 class="my-auto ml-3 tx1 mr-auto">Reply List</h4>

                    <!-- To make sure if threads closed then cant make reply -->
                     @if($threads->close != "yes")
                        <div class="mb-3 mr-4 ml-auto my-auto">
                            <a class="btn bg1 tx2 mb-3 my-auto font-weight-bold change1" href="{{url("/threadList/$threads->id/create")}}">Create Reply</a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-body pt-0">
                @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>
                @endif
               <!-- Reply list -->
                 @forelse ($reply as $key => $t)
                    <!-- Cek untuk memastikan reply yang ditampilkan yang sesuai thread_id-->
                     @if ($threads->id == $t->thread_id)
                          <div class="card-body tx3">
                              <div class="row">
                                  <div class="text-center col-sm-2 col-4 my-auto">
                                      <div class="icon my-auto row">
                                          <img class="border mx-auto rounded-circle ml-2" src="{{url('img/profile.png')}}" width="40" height="40">
                                          <div class="mx-auto col-12">
                                              <a href="{{url("/showUser/$t->user_id")}}" class="tx2 change1">{{$t->task->username}}</a>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-sm-9 col-7 text-left">
                                      <h5><strong>{{$t->title}}</strong></h5>
                                      <p>{{$t->description}}</p>
                                      <div class="row ml-2">

                                          <!-- To make sure if threads closed then cant make reply -->
                                          <!-- To reply another reply -->
                                          @if($threads->close != "yes")
                                              <a class="btn btn-sm bg4 tx1 change" href="{{url("/threadList/$t->id/createReply")}}">Reply</a>&emsp;
                                          @endif

                                          <!-- Check if the user is true -->
                                          @if(auth::user()!=false)
                                            @if (auth::user()->id == $t->user_id)
                                                <a href="{{ url("/threadList/$t->id/editable") }}" class="btn btn-sm bg4 tx1 change">Update</a>&emsp;

                                                <form method="POST" action="{{ url("/threadList/$t->id/delete")}}">
                                                    @csrf

                                                    @method('DELETE')
                                                    <input type="submit" value="Delete" class="btn btn-sm bg4 tx1 change">
                                                </form>
                                            @endif
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <hr>
                     @endif
                     @empty
                     <div class="card-body bg-light sans tx3">
                       <p>There aren't any reply</p>
                   </div>
                 @endforelse
            </div>
        </div>
    </div>
@endsection
