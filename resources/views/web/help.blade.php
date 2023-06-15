@extends('layouts.web', ['title' => 'Help'])

@section('content')
    @php
        
    @endphp

    @include('layouts._partials.web.top-banner-panel', ['title' => 'Help'])
    <main role="main" style="height: 80vh;">
        <section id="faq-panel">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="heading_1">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse_1" aria-expanded="true"
                                            aria-controls="collapse_1">
                                            1. How to use?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_1" class="collapse" aria-labelledby="heading_1"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        You need to log on to WAP site <a
                                            href="http://Wrestlingbd.com">http://Wrestlingbd.com</a> from
                                        your mobile via your
                                        mobile browser. You can then select from a range of mobile content. Remember to
                                        bookmark for easy access.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading_2">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse_2" aria-expanded="true"
                                            aria-controls="collapse_2">
                                            2. How to Subscribe?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_2" class="collapse" aria-labelledby="heading_2"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        <ul>
                                            <li>
                                                SMS: User will have to type “START WWE” and send to 16431 to get the WWEBD
                                                portal link then user will complete subscription by visiting the portal.
                                            </li>
                                            <li>
                                                Mobile site: User will Visit at <a
                                                    href="http://Wrestlingbd.com">http://Wrestlingbd.com</a> and click on
                                                “SUBSCRIBE” button to subscribe for the service.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading_3">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse_3" aria-expanded="true"
                                            aria-controls="collapse_3">
                                            3. How to Unsubscribe?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_3" class="collapse" aria-labelledby="heading_3"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        <ul>
                                            <li>
                                                SMS: Type “STOP WWE” and send to 16431
                                            </li>
                                            <li>
                                                Mobile site: Go to <a
                                                    href="http://Wrestlingbd.com">http://Wrestlingbd.com</a> and click on
                                                “UNSUBSCRIBE”
                                                button at the bottom of the portal.
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
