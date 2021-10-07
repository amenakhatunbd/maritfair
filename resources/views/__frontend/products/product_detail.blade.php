
  

@extends('frontend.master')

@section("title", $product->title)

@section("content")
  <!--<script src="https://code.jquery.com/jquery-2.1.1.js"></script>-->
<script src="https://unpkg.com/xzoom/dist/xzoom.min.js"></script>
<script src="https://hammerjs.github.io/dist/hammer.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/xzoom/dist/xzoom.css"/>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script>
      (function($){
          $(document).ready(function(){
            
            $(.lightbox).fancybox();
            
          });
          
        })(jQuery)
  </script>
<!--fancy box-->

<script>
  (function ($) {
$(document).ready(function() {
    $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
    $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
    $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
    $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
    $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

    //Integration with hammer.js
    var isTouchSupported = 'ontouchstart' in window;

    if (isTouchSupported) {
        //If touch device
        $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
            var xzoom = $(this).data('xzoom');
            xzoom.eventunbind();
        });
        
        $('.xzoom, .xzoom2, .xzoom3').each(function() {
            var xzoom = $(this).data('xzoom');
            $(this).hammer().on("tap", function(event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                var s = 1, ls;

                xzoom.eventmove = function(element) {
                    element.hammer().on('drag', function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        xzoom.movezoom(event);
                        event.gesture.preventDefault();
                    });
                }

                xzoom.eventleave = function(element) {
                    element.hammer().on('tap', function(event) {
                        xzoom.closezoom();
                    });
                }
                xzoom.openzoom(event);
            });
        });

    $('.xzoom4').each(function() {
        var xzoom = $(this).data('xzoom');
        $(this).hammer().on("tap", function(event) {
            event.pageX = event.gesture.center.pageX;
            event.pageY = event.gesture.center.pageY;
            var s = 1, ls;

            xzoom.eventmove = function(element) {
                element.hammer().on('drag', function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    xzoom.movezoom(event);
                    event.gesture.preventDefault();
                });
            }

            var counter = 0;
            xzoom.eventclick = function(element) {
                element.hammer().on('tap', function() {
                    counter++;
                    if (counter == 1) setTimeout(openfancy,300);
                    event.gesture.preventDefault();
                });
            }

            function openfancy() {
                if (counter == 2) {
                    xzoom.closezoom();
                    $.fancybox.open(xzoom.gallery().cgallery);
                } else {
                    xzoom.closezoom();
                }
                counter = 0;
            }
        xzoom.openzoom(event);
        });
    });
    
    $('.xzoom5').each(function() {
        var xzoom = $(this).data('xzoom');
        $(this).hammer().on("tap", function(event) {
            event.pageX = event.gesture.center.pageX;
            event.pageY = event.gesture.center.pageY;
            var s = 1, ls;

            xzoom.eventmove = function(element) {
                element.hammer().on('drag', function(event) {
                    event.pageX = event.gesture.center.pageX;
                    event.pageY = event.gesture.center.pageY;
                    xzoom.movezoom(event);
                    event.gesture.preventDefault();
                });
            }

            var counter = 0;
            xzoom.eventclick = function(element) {
                element.hammer().on('tap', function() {
                    counter++;
                    if (counter == 1) setTimeout(openmagnific,300);
                    event.gesture.preventDefault();
                });
            }

            function openmagnific() {
                if (counter == 2) {
                    xzoom.closezoom();
                    var gallery = xzoom.gallery().cgallery;
                    var i, images = new Array();
                    for (i in gallery) {
                        images[i] = {src: gallery[i]};
                    }
                    $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                } else {
                    xzoom.closezoom();
                }
                counter = 0;
            }
            xzoom.openzoom(event);
        });
    });

    } else {
        //If not touch device

        //Integration with fancybox plugin
        $('#xzoom-fancy').bind('click', function(event) {
            var xzoom = $(this).data('xzoom');
            xzoom.closezoom();
            $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
            event.preventDefault();
        });
       
        //Integration with magnific popup plugin
        $('#xzoom-magnific').bind('click', function(event) {
            var xzoom = $(this).data('xzoom');
            xzoom.closezoom();
            var gallery = xzoom.gallery().cgallery;
            var i, images = new Array();
            for (i in gallery) {
                images[i] = {src: gallery[i]};
            }
            $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
            event.preventDefault();
        });
    }
});
})(jQuery);
</script>
<style>
   .xzoom {
	-webkit-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);
	-moz-box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);
	box-shadow: 0px 0px 2px 0px #ededed!important;
	width:100%;
}    
</style>

    <!-- page wapper-->

    <div class="columns-container">

        <div class="container-fluid" id="columns">

            <!-- breadcrumb -->

            @include('frontend.common.breadcrumb')


            <div class="row">

            @include('frontend.products.product_detail_sidebar')

            <!-- row -->

                <div class="center_column col-xs-12 col-sm-9 col-md-10" id="center_column">

                    <!-- Product -->

                    <div id="product">

                        <div class="primary-box row">

                          <!----  <div class="pb-left-column col-xs-12 col-sm-5 col-md-5">
                                    <div class="details-image-mobile" style="display: none">

                                    <?php

                                    if (!empty($product->image_gallery)) {

                                    $myString = $product->image_gallery;

                                    $myArray = explode(',', $myString);

                                    ?>

                                    <img src="{!! SM::sm_get_the_src( $myArray[0] , 580, 580) !!}"

                                         data-zoom-image="{!! SM::sm_get_the_src( $myArray[0] , 860, 1200) !!}"

                                         class="img-details" alt="{{$product->title}}">

                                    <?php } else { ?>

                                    @empty(!$product->image)

                                        <img

                                                src="{!! SM::sm_get_the_src( $product->image , 580, 580) !!}"

                                                data-zoom-image="{!! SM::sm_get_the_src( $product->image , 860, 1200) !!}"

                                                class="img-details" alt="{{$product->title}}">

                                    @endempty

                                    <?php } ?>

                                </div>


                                <div class="product-image details-image">

                                    <div class="product-full">

                                        <?php

                                        if (!empty($product->image_gallery)) {

                                        $myString = $product->image_gallery;

                                        $myArray = explode(',', $myString);

                                        ?>

                                        <img id="product-zoom"

                                             src="{!! SM::sm_get_the_src( $myArray[0] , 580, 580) !!}"

                                             data-zoom-image="{!! SM::sm_get_the_src( $myArray[0] , 860, 1200) !!}"

                                             class="image-style" alt="{{$product->title}}" style="width: 100%; ">


                                        <?php } else { ?>

                                        @empty(!$product->image)

                                            <img id="product-zoom"

                                                 src="{!! SM::sm_get_the_src( $product->image , 580, 580) !!}"

                                                 data-zoom-image="{!! SM::sm_get_the_src( $product->image , 860, 1200) !!}"

                                                 class="image-style" alt="{{$product->title}}">

                                        @endempty

                                        <?php } ?>

                                    </div>
                                    @empty(!$product->image_gallery)
                                        <div class="product-img-thumb" id="gallery_01">
                                            <ul class="owl-carousel" data-items="3" data-nav="true" data-dots="false"
                                                data-margin="20" data-loop="true">
                                                <?php
                                                $myString_thumb = $product->image_gallery;
                                                $myArray_thumb = explode(',', $myString_thumb);
                                                ?>
                                                @foreach($myArray_thumb as $v_data)
                                                    <li>
                                                        <a href="#" data-image="{!! SM::sm_get_the_src( $v_data, 580, 580) !!}"
                                                           data-zoom-image="{!! SM::sm_get_the_src( $v_data , 860, 1200) !!}">
                                                            <img alt="{{$product->title}}" id="product-zoom"
                                                                 src="{!! SM::sm_get_the_src( $v_data, 112, 112) !!}"/>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endempty

                                </div>

                            </div>---->

                            <div class="pb-right-column col-xs-12 col-sm-6 col-md-5">
                                
                                <!-----new zoom------>
                            
                                     @empty(!$product->image)                                            
                                      <div class="large-5 column">
                                        <div class="xzoom-container">
                                             <a data-fancybox="group" class="lightbox" href="{!! SM::sm_get_the_src( $product->image , 860, 1200) !!}" data-caption="{{$product->title}}">
                                          <img class="xzoom " id="xzoom-default" src="{!! SM::sm_get_the_src( $product->image , 580, 580) !!}" xoriginal="{!! SM::sm_get_the_src( $product->image , 860, 1200) !!}" />
                                         </a> 
                                          <!--<div class="xzoom-thumbs">-->
                                          <!--  <a  href="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/original/01_b_car.jpg"><img class="xzoom-gallery" width="80" src="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/thumbs/01_b_car.jpg"  xpreview="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/preview/01_b_car.jpg" title="The description goes here"></a>-->
                                              
                                          <!--  <a href="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/original/02_o_car.jpg"><img class="xzoom-gallery" width="80" src="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/preview/02_o_car.jpg" title="The description goes here"></a>-->
                                              
                                          <!--  <a href="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/original/03_r_car.jpg"><img class="xzoom-gallery" width="80" src="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/preview/03_r_car.jpg" title="The description goes here"></a>-->
                                              
                                          <!--  <a href="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/original/04_g_car.jpg"><img class="xzoom-gallery" width="80" src="http://www.jqueryscript.net/demo/Feature-rich-Product-Gallery-With-Image-Zoom-xZoom/images/gallery/preview/04_g_car.jpg" title="The description goes here"></a>-->
                                          <!--</div>-->
                                        </div>        
                                      </div>
                                      <div class="large-7 column"></div>
                                   
                                      @endempty
                                  
                                  <!--fancy box-->
                                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
                                
  
                                
                                <!-----new zoom------>
                               </div> 
                                
                             <div class="pb-right-column col-xs-12 col-sm-6 col-md-5">
                                <h1 class="product-name">{{$product->title}}</h1>

                                <div class="product-comments">

                                    <div class="product-star">

                                        <?php

                                        echo SM::product_review($product->id);

                                        ?>

                                    </div>

                                </div>

                                <?php

                                $discount = 0;

                                ?>

                                <div class="product-price-group">

                                    <?php if ($product->product_type == 2) { ?>

                                    <span class="price product_price"></span>

                                    <?php } else {

                                    ?>

                                    @if($product->sale_price>0)

                                        <?php

                                        $value = $product->regular_price - $product->sale_price;

                                        $discount = $value * 100 / $product->regular_price;

                                        ?>

                                        <span class="price product-price">{{ SM::currency_price_value($product->sale_price) }}</span>

                                        <span class="old-price ">{{ SM::currency_price_value($product->regular_price) }}</span>

                                        {!! Form::hidden('price',$product->sale_price, ['class' => 'price']) !!}

                                    @else

                                        <span class="price product-price">{{ SM::currency_price_value($product->regular_price) }}</span>

                                        {!! Form::hidden('price',$product->regular_price, ['class' => 'price']) !!}

                                    @endif

                                    @if($discount>0)

                                        <span class="discount">Discount : -{{ ceil($discount) }}%</span>

                                    @endif

                                    <?php } ?>

                                </div>

                                <div class="info-orther">

                                    <p>SKU: {{ $product->sku }}</p>

                                    <p>Availability:

                                        <?php

                                        if ($product->product_qty > 0) {

                                        ?>

                                        <span class="in-stock">{{ $product->stock_status }}</span>

                                        <?php } else { ?>

                                        <span class="out-stock">Stock Out</span>

                                        <?php } ?>


                                    </p>

                                    {{--<p>Condition: New</p>--}}

                                </div>

                                @if(!empty($product->short_description))

                                    <div class="product-desc">

                                        {!! $product->short_description !!}

                                    </div>

                                @endif

                                <?php

                                $item = Cart::instance('cart')->content()->where('id', $product->id)->first();

                                ?>

                                <div class="form-option form-control" style="border:none">

                                    <?php if ($product->product_type == 2) { ?>

                                    {{--product_attribute--}}

                                    @include('frontend.products.product_attribute')

                                    {{--product_attribute--}}

                                    <?php } ?>

                                    <div class="attributes attr_and_cart">

                                        <div class="sinolo">

                                            <div class="attribute-label">Qty:</div>

                                            @if (!empty($item))

                                                <a onclick="var less = parseInt($('.up_qty').val()) - 1; $('.up_qty').val(less);"
                                                   data-row_id="{{ $item->rowId }}"
                                                   class="decDetail btn btn-warning btn-sm"><i class="fa fa-minus"></i></a>

                                                <input type="text" value="{{ $item->qty }}" class="qty-inc-dc up_qty"
                                                       id="{{ $item->rowId }}">

                                                <a style="background-color: green;color: #fff;"
                                                   onclick="var add = parseInt($('.up_qty').val()) + 1; $('.up_qty').val(add);"
                                                   data-row_id="{{ $item->rowId }}"
                                                   class="incDetail btn btn-success btn-sm"><i
                                                            class="fa fa-plus"></i></a>

                                            @else

                                                <a onclick="var less = parseInt($('#qty').val()) - 1; $('#qty').val(less);"

                                                   id="" class="btn btn-warning btn-sm"><i

                                                            class="fa fa-minus"></i> </a>

                                                <input type="text" value="1" class="productCartQty qty-inc-dc" id="qty">

                                                <a style="background-color: green;color: #fff;" onclick="var add = parseInt($('#qty').val()) + 1; $('#qty').val(add);"

                                                   id="" class="btn btn-success btn-sm"><i

                                                            class="fa fa-plus"></i> </a>

                                            @endif


                                        </div>

                                    </div>

                                </div>


                                <div class="form-action">

                                    <div class="btn btn-success active details-btn-ex">


                                        <?php  echo SM::addToCartButton($product->id, $product->regular_price, $product->sale_price) ?>


                                    </div>

                                </div>

                            </div>


                        </div>

                        <ul class="nav nav-pills" style="padding-left: 15px;margin-top: 35px;">

                            <li class="active "><a data-toggle="pill" class="tab-style-custom" href="#home">Product
                                    Details</a></li>

                            <li><a data-toggle="pill" class="tab-style-custom" href="#menu1">Reviews </a></li>

                        </ul>


                        <div class="tab-content tab-content-custom" style="margin-left: 15px">

                            <div id="home" class="tab-pane fade in active show">

                                <h4>Product Description</h4>

                                {!! $product->long_description !!}

                            </div>

                            <div id="menu1" class="tab-pane fade">

                                @include('frontend.products.product_review')

                            </div>

                        </div>

                    </div>

                    <!-- tab product -->

            

                <!-- ./tab product -->

                    <!-- related product -->

                @include('frontend.products.related_products')

                <!-- ./related product -->


                </div>

                <!-- Product -->

            </div>

        </div>


    </div>

    </div>
    
  
    
 

    <!-- ./page wapper-->

@endsection

