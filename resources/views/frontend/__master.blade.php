<html>
<head>
     @include('frontend.common.meta')
    @include('frontend.inc.css')
{{--    @include('frontend.common.additional_css')--}}
    @stack('style')
</head>
<body>
@include('frontend.inc.header')
@include('frontend.common.s_w_message')
@yield('content')
@include('frontend.inc.footer')
<!-- all js scripts including custom js -->
<!-- scripts -->
@include('frontend.inc.js')
{{--@include('frontend.common.additional_js')--}}
@stack('script')
</body>
</html>


