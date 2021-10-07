<?php
$footer_top_features = SM::smGetThemeOption("footer_top_features", array());

?>
@if(count($footer_top_features)>0)
    <section class="top-ads-section pad-top-0">
        <div class="container">
            <div class="row">
                @foreach($footer_top_features as $key=> $footer_top)
                    <div class="col-md-3">
                        <div class="media">
                            <div class="media-left media-middle">
                               
                            </div>
                            <div class="media-body">
                                <p>{{ $footer_top["title"] }}</p>
                                <p>{!! $footer_top["description"] !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif