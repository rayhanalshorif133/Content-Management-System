<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content>
    <meta name="author" content>
    <link rel="icon" href="favicon.ico">
    <title>
        WWEBD
        @if (isset($title))
            | {{ $title }}
        @endif
    </title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Bengali:wght@200;300;400;500;600;700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="{{ asset('web/dist/animate/animate.min.css') }}">
    <link href="{{ asset('web/dist/ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('web/dist/owlcarousel/assets/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
    @yield('head')
</head>

<body>

    @yield('content')
    <!--/ footer Star /-->
    @include('layouts._partials.web.footer')
    <div id="preloader"></div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('web/dist/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('web/dist/scrollreveal/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('web/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(window).scroll(function(e) {
                $el = $('.nav-top-item');
                if ($(this).scrollTop() > 30) {
                    $('.nav-top-item').addClass("fixedNav");
                } else {
                    $('.nav-top-item').removeClass("fixedNav");
                }
            });
        });
    </script>
    @stack('js');

</body>

</html>
