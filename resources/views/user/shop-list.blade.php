@extends('user.layout.layout')
@section('body')

	<!--[if lt IE 8]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<header>
	 	@include('user.layout.header_area')
	 	@include('user.layout.header_menu')
	</header>
	<main>
		<!-- BREADCRUMB AREA START -->
		<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-list">
							<h1><?php echo $category_title ?></h1>
							<ul>
								<li><a href="/">Trang chủ</a> <span class="divider"> &gt; </span></li>
								<li><?php echo $category_title ?></li>
							</ul>					
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- BREADCRUMB AREA END -->
		<!-- SHOP AREA START -->
		<div class="shop-area section-padding">
			<div class="container">
				<div class="row custom-row">
					<div class="col-md-12 col-left-right">
						<div class="shop-right-area">
							<div class="shop-tab-area">
								<!--NAV PILL-->
								<div class="shop-tab-pill">
									<ul>
										<li id="p-mar">
											<a data-toggle="pill" href="#grid">
												<i class="flaticon-nine-small-boxes"></i>
											</a>
										</li>
										<li class="active">
											<a data-toggle="pill" href="#list">
												<i class="flaticon-list-with-dots"></i>
											</a>
										</li>
									</ul>
									<ul class="paginations">
										<li class="prev">Pages : </li>
										<li class="active"><span>1</span></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li class="next"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>
								</div>
								<!--NAV PILL-->
								<div class="tab-content">
									<div class="row tab-pane custom-row" id="grid">
										<?php foreach ($items as $key => $value): ?>
											<!-- Single Product -->
											<div class="col-md-3 col-left-right">
												<div class="single-product">
													<input type="hidden" class="id_item" name="id" value="<?php echo $value->id ?>">
													<div class="product-titel">
														<h4><a href="{{ route('customer.product_detail', ['slug' => $value->slug]) }}"><?php echo $value->name ?></a></h4>
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
													</div>
													<div class="box-content">
														<div class="product-img">
															<a href="{{ route('customer.product_detail', ['slug' => $value->slug]) }}"><img src="{{ asset($value->image_url) }}" alt="None Image" /></a>
														</div>
													<div class="overlay-content">
														<p><?php echo $value->description ?></p>
														<ul>
															<li>
																<a title="Add to cart" href="#">
																	<i class="flaticon-commerce"></i>
																</a>
															</li>
															<li>
																<a title="Quick View" href="#" data-toggle="modal" data-target="#productModal" class="view_item">
																	<i class="flaticon-symbols"></i>
																</a>
															</li>
															<li>
																<a title="Like" href="#">
																	<i class="flaticon-favorite-heart-button"></i>
																</a>
															</li>
															<li>
																<a title="Refresh" href="#">
																	<i class="flaticon-refresh-button"></i>
																</a>
															</li>
														</ul>
													</div>
													</div>
													<div class="price-box">
														<?php if ($value->discount == 0): ?>
															<span class="price"><?php echo number_format($value->price) . ' đ' ?></span>
														<?php else: ?>
															<span class="old-price"><?php echo number_format($value->price) . ' đ' ?></span>
															<span class="price"><?php echo number_format($value->price - $value->price*$value->discount/100) . ' đ' ?></span>
														<?php endif ?>
													</div>
												</div>
											</div>
											<!-- Single Product -->
										<?php endforeach ?>
									</div>
									<div class="tab-pane active" id="list">
										<div class="row">
										<?php foreach ($items as $key => $value): ?>
											<!-- Single Product List -->
											<div class="col-md-12">
												<div class="single-product-list">
													<input type="hidden" class="id_item" name="id" value="<?php echo $value->id ?>">
													<div class="product-img">
														<img src="{{ asset($value->image_url) }}" alt="" />
													</div>
													<div class="single-pro-content fix">
														<a href="{{ route('customer.product_detail', ['slug' => $value->slug]) }}" class="pro-name"><?php echo $value->name ?></a>
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<span>10 Review(s)</span>
														</div>
														<p><?php echo $value->description ?></p>
														<h4 class="list-pro-price">
															<?php if ($value->discount == 0): ?>
																<span class="old"><?php echo number_format($value->price) . ' đ' ?></span>
															<?php else: ?>
																<span class="new"><?php echo number_format($value->price) . ' đ' ?></span>
																<span class="old"><?php echo number_format($value->price - $value->price*$value->discount/100) . ' đ' ?></span>
															<?php endif ?>
														</h4>
														<div class="shop-icon">
															<ul>
																<li>
																	<a title="Add to cart" href="#">
																		<i class="flaticon-commerce"></i>
																	</a>
																</li>
																<li>
																	<a title="Quick View" href="#" data-toggle="modal" data-target="#productModal">
																		<i class="flaticon-symbols"></i>
																	</a>
																</li>
																<li>
																	<a title="Like" href="#">
																		<i class="flaticon-favorite-heart-button"></i>
																	</a>
																</li>
																<li>
																	<a title="Refresh" href="#">
																		<i class="flaticon-refresh-button"></i>
																	</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
											<!-- Single Product List -->
										<?php endforeach ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- SHOP AREA END -->
	</main>
 	@include('user.layout.footertop')
 	@include('user.layout.quickview')
		
@endsection()