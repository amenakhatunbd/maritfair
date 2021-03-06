@extends('frontend.master')
@section("title", $authorInfo->title)
@section('content')
    @if(!empty($authorInfo->image_gallery))
        <section class="slider-section">
            <div class="container">
                <div id="myCarousel1" class="carousel slide carousel-fade" data-ride="carousel">
                    <?php
                    $myString = $authorInfo->image_gallery;
                    $myArray = explode(',', $myString);
                    ?>
                    <ol class="carousel-indicators">
                        @foreach($myArray as $key => $image_gallery)
                            <li data-target="#myCarousel1" data-slide-to="{{$key}}"
                                class="{{ $key==0? 'active':'' }}"></li>
                        @endforeach
                    </ol>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        @foreach($myArray as $key=> $v_data)
                            <div class="item {{ $key==0? 'active':'' }}">
                                <img src="{{ SM::sm_get_the_src($v_data, 1140, 280) }}" alt="{{ $authorInfo->title }}"
                                     class="img-responsive">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
    <section class="mar-top-20">
        <div class="container">
            <div class="row">
                @include('frontend.products.product_sidebar')
                <div class="col-md-9">
						<div class="author-profile-box">
							<div class="media">
								  <div class="media-left">
								    
								    <img class="media-object img-circle" style="width:120px" src= {{ SM::sm_get_the_src($author->image, 80, 80) }}>
								  </div>
								  <div class="media-body">
								    <h4 class="media-heading">{{$author->title}}</h4>
								    <p>{{$author->description}}</p>
								         <a href="#" class="read-more">Read More</a>
								  </div>
							</div>
						</div>
						
					</div>
			    
                <div class="col-md-9">
                    <div class="all-books-content">
                        <ol class="breadcrumb hidden">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Books</a></li>
                            <li><a href="#">Categoris</a></li>
                            <li class="active">Books</li>
                        </ol>
                        <h3>
                            <span id="category_filter_data"></span>
                            <span id="publisher_filter_data"></span>
                        </h3>
                        
                        <div id="ajax_view_product_list"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
