<section id="top-banner-panel">
    <div class="container-fluid">
        <div class="row row-cols-3 row-cols-sm-3 justify-content-center mb-3">
            <div class="col-2 col-sm-1 text-left">
                <a href="{{ URL::previous() }}">
                    <img src="{{ asset('web/images/top-left-arrow.png') }}" class="img-fluid">
                </a>
            </div>
            <div class="col-8 col-sm-10 text-center">
                <h2 style="color: #09ffaf; text-align: center; font-size: 1.8rem;">
                    <a href="{{ route('home') }}" style="color: #09ffaf;">
                        {{ $title }}
                    </a>
                </h2>
            </div>
            <div class="col-2 col-sm-1 text-center">
            </div>
        </div>
    </div>
</section>
