@php
    use App\Models\Subscriber;
    $subscriber = new Subscriber();
    
    $isSubscriber = Subscriber::select()
        ->where('msisdn', $subscriber->get_msisdn())
        ->where('status', 1)
        ->first();
@endphp

@extends('layouts.web', ['title' => 'Details'])

@section('content')
    @include('layouts._partials.web.top-banner-panel', ['title' => 'Detail'])
    <main role="main">
        @include('layouts._partials.web.subscribe')
        <section id="game-panel">
            <div class="container-fluid">
                <div class="row mt-3" style="margin-bottom: 10%;">
                    <div class="col-12 sm-12">
                        <div class="game-part">
                            <ul>
                                <li>
                                    <div class="row row-cols-1 row-cols-sm-2">
                                        <div class="col-5">
                                            <img src="{{ asset($content->banner_image) }}" alt="" title=""
                                                class="item img-fluid" style="height: 100%;">
                                        </div>
                                        <div class="col-7">
                                            <h4 class="game-name text-white">{{ $content->title }}</h4>
                                            <div class="game-category">
                                                <p class="text-white">[{{ $content->category->name }}]</p>
                                            </div>
                                            <div class="game-download">
                                                @if ($isSubscriber)
                                                    <a href="{{ asset($content->file_name) }}"
                                                        class="download-btn btn btn-danger" style="color:#fff;"
                                                        download>Download</a>
                                                @else
                                                    <a href="{{ route('subscriber.confirmation') }}"
                                                        class="download-btn btn btn-sm btn-danger"
                                                        style="color:#fff;">Download</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <h2 class="game-title">Similar Games</h2>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 sm-12">
                        <div class="game-part">
                            <ul>
                                @foreach ($similarContents as $key => $similarContent)
                                    @php
                                        $lastKey = $similarContents
                                            ->reverse()
                                            ->keys()
                                            ->first();
                                    @endphp
                                    <li @if ($key == $lastKey) style="margin-bottom: 15%;" @endif>
                                        <div class="row row-cols-1 row-cols-sm-2">
                                            <div class="col-5">
                                                <img src="{{ asset($similarContent->banner_image) }}" alt=""
                                                    title="" class="item img-fluid" style="height: 100%;">
                                            </div>
                                            <div class="col-7">
                                                <h4 class="game-name text-white">{{ $similarContent->title }}</h4>
                                                <div class="game-category">
                                                    <p class="text-white">[{{ $similarContent->category->name }}]</p>
                                                </div>
                                                <div class="game-download">
                                                    @if ($isSubscriber)
                                                        <a href="{{ asset($similarContent->file_name) }}"
                                                            class="download-btn btn btn-danger" style="color:#fff;"
                                                            download>Download</a>
                                                    @else
                                                        <a href="{{ route('subscriber.confirmation') }}"
                                                            class="download-btn btn btn-sm btn-danger"
                                                            style="color:#fff;">Download</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
