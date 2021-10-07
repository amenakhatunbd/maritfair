<?php
$fb_api_enable = SM::get_setting_value('fb_api_enable') == 'on' ? true : false;
$gp_api_enable = SM::get_setting_value('gp_api_enable') == 'on' ? true : false;
$tt_api_enable = SM::get_setting_value('tt_api_enable') == 'on' ? true : false;
$li_api_enable = SM::get_setting_value('li_api_enable') == 'on' ? true : false;
?>
@if($fb_api_enable || $gp_api_enable || $tt_api_enable || $li_api_enable)
    <div class="or-seperator"><i>or</i></div>
    <p class="text-center">Login with your social media account</p>
    <div class="text-center social-btn">
        @if($fb_api_enable)
            <a href="{{url('/login/facebook')}}" class="btn btn-primary">
                <i class="fa fa-facebook"></i>&nbsp;Facebook
            </a>
        @endif
        @if($gp_api_enable)
            <a href="{{url('/login/google')}}" class="btn btn-danger">
                <i class="fa fa-google"></i>&nbsp; Google
            </a>
        @endif
    </div>
@endif


