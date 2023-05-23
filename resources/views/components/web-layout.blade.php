<!doctype html>
<html lang="zxx">
    <head>
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{$title}} </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('web-assets/img/logo/favicon.png')}}">

        <!-- CSS here -->

        @include('layouts.web.css')
    </head>
    <body>

        <!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="icon-chevrons-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area-start -->
        @include('layouts.web.header')
        <!-- header-area-end -->

        {{ $slot }}

        <!-- footer-area-start -->
        @include('layouts.web.footer')
        <!-- footer-area-end -->


        <!-- JS here -->
        @include('layouts.web.script')
    </body>
</html>
