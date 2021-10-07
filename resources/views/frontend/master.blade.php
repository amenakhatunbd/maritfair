<!DOCTYPE html>

<html>

<head>

    @include('frontend.common.meta')

    @include('frontend.inc.css')

        @include('frontend.common.additional_css')

    @stack('style')

</head>

<body>
<!-- <div class="sticky-social">
  <ul class="social">
    <li class="fb"><a href="#">Like Us<i class="fa fa-facebook" aria-hidden="true"></i></a></li>
      <li class="pin"><a href="#">Subscribe Now <i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
      <li class="insta"><a href="#">Follow us <i class="fa fa-instagram" aria-hidden="true"></i></a></li>
      <li class="vim"><a href="#">Follow us <i class="fa fa-linkdine" aria-hidden="true"></i></a></li>
    </ul>
  </div> -->
  <style type="text/css">
    .fl-fl.call-us {
    margin-top: 60px;
}
    .fl-fl {
    border-radius: 0px 25px 25px 0px;
    background: #000000;
    text-transform: uppercase;
    letter-spacing: 3px;
    padding-left: 20px;

    width: 190px;
    position: fixed;
    left: -140px;
    z-index: 1000;
    font: normal normal 10px Arial;
    -webkit-transition: all .25s ease;
    -moz-transition: all .25s ease;
    -ms-transition: all .25s ease;
    -o-transition: all .25s ease;
    transition: all .25s ease;
}

.fl-fl .fa {
    float: right;
    font-size: 20px;
    color: #fff;
    padding: 10px 0;
    width: 40px;
    margin-left: 28px;
}
.call-us .icofont-headphone-alt {
    float: right;
    font-size: 20px;
    color: #fff;
    padding: 2px 10px;
    width: 49px;
    line-height: 39px;
    margin-left: 10px;
    background: #222;
}
.fl-fl:hover {
  left: 0;
}

.fl-fl a {
  color: #fff !important;
  text-decoration: none;
  text-align: center;
  line-height: 43px!important;
  vertical-align: top!important;
}

.float-fb {
    top: 170px;
    background: #3b5998;
}

.float-tw {
    top: 225px;
    background: #f00;
}

.float-gp {
    top: 280px;
    background: #004b7c;
}
.float-rs {
  top: 335px;
}

.float-ig {
  top: 390px;
}

.float-pn {
  top: 445px;
}
  </style>
	<div class="float-sm">
   @empty(!SM::get_setting_value('mobile'))
    <div class="fl-fl call-us">
    <a href="tel:01737361138" target="_blank"> {{ SM::get_setting_value('mobile') }}</a>
    <i class="icofont-headphone-alt"></i>
  </div>
  @endempty
   @empty(!SM::smGetThemeOption("social_facebook"))
  <div class="fl-fl float-fb">
    
    <a href="{{ SM::smGetThemeOption("social_facebook") }}" target="_blank"> Like us!</a>
    <i class="fa fa-facebook"></i>
  </div>
  @endempty
  @empty(!SM::smGetThemeOption("social_youtube"))
  <div class="fl-fl float-tw">
    
    <a href="{{ SM::smGetThemeOption("social_youtube") }}" target="_blank">SubsCribe Now</a>
    <i class="fa fa-youtube-play"></i>
  </div>
  @endempty
  @empty(!SM::smGetThemeOption("social_linkedin"))
  <div class="fl-fl float-gp">
   
    <a href="{{ SM::smGetThemeOption("social_linkedin") }}" target="_blank">Follow us</a>
     <i class="fa fa-linkedin"></i>
  </div>
  @endempty
  @empty(!SM::smGetThemeOption("social_instagram"))
  <div class="fl-fl float-rs">
    
    <a href="{{ SM::smGetThemeOption("social_instagram") }}" target="_blank">Follow us</a>
    <i class="fa fa-instagram"></i>
  </div>
  @endempty
</div>

@include('frontend.inc.header')

@include('frontend.common.login_modal')

<!-- ---------------------------- -->

@include('frontend.common.s_w_message')

<div class="search-html">

    @yield('content')

</div>

@include('frontend.inc.footer')
@include('frontend.common.additional_js')
@include('frontend.inc.js')



@stack('script')

</body>

</html>