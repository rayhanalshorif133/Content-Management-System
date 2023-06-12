@extends('layouts.web')

@section('content')
    @include('layouts._partials.web.top-banner-panel', ['title' => 'Configurations'])
    <main role="main">
        <div class="row justify-content-center mt-5">
            <div class="col-md-10 col-sm-12">
                <h3 class="text-white text-center">Unsubscription successful 😒</h3>
                <br>
            </div>
        </div>
        <div class="justify-content-center ">
            <div class="col-md-4 text-center col-sm-4 my-3 mx-auto">
                <a href="{{ route('home') }}" class="btn btn-outline-danger text-center btn-block btn-lg text-white">
                    Back
                </a>
            </div>
        </div>
    </main>
@endsection
