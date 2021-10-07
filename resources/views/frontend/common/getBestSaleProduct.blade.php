@if(count($products)>0)

    <section class="recent-sold-section wow fadeInLeft">

        <div class="container">

            <div class="{{ $class }}">

                <div class="title-header">

                    <h3>{{ $title }}

                        @if(!empty($view_all))

                            <a href="{{url($view_all_link)}}"

                               class="pull-right btn btn-default button-view-all"> {{ $view_all }}

                            </a>

                        @endif

                    </h3>

                </div>

                <div class="recent-sold-slide all-caro-btn">

                    @foreach($products as $key=> $product)

                        <div class="col-md-2 pad-no">

                            <div class="panel-book-box wow fadeInUp" data-wow-duration="2s" data-wow-delay="1s">

                                <a href="{{ url('product/'.$product->slug) }}">

                                    <img src="{{ SM::sm_get_the_src($product->image, 130, 186) }}">

                                    @if($product->sale_price>0)

                                        <div class="discount-badge">

                                            <p>{{ SM::productDiscount($product->id) }} % <small style="display: block">OFF</small> </p>

                                        </div>

                                    @endif

                                    <div class="book-text-area">

                                        <p class="book-title">{{ $product->title }}</p>

                                        <p class="book-author">{{ isset($product->author->title) ? $product->author->title : '' }}</p>
                                        <p class="book-status text-capitalize text-center">Product in stock</p>

                                        <p class="book-price">

                                            @if($product->sale_price>0)

                                                <strike class="original-price">{{ SM::currency_price_value($product->regular_price) }}</strike>

                                                {{ SM::currency_price_value($product->sale_price) }}

                                            @else

                                                {{ SM::currency_price_value($product->regular_price) }}

                                            @endif

                                        </p>
                                        <div class="mobile-btn-custom">
                                            <a data-product_id="{{ $product->id }}" class="addToCart btn btn-warning button-absotalate">Add to cart</a>
                                        </div>

                                    </div>

                                </a>

                                <div class="book-details-overlay" onclick="window.location='{{ url('product/'.$product->slug) }}'">
                                    
                                    <!--<?php echo SM::addToCartButton($product->id, $product->regular_price, $product->sale_price); ?>-->
                                    <a href="{{ url('product/'.$product->slug) }}"

                                       class="btn btn-info btn-block button-fixed">View Details</a>

                                </div>
                                
                                <div class="overlay-btn">
                                    <a data-product_id="{{ $product->id }}" class="addToCart btn btn-warning button-absotalate">Add to cart</a>
                                </div>

                            </div>

                        </div>

                    @endforeach



                </div>

            </div>

        </div>

    </section>

@endif