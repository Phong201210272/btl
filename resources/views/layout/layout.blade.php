<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>pillloMart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="icon" href="{{asset('banchangagoidem/img/favicon.png')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/bootstrap.min.css')}}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/animate.css')}}">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/owl.carousel.min.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/all.css')}}">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/themify-icons.css')}}">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/magnific-popup.css')}}">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/slick.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{asset('banchangagoidem/css/style.css')}}">
</head>

<body>
<div id="page">
    {{--    header--}}
    {{View::make("layout/header")}}
    {{--    slide--}}


    {{--    render body--}}
    @yield('content')
    {{--    footer--}}
    {{View::make("layout/footer")}}
</div>

<!-- jquery plugins here-->
<script src="{{asset('banchangagoidem/js/jquery-1.12.1.min.js')}}"></script>
<!-- popper js -->
<script src="{{asset('banchangagoidem/js/popper.min.js')}}"></script>
<!-- bootstrap js -->
<script src="{{asset('banchangagoidem/js/bootstrap.min.js')}}"></script>
<!-- magnific popup js -->
<script src="{{asset('banchangagoidem/js/jquery.magnific-popup.js')}}"></script>
<!-- carousel js -->
<script src="{{asset('banchangagoidem/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('banchangagoidem/js/jquery.nice-select.min.js')}}"></script>
<!-- slick js -->
<script src="{{asset('banchangagoidem/js/slick.min.js')}}"></script>
<script src="{{asset('banchangagoidem/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('banchangagoidem/js/waypoints.min.js')}}"></script>
<script src="{{asset('banchangagoidem/js/contact.js')}}"></script>
<script src="{{asset('banchangagoidem/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('banchangagoidem/js/jquery.form.js')}}"></script>
<script src="{{asset('banchangagoidem/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('banchangagoidem/js/mail-script.js')}}"></script>
<!-- custom js -->
<script src="{{asset('banchangagoidem/js/custom.js')}}"></script>
</body>

</html>
