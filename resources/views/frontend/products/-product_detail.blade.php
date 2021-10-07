@extends('frontend.master')

@section("title", $product->title)

@section("content")

    @push('style')

        <style>

            .back-label {

                width: 30px;

                height: 30px;

                border-radius: 30px;

            }


            .qty-inc-dc {

                text-align: center;

                font-weight: bold;

                border: 1px solid #ededed;

            }

            .disable-size {

                pointer-events: none;

                color: #968585 !important;

            }

            .click_size {

                cursor: pointer;

            }

            span.out-stock {

                color: #fa110d;

                font-weight: 700;

            }

            span.in-stock {

                color: #009966;

            }


        </style>

    @endpush





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

                            <div class="pb-left-column col-xs-12 col-sm-5 col-md-5">

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


                                <!-- product-imge-->

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

                                             class="image-style" alt="{{$product->title}}">


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


                                <!-- product-imge-->

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

                {{--<div class="product-tab">--}}

                {{--<ul class="nav-tab">--}}

                {{--<li class="active">--}}

                {{--<a aria-expanded="false" data-toggle="tab" href="#product-detail">ProductDetails</a>--}}

                {{--</li>--}}

                {{--<li>--}}

                {{--<a data-toggle="tab" href="#reviews">reviews</a>--}}

                {{--</li>--}}

                {{--</ul>--}}

                {{--<div class="tab-container">--}}

                {{--<div id="product-detail" class="tab-panel active">--}}

                {{--{!! $product->long_description !!}--}}

                {{--</div>--}}

                {{--@include('frontend.products.product_review')--}}

                {{--</div>--}}

                {{--<div class="tab-container">--}}

                {{--<div id="reviews" class="tab-panel">--}}

                {{--{!! $product->long_description !!}--}}

                {{--</div>--}}

                {{--@include('frontend.products.product_review')--}}

                {{--</div>--}}

                {{--</div>--}}

                <!-- ./tab product -->

                    <!-- related product -->

                @include('frontend.products.related_products')

                <!-- ./related product -->


                </div>

                <!-- Product -->

            </div>

        </div>


        <script type="text/javascript" src="https://buckleup-bd.com/frontend/lib/jquery/jquery-1.11.2.min.js"></script>

        <script type="text/javascript"
                src="https://buckleup-bd.com/frontend/lib/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="https://buckleup-bd.com/frontend/lib/jquery.elevatezoom.js"></script>

        <script type="text/javascript" src="https://buckleup-bd.com/frontend/js/theme-script.js"></script>

        <!-- JQUERY VALIDATE







        <!-- ./row-->

    </div>

    </div>

    <!-- ./page wapper-->

@endsection

