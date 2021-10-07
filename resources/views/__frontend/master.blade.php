<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
@include('frontend.common.meta')
@include('frontend.inc.css')
@include('frontend.common.additional_css')
@stack('style')
<!--------- stripe js ------>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style>
    .col-md-7.col-12.order-md-1.order-2 {
padding-top: 112px;
}
</style>
</head>
<body>
<div id="fb-root"></div>
@include('frontend.common.only_login_Modal')
@include('frontend.common.register_model')
@include('frontend.common.login_modal')
@include('frontend.inc.header')
@include('frontend.common.s_w_message')
<div class="search-html">
    @yield('content')
</div>
@include('frontend.inc.footer_top')
@include('frontend.inc.footer')
<!-- all js scripts including custom js -->
<!-- scripts -->
@include('frontend.inc.js')
@include('frontend.common.additional_js')
@stack('script')


</body>
</html>


