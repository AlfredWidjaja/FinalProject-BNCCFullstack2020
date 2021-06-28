@extends('layouts.parent')
@section('content')
<!-- Show user list page -->
    <div class="col-lg-10 col-md-9 col-8">
        <div class="card bg5">
            <div class="card-header bg4 tx1 border-bottom-0">
              <h3 class="my-auto">User List</h3>
            </div>
            <div class="card-body sans tx3 pt-0">

                  <div class="row justify-content-around mt-3">

                 <!-- To Show every user registered in DiscussRoom -->
                  @forelse ($user as $key => $t)
                  <div class="card bg-light col-lg-3 col-md-6 col-12">
                      <div class="card-body my-auto mx-auto my-auto tx2">
                          <div class="row mt-2">
                              <div class="text-center col-12 my-auto">
                                  <div class="icon my-auto row">

                                      <img class="border rounded-circle mx-auto" src="{{url('img/profile.png')}}" width="50" height="50">
                                      <div class="col-12 font-weight-bold mx-auto">
                                          {{$t->username}}
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row mx-auto mb-5">
                          <a href="{{ url('/showUser', ['user' => $t->id] ) }}" class="btn btn-sm bg4 tx1 change">Show</a>&emsp;

                          <!-- To determine wether user has authorization to update user detail -->
                          @if(auth::user()!=false)
                            @if (auth::user()->id == $t->id)
                                <a href="{{ url("/showUser/$t->id/edit") }}" class="btn btn-sm bg4 tx1 change">Update</a>&emsp;
                            @endif
                          @endif
                      </div>
                  </div>

                      @empty
                      <div class="card-body bg-light sans border tx3">
                        <p>There aren't any user</p>
                    </div>
                  @endforelse
                  </div>
              </div>
            </div>
        </div>
    </div>

@endsection
