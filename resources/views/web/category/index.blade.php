@extends('layouts.web', ['title' => 'Category'])

@section('content')
    @include('layouts._partials.web.top-banner-panel', ['title' => 'Category'])
    <main role="main">
        @include('layouts._partials.web.subscribe')
        <section id="game-panel">
            <div class="container-fluid">
                <div class="row mt-3" style="margin-bottom: 10%;">
                    <div class="col-12 sm-12">
                        <div class="game-part">
                            <div class="row row-cols-1 row-cols-sm-2">
                                @for ($index = 0; $index < count($categories); $index++)
                                    @php
                                        $category = $categories[$index];
                                    @endphp
                                    <div class="col-6">
                                        <img src="{{ asset($category->image) }}" alt title class="item img-fluid"
                                            style="height: 100%;">
                                        <p class="text-white text-center mt-2">{{ $category->name }} </p>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
