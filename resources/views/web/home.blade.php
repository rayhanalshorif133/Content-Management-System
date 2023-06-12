@extends('layouts.web')

@section('content')
    @include('layouts._partials.web.header')
    @include('layouts._partials.web.banner')
    <main role="main">
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
            <div id="one_carousel" class="owl-carousel ">
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/image-02.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Game name</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/image-01.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Game name</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Section one End /-->

        <!--/ Section Two Star /-->
        <section id="section_two">
            <div class="wrap-two  d-flex justify-content-between mt-3">
                <div class="title-box">
                    <h3 class="title-a">Most Popular</h3>
                </div>
                <div class="more-link">
                    <a href="#">see all
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div id="two_carousel" class="owl-carousel ">
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/img-1.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Name -1 sdfsf asdf asdf adassd</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">

                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/img-2.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Name -1</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/img-3.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Name -1</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!--/ Section two End /-->
        <!--/ Section Three Star /-->
        <section id="section_four" style="margin-bottom: 15%;">
            <div class="wrap-four  d-flex justify-content-between mt-3">
                <div class="title-box">
                    <h3 class="title-a">Recomended</h3>
                </div>
                <div class="more-link">
                    <a href="#">Seel all
                        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
            <div id="four_carousel" class="owl-carousel ">
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/img-6.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Name -1 sdfsf asdf asdf adassd</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/img-5.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Name -1 sdfsf asdf asdf adassd</p>
                        </a>
                    </div>
                </div>
                <div class="carousel-item-b">
                    <div class="card-box-a card-shadow">
                        <a href>
                            <img class="card-img-top cover img-responsive" src="{{ asset('web/images/img-8.jpg') }}"
                                alt="Card image cap ">
                            <p class="card-text text-center">Name -1</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
