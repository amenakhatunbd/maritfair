@extends('frontend.master')

@section("title", $product->title)

@section("content")

    <?php

    $mobile = SM::get_setting_value('mobile');

    $email = SM::get_setting_value('email');

    $address = SM::get_setting_value('address');

    ?>

    <div class="bottomMenu">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="books-content-details">

                                    <h3 class="pre-title">{{ $product->title }}</h3>

                                    <p class="author">Author : <a target="_blank"

                                           href="{{ url('/author',$product->author->slug) }}">{{ $product->author->title }}</a>

                                    </p>
                                    </div>

                                </div>
           
                <div class="col-md-4">
                    <div class="books-content-details">
                                    <p>
                                        </p>
                                    @if($product->sale_price>0)

                                        <h3 class="price">List Price:

                                            <strike>{{ SM::currency_price_value($product->regular_price) }}</strike>

                                        </h3>

                                        <h4 class="sale-price">{{ SM::currency_price_value($product->sale_price) }}

                                            <span>You Save {{ SM::currency_price_value($product->regular_price-$product->sale_price) }}  ({{ SM::productDiscount($product->id) }}%)</span>

                                        </h4>

                                    @else

                                        <h4 class="sale-price">{{ SM::currency_price_value($product->regular_price) }}</h4>

                                    @endif
                                    

                                </div>
                </div>
                <div class="col-md-4">
                    <div class="books-content-details stcky-cuntiti">
                                        
                                                <a href="javascript:void(0)" data-product_id="{{$product->id}}"

                                           title="Add to cart"

                                           class="addToCart btn btn-warning">Add to cart </a>
                                               
                                            </div>
                </div>
            </div>
        </div>
    </div>
    <section class="book-details-section">

        <div class="container">

            <div class="books-details-content wow fadeInDown">

                <div class="row">

                    <div class="col-md-9">

                        <div class="row">

                            <div class="col-md-4">

                                <div class="books-preview-box">

                                    <a href="#" data-toggle="modal" data-target="#myModal">

                                        <img src="{{ SM::sm_get_the_src($product->image, 222, 319) }}"

                                             class="img-responsive">

                                    </a>

                                </div>

                            </div>

                            <div class="col-md-8">

                                <div class="books-content-details">

                                    <h3 class="pre-title">{{ $product->title }}</h3>

                                    <p class="author">Author :

                                        <a target="_blank"

                                           href="{{ url('/author',$product->author->slug) }}">{{ $product->author->title }}</a>

                                    </p>

                                    <p class="rattings hidden">

											<span>

												<i class="fa fa-star"></i>

												<i class="fa fa-star"></i>

												<i class="fa fa-star"></i>

												<i class="fa fa-star"></i>

												<i class="fa fa-star"></i>

											</span>

                                        <span>45 Rattings</span>

                                        <a href="">/ 30 Review</a>

                                    <p>

                                    @if($product->sale_price>0)

                                        <h3 class="price">List Price:

                                            <strike>{{ SM::currency_price_value($product->regular_price) }}</strike>

                                        </h3>

                                        <h4 class="sale-price">{{ SM::currency_price_value($product->sale_price) }}

                                            <span>You Save {{ SM::currency_price_value($product->regular_price-$product->sale_price) }}  ({{ SM::productDiscount($product->id) }}%)</span>

                                        </h4>

                                    @else

                                        <h4 class="sale-price">{{ SM::currency_price_value($product->regular_price) }}</h4>

                                    @endif

                                    <p class="category"><b class="author">Category:</b>

                                        @foreach($product->categories as $category)

                                            {{ $category->title }}

                                        @endforeach

                                    </p>

                                    <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-default">একটু

                                        পড়ে নিন  </a>

                                    @if ($product->product_qty > 0)

                                        <a href="javascript:void(0)" data-product_id="{{$product->id}}"

                                           title="Add to cart"

                                           class="addToCart btn btn-warning">Add to cart</a>

                                    @else

                                        <a href="javascript:void(0)" data-product_id="{{$product->id}}"

                                           title="Add to cart"

                                           class="addToCart btn btn-warning">Out Of Stock</a>

                                    @endif

                                    <div class="wish-list-share">

                                        @if(Auth::check())

                                            <a class="addToWishlist" data-product_id="{{$product->id}}"

                                               href="javascript:void(0)"><i class="fa fa-heart"></i> Add to Booklist</a>

                                        @else

                                            <a class="addToWishlist" data-product_id="{{$product->id}}"

                                               href="{{ url('/login_signin_new') }}"><i class="fa fa-heart"></i> Add to Booklist</a>

                                        @endif

                                        <a href="javascript:void(0)" data-toggle="dropdown"><i class="fa fa-share-alt"></i> Share This Book</a>
                                        
               
                   
                    <ul class="dropdown-menu socila-share ">
                         <li>
                            <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn-facebook" data-placement="left">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>                   
                        <li>
                            <a data-original-title="Google+" rel="tooltip"  href="#" class="btn-google" data-placement="left">
                                <i class="fa fa-youtube-play"></i>
                            </a>
                        </li>
                        <li>
                            <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn-twitter" data-placement="left">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                       
                        <li>
                            <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn-linkedin" data-placement="left">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>
            
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="col-md-3">

                        <ul class="footer-adress-bar">

                            <li>
                                <p><span><i class="icofont-headphone-alt"></i><a href="tel:{{ SM::get_setting_value('hotline') }}"> {{ SM::get_setting_value('hotline') }}</a></span></p>
                            </li>

                            <li>
                                <p><span><i class="icofont-users"></i><a href="tel:{{ $mobile }}"> {{ $mobile }}</a></span></p>
                            </li>

                            <li><p><i class="icofont-envelope"></i> {{ $email }}</p>

                            </li>

                            <li><p><i class="icofont-google-map"></i> {{ $address }}</p>

                            </li>

                        </ul>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <section>

        <div class="container">

            <div class="books-spcication-summary custom-navtabs float-left-tabs wow fadeInUp">

                <ul class="nav nav-tabs">

                    <li class="active"><a data-toggle="tab" href="#summary">Summary</a></li>

                    <li><a data-toggle="tab" href="#Specification">Specification</a></li>

                    <li><a data-toggle="tab" href="#Author">Author</a></li>

                </ul>



                <div class="tab-content">

                    <div id="summary" class="tab-pane fade in active">

                        {!! $product->long_description !!}

                    </div>

                    <div id="Specification" class="tab-pane fade">

                        <h3>Specification</h3>

                        <table class="table table-bordered">

                            <tbody>

                            <tr>



                                <th class="col-md-3">Title</th>

                                <td>{{ $product->title }}</td>

                            </tr>

                            <tr>

                                <th class="col-md-3">Author</th>

                                <td>{{ $product->author->title }}</td>

                            </tr>

                            <tr>

                                <th class="col-md-3">Publisher</th>

                                <td>{{ $product->publisher->title }}</td>

                            </tr>

                            <tr>

                                <th class="col-md-3">ISBN</th>

                                <td>{{ $product->isbn }}</td>

                            </tr>

                            <tr>

                                <th class="col-md-3">Edition</th>

                                <td>{{ $product->edition_date }}</td>

                            </tr>

                            <tr>

                                <th class="col-md-3">Number of Pages</th>

                                <td> {{ $product->number_of_pages }}</td>

                            </tr>

                            <tr>

                                <th class="col-md-3">Country</th>

                                <td>{{ $product->country->name }}</td>

                            </tr>



                            <tr>

                                <th class="col-md-3">Language</th>

                                <td>{{ $product->language }}</td>

                            </tr>

                            </tbody>

                        </table>

                    </div>

                    <div id="Author" class="tab-pane fade">

                        <h3>{{ $product->author->title }}</h3>

                        <p>

                            {!! $product->author->description !!}

                        </p>

                    </div>

                </div>

                <!-- ------------------------------- -->

                <hr>

                @include('frontend.products.product_review')

            </div>

        </div>

    </section>

    @include('frontend.common.getBestSaleProduct', ['products' =>$relatedProduct, 'title'=>'Related Products', 'class'=>'all-sell-intem-box', 'view_all'=>'View All', 'view_all_link'=>'#'])

    <!-- ---------------------------------------------- -->

    <div id="myModal" class="modal fade" role="dialog">

        <div class="modal-dialog">



            <!-- Modal content-->

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                    <h4 class="modal-title" style="font-weight: 400;">একটু পড়ে দেখুন</h4>

                </div>

                <div class="modal-body">

                    <?php

                    $read_a_little = SM::sm_unserialize($product->read_a_little);

                    ?>

                    <div class="book-section">

                        <div class="book-container">

                            @if(isset($read_a_little))

                                @foreach($read_a_little["front"] as $key=>$front)

                                    <?php

                                    $back = isset($read_a_little["back"][$key]) ? $read_a_little["back"][$key] : "";

                                    ?>



                                    <div class="right">

                                        <figure class="back" id="{{ $key == 0 ? 'back-cover': '' }}"

                                                style="background-image: url({{ SM::sm_get_the_src($back, 250, 400) }})"></figure>

                                        <figure class="front" id="{{ $front === end($read_a_little["front"]) ? 'cover': '' }}"

                                                style="background-image: url({{ SM::sm_get_the_src($front, 250, 400) }});"></figure>

                                    </div>

                                @endforeach

                            @endif

                            {{--                                <div class="right">--}}

                            {{--                                    <figure class="back" id="back-cover" style="background-image: url({{ asset('frontend/assets/images/') }}/book-back.jpg)"></figure>--}}

                            {{--                                    <figure class="front" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-1.png);"></figure>--}}

                            {{--                                </div>--}}

                            {{--                                <div class="right">--}}

                            {{--                                    <figure class="back" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-2.png);"></figure>--}}

                            {{--                                    <figure class="front" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-1.png);"></figure>--}}

                            {{--                                </div>--}}

                            {{--                                <div class="right">--}}

                            {{--                                    <figure class="back" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-2.png);"></figure>--}}

                            {{--                                    <figure class="front" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-1.png);"></figure>--}}

                            {{--                                </div>--}}

                            {{--                                <div class="right">--}}

                            {{--                                    <figure class="back" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-2.png);"></figure>--}}

                            {{--                                    <figure class="front" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-1.png);"></figure>--}}

                            {{--                                </div>--}}

                            {{--                                <div class="right">--}}

                            {{--                                    <figure class="back" style="background-image: url({{ asset('frontend/assets/images/') }}/book-view-2.png);"></figure>--}}

                            {{--                                    <figure class="front" id="cover" style="background-image: url({{ asset('frontend/assets/images/') }}/book-font.jpg);"></figure>--}}

                            {{--                                </div>--}}

                        </div>

                        <button onclick="turnLeft()">Prev</button>

                        <button onclick="turnRight()">Next</button>

                        <br/>

                    </div>



                </div>

            </div>



        </div>

    </div>

@endsection



