<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>VPS Chain Blog</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="vps chain Blog" name="keywords">
    <meta content="vps chain Blog" name="description">

    <!-- Favicon -->
    <link href="{{asset('front_assets/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="{{asset('front_assets/lib/flaticon/font/flaticon.css')}}" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front_assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front_assets/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front_assets/css/style.css')}}" rel="stylesheet">
    <style>
        .navscrolled{
            background-color: #5A50FF
        }
    </style>
    @stack('styles')

</head>

<body>
    <div style="background-color: #5A50FF">


@include('front.layouts.header')
    </div>

    @yield('content')

@include('front.layouts.footer')


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('front_assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front_assets/lib/isotope/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('front_assets/lib/lightbox/js/lightbox.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('front_assets/js/main.js')}}"></script>
    <script>
        $(window).scroll(function(){
            $('nav').toggleClass('navscrolled',$(this).scrollTop()>200)l
        });
    </script>

    @stack('scripts')
</body>
</html>
