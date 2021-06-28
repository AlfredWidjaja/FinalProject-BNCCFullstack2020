@extends('layouts.app')

@section('content')
<!-- Homepage page for DiscussRoom -->
    <div class="container px-5 mb-3 mt-5">
        <div class="row gx-5 align-items-center">
            <div class="col-lg-6 order-lg-2">
                <div class="p-5"><img class="img-fluid rounded" src="{{url('img/discussion.png')}}" alt="discuss image logo" /></div>
            </div>
            <div class="col-lg-6 order-lg-1 my-auto">
                <div class="p-5">
                    <h3 class="display-4 sans">Join Discussion</h3>
                    <p class="sans">Join our discussion forum where all ideas came from different person. Ask what you want detailed so other people could help you answer your difficulty. Do not forget to keep using polite word. A good environment will give you a good feedback. </p>
                    <a href="{{url('/threadList')}}">
                        <button type="button" class="tx1 navbut1 btn bg4 sans-serif">Discuss</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-5 mt-5 mb-5">
        <div class="row gx-5 align-right">
            <div class="col-lg-6">
                <div class="p-5"><img class="img-fluid rounded" src="{{url('img/about.png')}}" alt="chat logo" /></div>
            </div>
            <div class="col-lg-6 my-auto">
                <div class="p-5 text-right">
                    <h3 class="display-4 sans">About Us</h3>
                    <p class="sans">DiscussRoom is a free discussion forum for all type of thread discussion. Established in 2021 and aim to become one of the largest discussion forum website available across the internet.</p>
                    <!-- Still don't have about DiscussRoom page -->
                    <a href="{{url('/')}}">
                        <button type="button" class="tx1 navbut1 btn bg4 sans-serif">About</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
