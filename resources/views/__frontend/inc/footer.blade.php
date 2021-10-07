<?php
$site_name = SM::sm_get_site_name();
$site_name = SM::sm_string($site_name) ? $site_name : 'buckleup-bd';
$mobile = SM::get_setting_value('mobile');
$email = SM::get_setting_value('email');
$address = SM::get_setting_value('address');
$footer_logo = SM::smGetThemeOption("footer_logo", "");
$footer_widget2_title = SM::smGetThemeOption('footer_widget2_title', "Seo Services");
$footer_widget2_description = SM::smGetThemeOption('footer_widget2_description', "");
$footer_widget3_title = SM::smGetThemeOption('footer_widget3_title', "Company");
$footer_widget3_description = SM::smGetThemeOption('footer_widget3_description', "");
$footer_widget4_title = SM::smGetThemeOption('footer_widget4_title', "Technology");
$footer_widget4_description = SM::smGetThemeOption('footer_widget4_description', "");
$contact_branches = SM::smGetThemeOption("contact_branches");
$newsletter_success_title = SM::smGetThemeOption("newsletter_success_title", "Thank You For Subscribing!");
$newsletter_success_description = SM::smGetThemeOption("newsletter_success_description", "You're just one step away from being one of our dear susbcribers.Please check the Email provided and confirm your susbcription.");
$payment_method_image = SM::smGetThemeOption("payment_method_image", "");
?>

    <style>
        .single-footer1 ul {
            margin-bottom: 0 !important;
        }
        .single-footer1 ul li {
            margin-left: -36px;
            list-style: none;
            display: block;
            margin-bottom: 7px;
        }

        .single-footer1 li a {
            display: block;
            font-size: 0.875rem;
            color: #5d5d60;
        }

        ul.links-list.mb-0 li {
            margin-left: -36px;
        }
    </style>

<footer class="footer-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-3">
                <div class="single-footer">
                    <a href="{{URL('/')}}" class="logo">
                        <img class="logo-style-info" alt="{{ SM::get_setting_value('site_name') }}"
                             src="{{ SM::sm_get_the_src(SM::sm_get_site_logo(), 294, 90) }}"/>
                    </a>
                    <h6>Contact info</h6>
                    <ul class="contact-list  pl-0 mb-0">
                        <li><i class="fa fa-map-marker"></i> {{ $address }}</li>
                        <li><i class="fa fa-phone"></i>{{ $mobile }}</li>
                        <li><i class="fa fa-envelope-open-o"></i>{{$email}}</li>

                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="footer-block">
                    <div class="single-footer single-footer1">
                        <h5 class="widget-title">{{ $footer_widget2_title }}</h5>
                        {{--<ul class="links-list  mb-0">--}}
                        {!! stripslashes($footer_widget2_description) !!}
                        {{--</ul>--}}
                    </div>
                    <div class="single-footer single-footer1">
                        <h5>{{ $footer_widget3_title }}</h5>
                        {{--<ul class="links-list  mb-0">--}}
                        {!! stripslashes($footer_widget3_description) !!}
                        {{--</ul>--}}
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-3 box-extra">
                <div class="single-footer">
                    {!! Form::open(["method"=>"post", "action"=>'Front\HomeController@subscribe', 'class'=>'form-inline form-subscribe', 'id'=>"newsletterForm"]) !!}

                    <input name="email" required type="email" class="form-control"
                           placeholder="Enter Your E-mail Address" style=" width: 80%;">
                    <button type="submit" value="Subscribe" id="newsletterFormSubmit"
                            class="btn btn-default"><i class="fa fa-paper-plane-o"></i>
                    </button>

                    {!! Form::close() !!}

                    <div class="socials">
                        <h5>Follow Us</h5>
                        <ul class="list">
                            @empty(!SM::smGetThemeOption("social_facebook"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_facebook") }}">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                            @endempty
                            @empty(!SM::smGetThemeOption("social_twitter"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_twitter") }}">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                            @endempty
                            @empty(!SM::smGetThemeOption("social_google_plus"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_google_plus") }}">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                            @endempty
                            @empty(!SM::smGetThemeOption("social_linkedin"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_linkedin") }}">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            @endempty
                            @empty(!SM::smGetThemeOption("social_github"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_github") }}">
                                        <i class="fa fa-github"></i>
                                    </a>
                                </li>
                            @endempty
                            @empty(!SM::smGetThemeOption("social_pinterest"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_pinterest") }}">
                                        <i class="fa fa-pinterest-p"> </i>
                                    </a>
                                </li>
                            @endempty
                            @empty(!SM::smGetThemeOption("social_youtube"))
                                <li><a target="_blank" href="{{ SM::smGetThemeOption("social_youtube") }}">
                                        <i class="fa fa-youtube-play"></i>
                                    </a>
                                </li>
                            @endempty
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>

<div class="footer py-2 my-2" style="background: #394d38;color: #fff;">
    <div class="container-fluid">
        <div class="row">
            <div class="footer-image col-12 col-md-6">
                {{--<img src="{!! SM::sm_get_the_src($payment_method_image, 141, 18) !!}" alt="payment logo">--}}
            </div>
            <div class="footer-info col-12 col-md-6">
                <p class="text-center">{{ SM::smGetThemeOption("copyright") }}
                    <a style="color: #5cad5c;" target="_blank" href="http://nextpagetl.com/">Next Page Technology
                        Ltd.</a>
                </p>
            </div>
        </div>
    </div>
</div>

<!--notification-->
<div id="message_content"></div>