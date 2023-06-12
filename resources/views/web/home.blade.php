@extends('layouts.web')

@section('content')
    @include('layouts._partials.web.header')
    @include('layouts._partials.web.banner')
    <main role="main">
        <div class="container">
            @if (Session::has('message'))
                <div class="text-center alert alert-{{ Session::get('class') }}">
                    {{ Session::get('message') }}
                </div>
            @endif
        </div>
        @include('layouts._partials.web.subscribe')
        <!--/ Section one Star /-->
        <section id="section_one">
            <div class="wrap-one  d-flex justify-content-between">
                <div class="title-box">
                    <h3 class="title-a">New Release</h3>
                </div>
                <div class="more-link">
                    <a href="#">see all
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div id="one_carousel" class="owl-carousel">
                @foreach ($newContents as $newContent)
                    <div class="carousel-item-b">
                        <div class="card-box-a card-shadow">
                            <a href={{ route('content.details', $newContent->id) }}>
                                <img class="card-img-top cover img-responsive" src="{{ asset($newContent->banner_image) }}"
                                    alt="Card image cap ">
                                <p class="card-text text-center text-white">
                                    {{ $newContent->title }}
                                </p>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        <!--/ Section one End /-->

        @foreach ($categories as $key => $item)
            <!--/ Section Two Star /-->
            @php
                $last_key = $categories
                    ->reverse()
                    ->keys()
                    ->first();
            @endphp

            <section id="section_two" class="section_carousel" data-value="{{ $categories->count() }}"
                @if ($key == $last_key) style="margin-bottom: 15%;" @endif>
                <div class="wrap-two  d-flex justify-content-between mt-3">
                    <div class="title-box">
                        <h3 class="title-a">{{ $item->name }}</h3>
                    </div>
                    <div class="more-link">
                        <a href="#">see all
                            <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
                <div id="carousel_{{ $key }}" class="owl-carousel">
                    @foreach ($item->contents as $content)
                        <div class="carousel-item-b">
                            <div class="card-box-a card-shadow">
                                <a href={{ route('content.details', $content->id) }}>
                                    <img class="card-img-top cover img-responsive" src="{{ asset($content->banner_image) }}"
                                        alt="Card image cap ">
                                    <p class="card-text text-center text-white">{{ $content->title }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach
    </main>
@endsection
