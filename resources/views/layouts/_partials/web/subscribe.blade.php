@php
    use App\Models\Subscriber;
    $subscriber = new Subscriber();
    
    $isSubscriber = Subscriber::select()
        ->where('msisdn', $subscriber->get_msisdn())
        ->where('status', 1)
        ->first();
@endphp

<section id="subscribe-btn">
    <div class="container-fluid">
        @if (!$isSubscriber)
            <div class="row justify-content-center ">
                <div class="col-md-10 col-sm-12">
                    <p class="text-white text-center">Subscribe to "WWEBD Service" You'll
                        be charged Tk 2.67(including all
                        taxes)/day(Auto-Renewal) and
                        get unlimited
                        number of contents every day.</p>
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <!-- <div class="col-4"></div> -->
            @if ($isSubscriber)
                <div class="col-md-4 text-center col-sm-4 my-3">
                    <a href="{{ route('subscriber.cancel-confirmation') }}"
                        class="btn btn-outline-danger text-center btn-block btn-lg text-white">Unsubscribe</a>
                </div>
            @else
                <div class="col-md-4 text-center col-sm-4 my-3">
                    <a href="{{ route('subscriber.confirmation') }}"
                        class="btn btn-outline-success text-center btn-block btn-lg text-white">Subscribe</a>
                </div>
            @endif
            <!-- <div class="col-4"></div> -->
        </div>
    </div>
</section>
