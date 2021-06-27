@extends('layouts.parent')
@section('content')
<div class="col-lg-10 col-md-9 col-8">
    <div class="card bg-light">
      <div class="card-header bg4 tx1 border-bottom-0">
        <h3 class="my-auto">User Details</h3>
      </div>
      <div class="card-body sans tx3 pt-0">
        <div class="row">
            <div class="text-center col-4 my-auto">
                <div class="icon my-auto row mx-auto">
                    <img class="border rounded-circle ml-2 mx-auto" src="{{url('img/profile.png')}}" width="40" height="40">
                    <div class="col-12 mx-auto">
                        <strong>{{$user->username}}</strong>
                    </div>
                </div>
            </div>
              <div class="col-7 mt-4">
                  <p class="text-sm" id="description">{{$user->name}}</p>
                  <p class="text-sm" id="description">{{$user->gender}}</p>
              </div>

        </div>
      </div>
  </div>
</div>
@endsection
