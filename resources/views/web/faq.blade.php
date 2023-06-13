@extends('layouts.web')

@section('content')
    @php
        
        $faqContents = [
            [
                'id' => 1,
                'question' => 'What is WWE',
                'answer' => 'It is a WAP based portal for Bangladeshi users. WWE portal contains video and
                            wallpaper of various events of world wrestling entertainment. The portal will be
                            accessible to mobile user with active data subscribers who will browse using
                            3G/EDGE/GPRS connection on mobile browser and watch unlimited video by streaming and
                            download Unlimited contents per day. To watch/Download any content users have to
                            subscribe to this service with the charge as low as TK 2 +(VAT, SD and SC)/day (auto-renewable).',
            ],
            [
                'id' => 2,
                'question' => 'How do I start Streaming in my Mobile? ',
                'answer' => 'Find your desired content, click on the content click on the watch now button to
                            start streaming automatically. If default player is not selected for the streaming
                            the mobile might ask to choose a player for streaming.',
            ],
        
            [
                'id' => 3,
                'question' => 'What if I don’t want to subscribe to the service but I want to download a particular content? ',
                'answer' => 'If you don’t want to subscribe to the service you can still download the contents on-demand basis. Click on your desired content it will ask for subscription, skip the subscription by clicking “Cancel” it will redirect you to the on-demand option confirm by clicking “OK” and download the content. ',
            ],
            [
                'id' => 4,
                'question' => 'Why do I need a data connection?',
        
                'answer' => 'Data connection is required to validate your subscription status with the platform',
            ],
        
            [
                'id' => 5,
                'question' => 'Is there any data charge for browsing the portal and watch content?',
                'answer' => '',
            ],
        
            [
                'id' => 6,
                'question' => 'What kind of mobile will be compatible for WWEBD portal?',
                'answer' => 'User will be able to use the service with handsets using Android operating system.',
            ],
        
            [
                'id' => 7,
                'question' => 'What will happen if any non-member clicks to watch content from WWEBD?',
                'answer' => 'When a non-member user visits WWE portal s/he will get a subscription request at the beginning, if he/she denies to subscribe, then s/he will get a notification which will show the details of the content price if s/he confirms then the user can watch the content on demand basis.',
            ],
        
            [
                'id' => 8,
                'question' => 'Where can I find the content which I have already watched? How can I watch it again? Do I need to pay again to watch that content?',
                'answer' => 'You can go to “history” section to see the list of videos that has already been watched from your account. For subscribed user watching content by streaming is free of cost. On pay per content modality user have to pay every time they want to watch a content.',
            ],
        
            [
                'id' => 9,
                'question' => 'If a user double clicks or sends double SMS for subscription then will the user be charged twice?',
                'answer' => 'Users will be charged only once for subscription. If any existing user sends subscription request more than once, then they will receive a free notification that they are already subscribed for the service.',
            ],
        
            [
                'id' => 10,
                'question' => 'Will I be able to subscribe if my handset is not supported?',
                'answer' => 'No, you will not be able to subscribe to this service if your handset is not supported. We can detect Handsets model, brand, Operating system and browser. If any of these options does not support, user will not be able to subscribe at WWEBD portal.',
            ],
        
            [
                'id' => 11,
                'question' => 'What will happen if I change my Phone?',
                'answer' => 'If you change your handset and continue having the old SIM card, then you will remain a subscriber to the service. And you can just use the service as you were earlier. ',
            ],
        
            [
                'id' => 12,
                'question' => 'What happens when I change my SIM card?',
                'answer' => 'If you change your SIM card then you will have to subscribe to the service once again with your new SIM. ',
            ],
        
            [
                'id' => 13,
                'question' => 'I cannot watch any of the content!',
                'answer' => 'You may have a poor network or the video does not support your default player. Try changing the player and switch your mobile to 3G mode. ',
            ],
            [
                'id' => 14,
                'question' => 'I could watch Movie or videos till yesterday, but can’t play today. ',
                'answer' => 'Possible reason for not playing the contents as follows:',
            ],
            [
                'id' => 15,
                'question' => 'Can I use any browser to access the WWE service.',
                'answer' => '',
            ],
            [
                'id' => 16,
                'question' => 'Don’t find answers here?',
                'answer' => 'Email to the below ID or call the CP helpline numbers given below:',
            ],
        ];
    @endphp

    @include('layouts._partials.web.top-banner-panel', ['title' => 'FREQUENTLY ASKED QUESTIONS'])
    <main role="main" style="height: 80vh;">
        <section id="faq-panel">
            <div class="container-fluid">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="accordion" id="accordionExample">

                            @foreach ($faqContents as $faqContent)
                                <div class="card">
                                    <div class="card-header" id="heading{{ $faqContent['id'] }}">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapse{{ $faqContent['id'] }}"
                                                aria-expanded="true" aria-controls="collapse{{ $faqContent['id'] }}">
                                                {{ $faqContent['id'] }}. {{ $faqContent['question'] }}
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapse{{ $faqContent['id'] }}" class="collapse"
                                        aria-labelledby="heading{{ $faqContent['id'] }}" data-parent="#accordionExample">
                                        <div class="card-body text-justify">

                                            @if ($faqContent['id'] == 15)
                                                For Android OS UC browser and UC browser mini will not support
                                                <a href="http://Wrestlingbd.com">http://Wrestlingbd.com</a>
                                                To have a better experience it is suggested to use chrome browser.
                                            @elseif($faqContent['id'] == 5)
                                                Yes, there will be data charges as per your subscribed data plan for
                                                browsing and Streaming at <a
                                                    href="http://Wrestlingbd.com">http://Wrestlingbd.com</a>
                                            @else
                                                {{ $faqContent['answer'] }}
                                            @endif

                                            @if ($faqContent['id'] == 16)
                                                <br>
                                                <b>Support Email:</b> cservice@b2m-tech.com <br>
                                                <b>Phone:</b> +8801819120081, +8801830002747
                                            @endif

                                            @if ($faqContent['id'] == 14)
                                                <ul>
                                                    <li>You do not have sufficient balance so the subscription has not
                                                        been renewed
                                                    </li>
                                                    <li>Please check your data plan</li>
                                                    <li>If you are using dual SIM handset please check and choose your
                                                        subscribed SIM for the service.</li>
                                                </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            {{-- <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button"
                                            data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            1. What is WWE
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        It is a WAP based portal for Bangladeshi users. WWE portal contains video and
                                        wallpaper of various events of world wrestling entertainment. The portal will be
                                        accessible to mobile user with active data subscribers who will browse using
                                        3G/EDGE/GPRS connection on mobile browser and watch unlimited video by streaming and
                                        download Unlimited contents per day. To watch/Download any content users have to
                                        subscribe to this service with the charge as low as TK 2 +(VAT, SD and SC)/day
                                        (auto-renewable).
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left collapsed" type="button"
                                            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                            aria-controls="collapseTwo">
                                            2. How do I start Streaming in my Mobile?
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                    data-parent="#accordionExample">
                                    <div class="card-body text-justify">
                                        Find your desired content, click on the content click on the watch now button to
                                        start streaming automatically. If default player is not selected for the streaming
                                        the mobile might ask to choose a player for streaming.
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </main>
@endsection
