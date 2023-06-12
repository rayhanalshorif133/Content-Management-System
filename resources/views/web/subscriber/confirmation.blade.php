@extends('layouts.web')

@section('content')
    @include('layouts._partials.web.top-banner-panel', ['title' => $phone])
    <main role="main">
        <div class="row justify-content-center ">
            <div class="col-md-10 col-sm-12">
                <h3 class="text-white text-center">Subscribe to "WWEBD Service"</h3>
                <br>
                <h5 class="text-white text-center">You'll be charged Tk 2.67(including all
                    taxes)/day(Auto-Renewal) and
                    get unlimited
                    number of contents every day.</h5>
            </div>
        </div>
        <div class="justify-content-center ">
            <!-- <div class="col-4"></div> -->
            <div class="col-md-4 text-center col-sm-4 my-3 mx-auto">
                <a href="{{ route('subscriber.confirmed') }}"
                    class="btn btn-outline-success text-center btn-block btn-lg text-white">
                    Register
                </a>
            </div>
            <div class="col-md-4 text-center col-sm-4 my-3 mx-auto">
                <h5 class="text-white text-center">
                    Cancel and Back to home
                </h5>
            </div>
            <div class="col-md-4 text-center col-sm-4 my-3 mx-auto">
                <a href="{{ route('home') }}" class="btn btn-outline-danger text-center btn-block btn-lg text-white">
                    Back
                </a>
            </div>
            <!-- <div class="col-4"></div> -->
        </div>
        <section id="game-panel">

        </section>
    </main>
@endsection
