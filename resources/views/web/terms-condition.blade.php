@extends('layouts.web')

@section('content')
    @php
        
    @endphp

    @include('layouts._partials.web.top-banner-panel', ['title' => 'Terms & Conditions'])
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
                                            1. WWE
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_1" class="collapse" aria-labelledby="heading_1"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        WWE is a subscription based WAP portal which offers large pool of exclusive contents
                                        from one of the most popular sports on earth, “WWE” (World Wrestling Entertainment).
                                        The portal contains different categories like WWE Video shows/ Highlights, Video
                                        Clips, wallpaper, ringtone of WWE shows and many more. It will also provide the
                                        exclusive information’s on WWE super stars and upcoming stars profile and
                                        background. <br>
                                        <br>
                                        In case of subscription model the subscriber will get video streaming and the user
                                        will be able to download Unlimited any contents per day with subscription charge as
                                        low as Tk 2+(VAT, SD and SC). Once subscribed to WWE, subscribers will need an
                                        active data connection to be able to validate their subscription status and watch or
                                        download their desired contents.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading_2">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapse_2" aria-expanded="true"
                                            aria-controls="collapse_2">
                                            2. Tariff
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse_2" class="collapse" aria-labelledby="heading_2"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Package Type</th>
                                                    <th>Charge</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Subscription Based</td>
                                                    <td>Tk 2+(VAT, SD and SC)/Per day (auto renewal)</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <b>Note:</b> There will be data charge for browsing the portal and downloading. <br>
                                        <br>

                                        <hr>
                                        <div class="text-center">
                                            <b>First Level Support:</b><br>
                                            Support Email: cservice@b2m-tech.com<br> <br>
                                            <b>Second Level Support:</b><br>
                                            Md. Tariqul Islam (tariqul@b2m-tech.com, +8801711590392)

                                        </div>
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
