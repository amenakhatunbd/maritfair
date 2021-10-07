@if(isset($sliders) && count($sliders)>0)
    <?php
    $slider_change_autoplay = (int)SM::smGetThemeOption("slider_change_autoplay", 4);
    $slider_change_autoplay *= 3000;
    ?>

        <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @forelse($sliders as $key=>$slider)
                    @if($key==0)
                        <div class="carousel-item active" style="height:100%;background: url({!! SM::sm_get_the_src($slider->background_image, 1200,400) !!}) center center no-repeat;background-size: cover;">
                    @else
                        <div class="carousel-item "  style="height:100%;background: url({!! SM::sm_get_the_src($slider->background_image, 1200,400) !!}) center center no-repeat;background-size: cover;">
                    @endif
                    <div class="mask flex-center">
                        
                            <div class="row align-items-center">
                                <div class="col-md-6 col-6 col-12 order-md-2 order-1" style="padding-top:30px;">
                                    <h4>
                                        @if(!empty($slider->display_title))
                                          {{$slider->display_title}}
                                        @endif
                                        </h4>
                                    <p>{{$slider-> description }}</p>
                                    <?php $extra =SM::sm_unserialize($slider->extra);
                                     $value_link=$extra['button_link'];
                                    ?>
                                      @foreach($extra['button_label'] as $key=>$value)
                                          @if(!empty($value))
                                             <a href="{{$value_link[$key]}}">{{$value}}</a>
                                          @endif
                                     @endforeach
                                </div>
                                
                                <div class="col-md-6 col-6 col-12 order-md-2 order-1">
                                    @if(!empty($slider->image))
                                    <img src="{!! SM::sm_get_the_src($slider->image, 418,366) !!}" class="mx-auto" alt="slide">
                                    @endif
                                </div>
                                 
                            </div>
                        
                    </div>
                </div>
                @endforeach

            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
@endif
<script>
    $('#myCarousel').carousel({
        interval: 3000,
    })
</script>

