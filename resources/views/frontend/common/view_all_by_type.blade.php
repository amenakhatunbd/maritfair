@extends("frontend.master")
@section("title", "Blog")
@section("content")
		<section>
			<div class="container">
				<div class="all-books-content">
					<ol class="breadcrumb">
							    <li><a href="#">Home</a></li>
							    @if(request()->segment(1)=="all_authors")
							    <li class="active">Author</li>
                                @elseif(request()->segment(1)=="all_publishers")
                                <li class="active">Publisher</li>
                                @elseif(request()->segment(1)=="all_categories")
                                <li class="active">Category</li>
                                @else
                                @endif
					</ol>
					@if(request()->segment(1)=="all_authors")
					<p>লেখক! আক্ষরিক ভাবে বলতে গেলে সৃজনশীল কোনকিছু লেখেন যিনি তাকেই লেখক বলা যায়। কিন্তু ‘লেখক’ শব্দটির ব্যাপ্তি আসলে এতোটুকুতেই সীমাবদ্ধ নয়। লেখক এই বাস্তবিক জগতের সমান্তরালে একটি কাল্পনিক পৃথিবী তৈরির ক্ষমতা রাখেন। কাল্পনিক চরিত্রগুলো তার লেখনী ও কলমের প্রাণখোঁচায় জীবন্ত হয়ে ওঠে। একজন লেখক তাঁর লেখার মাধ্যমে একটি প্রজন্মের চিন্তাধারা গড়ে দিতে পারেন। তাই লেখকদের কিংবদন্তী হবার পথ করে দিতে রকমারি ডট কম বদ্ধ পরিকর।</p>
					@endif
					<div class="title-header mar-top-20">
						<h3 >জনপ্রিয় 
                        @if(request()->segment(1)=="all_authors")লেখকগণ
                        @elseif(request()->segment(1)=="all_publishers")প্রকাশনী সমূহ
                        @elseif(request()->segment(1)=="all_categories")বিষয় সমূহ
                        @endif</h3>
					</div>
					
					<div class="author-pro-slide all-caro-btn">
						@if($featured_datas)
						@foreach($featured_datas as $key => $featured_data)
						<div class="col-md-3">
						    @if(request()->segment(1)=="all_authors")						
							<a href="{{ url('/author', $featured_data->slug) }}">
							@elseif(request()->segment(1)=="all_publishers")
							<a href="{{ url('/publisher', $featured_data->slug) }}">
							@elseif(request()->segment(1)=="all_categories")
							<a href="{{ url('/category', $featured_data->slug) }}">
							@endif
								<div class="author-profile">
								<img src="{{ SM::sm_get_the_src($featured_data->image, 140, 140) }}" alt="{{ $featured_data->title }}"
                                     	class="img-responsive img-circle">
									<p>{{ $featured_data->title }}</p>
								</div>
							</a>
						</div>
						@endforeach
						@endif
					</div>
					<div class="clearfix"></div>
				</div>
				</div>
			</div>
		</section>
		<section>
			<div class="container">
				<div class="all-books-content">
					<div class="row">
						<div class="col-md-offset-3 col-md-6" >
							<div class="search-author-box">
								<div class="input-group">
							    
							    <input id="msg" type="text" class="form-control" name="msg" placeholder="Search favorite">
							    <span class="input-group-addon">Search</span>
							  </div>
							</div>
						</div>
					</div>
					<hr>
					<div class="row">
						@if($datas)
							@foreach($datas as $key => $data)
							<div class="col-md-2 col-xs-6">	
							    @if(request()->segment(1)=="all_authors")					
								<a href="{{ url('/author', $data->slug) }}">
								@elseif(request()->segment(1)=="all_publishers")
							    <a href="{{ url('/publisher', $data->slug) }}">
							    @elseif(request()->segment(1)=="all_categories")
							    <a href="{{ url('/category', $data->slug) }}">
							    @endif
									<div class="author-profile mar-bot-20">
										<img src="{{ SM::sm_get_the_src($data->image, 140, 140) }}" alt="{{ $data->title }}"
                                     	class="img-responsive img-circle">
										<p>{{ $data->title }}</p>
									</div>
								</a>
							</div>
							@endforeach
							{{ $datas->links() }}		
						@endif
					</div>								
				</div>
			</div>
		</section>

		<section style="display:none;">
			<div class="container">
				<div class="all-sell-intem-box">
					<div class="title-header">
						<h3>Recent Viewed Book <a href="" class="pull-right btn btn-default button-view-all"> View all</a></h3>
					</div>
					<div class="all-sale-slide all-caro-btn">
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-8.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-7.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<!-- ----------------------- -->
						<div class="col-md-2 pad-no">

							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-6.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<!-- ------------------- -->
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-5.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<!-- ------------------------ -->
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-4.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<!-- ------------------------------ -->
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-3.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<!-- -------------------------------- -->
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-2.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
						<!-- --------------------- -->
						<div class="col-md-2 pad-no">
							<div class="panel-book-box">
								<a href="">
									<img src="assets/images/book-1.jpg" class="img-responsive">
									<div class="discount-badge">
										<p>40</p>
									</div>
									<div class="book-text-area">
										<p class="book-title">৯ম-১০ম শ্রেণির সাধারণ বিজ্ঞান ভিত্তিক</p>

										<p class="book-price">
											<strike class="original-price">TK. 120</strike>
											TK. 78
										</p>
									</div>
								</a>
								<div class="book-details-overlay">
									<a href="" class="btn btn-warning button-absotalate">Add to cart</a>
									<a href="view-details.html" class="btn btn-info btn-block button-fixed">View Details</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
@endsection