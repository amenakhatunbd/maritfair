@extends('frontend.master')
@section('title', '')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 p-0">
                @include('frontend.common.sideber_category')
            </div>
            <div class="col-md-8">
                @include('frontend.common.slider')

                @include('frontend.common.category_list')

                @include('frontend.common.special_product')

                @include('frontend.common.hot_deals')

                <section class="products-content">

                <?php $newest_product = SM::getNewestProduct(); ?>
                <!----New Product Area ---->
                    <div class="new-products-area">
                        <div class="row">
                            <div class="col-md-12 p-0">
                                <div class="paanel custom-panel-style">
                                    <div class="panel-heading">
                                        <h2 class="custom-panel-heading">Latest Product
                                            <a href="{{url('/category')}}"
                                               class="btn btn-xs btn-success active pull-right">View All</a>
                                        </h2>
                                        <hr>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            @forelse($newest_product as $product)
                                                <div class="col-xs-6 col-sm-4 col-md-3">
                                                    <div class="product-grid new-product-ex">
                                                        <div class="product-image">
                                                            <a href="{{url('/product/'.$product->slug)}}" class="image">

                                                                {{--<img class="pic-1" src="{{asset('frontend/images/banner.jpg')}}" alt="" style="height: 200px;width: 200px;margin: auto;display: block;">--}}
                                                                {{--<img class="pic-2 new-product-ex" src="{{asset('frontend/images/banner.jpg')}}" alt=""  style="height: 200px;width: 200px;margin: auto;display: block;">--}}

                                                                <img class=""
                                                                     src="{!! SM::sm_get_the_src($product->image, 200,200) !!}"
                                                                     alt="{{$product->title}}">
                                                                {{--<img class=" new-product-ex" src="{{asset('frontend/images/banner.jpg')}}" alt=""  style="height: 200px;width: 200px;margin: auto;display: block;">--}}

                                                            </a>
                                                            <?php
                                                            if (!empty($product->sale_price > 0)) {
                                                                $des = '<p class="custom-off-amount">' . SM::productDiscount($product->id) . '%</p>';
                                                                echo $des;
                                                            }
                                                            ?>

                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="title">
                                                                <a href="{{url('/product/'.$product->slug)}}">{{$product->title}}</a>
                                                            </h3>
                                                            <h6 class="text-center wait-st-unit">
                                                                <span>{{$product->product_weight}}</span> {{SM::product_wait_unit($product->unit_id)->title}}
                                                            </h6>
                                                            @if($product->sale_price > 0)
                                                                <p class="price">
                                                                    <span>{{SM::currency_price_value($product->regular_price)}}</span>{{SM::currency_price_value($product->sale_price)}}
                                                                </p>
                                                            @else
                                                                <p class="price">{{SM::currency_price_value($product->regular_price)}}</p>
                                                            @endif

                                                            <ul class="social">
                                                                <li class="custom-heart-extra">
                                                                    <?php  echo SM::addToCartButton($product->id, $product->regular_price, $product->sale_price) ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            @empty
                                                <label class="label label-warning">Newest Product Not Found ..!</label>
                                            @endforelse
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                @include('frontend.common.top_sale_product')
                @include('frontend.common.blog')
            </div>
            <div class="col-md-2">
                @include('frontend.common.slider_bottom')
            </div>
        </div>
    </div>

@endsection


