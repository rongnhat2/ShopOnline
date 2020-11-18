@extends('user.layout.layout')
@section('body')

	<!--[if lt IE 8]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<header>
	 	@include('user.layout.header_area')
	 	@include('user.layout.header_menu')
	</header>

		<!-- BREADCRUMB AREA START -->
		<div class="breadcrumb-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="breadcrumb-list">
							<h1>SINGLE PRODUCT</h1>
							<ul>
								<li><a href="https://devitems.com/html/brand-shop-preview/brand-shop/index.html">home</a> <span class="divider"> &gt; </span></li>
								<li>Single Product</li>
							</ul>							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- BREADCRUMB AREA END -->
		<!-- START SINGLE PRODUCT AREA START -->
		<div class="single-product-area">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 col-xs-12">
						<!--zoom-section start-->
						<div class="zoom-section">    	  
							<div class="zoom-small-image">
								<div class="cloud-zoom-wrap">
									<a href="{{ asset($item->image_url) }}" class="cloud-zoom" id="zoom1" rel="adjustX:10, adjustY:-4"> 
										<img src="{{ asset($item->image_url) }}" alt="" title="Optional title display"> 
									</a>
									<div class="mousetrap"></div>
								</div>
							</div>
							<div class="zoom-desc">       
								<div class="thubm-pro owl-carousel owl-theme">
									<div class="owl-item">
										<a href="{{ asset($item->image_url) }}" class="cloud-zoom-gallery" title="Red" rel="useZoom:'zoom1',smallImage:'<?php echo $item->image_url ?>'">
											<img class="zoom-tiny-image" src="{{ asset($item->image_url) }}" alt="Thumbnail 1">
										</a>
									</div>
									<?php foreach ($item->image as $k => $v): ?>
										<div class="owl-item">
											<a href="{{ asset($v->image_url) }}" class="cloud-zoom-gallery" title="Red" rel="useZoom:'zoom1',smallImage:'<?php echo $v->image_url ?>'">
												<img class="zoom-tiny-image" src="{{ asset($v->image_url) }}" alt="Thumbnail 1">
											</a>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
						<!--zoom-section end-->
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12">
						<div class="single-product-description">
							<div class="pro-desc">
								<div class="pro-desc-left">
									<h2><a href="#"><?php echo $item->name ?></a></h2>
									<div class="rating-box">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<div class="pro-availability">
										<p class="availability">Availability :<span> In stock</span></p>
									</div>
								</div>
								<div class="pro-desc-right">
									<h4 class="list-pro-price">
										<?php if ($item->discount == 0): ?>
											<span class="old"><?php echo number_format($item->price) . ' đ' ?></span>
										<?php else: ?>
										<span class="new"><?php echo number_format($item->price) . ' đ' ?></span>
										<span class="old"><?php echo number_format($item->price - $item->price*$item->discount/100) . ' đ' ?></span>
										<?php endif ?>
									</h4>
								</div>
							</div>
							<div class="short-description-block">
								<?php echo $item->description ?>
							</div>
							<form method="post" action="#" id="form_buy">
								<div class="product-attributes clearfix">
									<div id="attributes">
										<fieldset class="attribute-fieldset">
											<label class="attribute-label">Kích thước :   </label>
											<div class="attribute-list">
												<div class="selector">
													<select name="group_1" class="form-control attribute-select">
														<option value="0" selected="selected" title="M">Seleted Size</option>
														<?php foreach ($item->size as $k => $v): ?>
															<option value="<?php echo $v->name ?>" title="<?php echo $v->name ?>"><?php echo $v->name ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
										</fieldset>
										<fieldset class="attribute-fieldset">
											<label class="attribute-label">Màu sắc :   </label>
											<div class="attribute-list">
												<div class="selector">
													<select name="group_1" class="form-control attribute-select">
														<option value="0" selected="selected" title="M">Seleted Size</option>
														<?php foreach ($item->color as $k => $v): ?>
															<option value="<?php echo $v->name ?>" title="<?php echo $v->name ?>" style="background-color: <?php echo $v->hex ?>"><?php echo $v->name ?></option>
														<?php endforeach ?>
													</select>
												</div>
											</div>
										</fieldset>
										<fieldset class="attribute-fieldset">
											<label class="attribute-label">Quantity :  </label>
											<div class="attribute-list">
												<div class="selector">
													<select name="group_2" class="form-control attribute-select">
														<option value="5" selected="selected" title="Black">03</option>
														<option value="6" title="White">04</option>
														<option value="7" title="White">05</option>
													</select>
												</div>
											</div> 
										</fieldset>
									</div>
								</div>
							</form>
							<div class="shop-icon">
								<ul>
									<li>
										<a class="active" href="#" title="Add to cart">
											<i class="flaticon-commerce"></i>
										</a>
									</li>
									<li>
										<a href="#" title="Refresh">
											<i class="flaticon-refresh-button"></i>
										</a>
									</li>
									<li>
										<a href="#" title="Like">
											<i class="flaticon-favorite-heart-button"></i>
										</a>
									</li>
								</ul>
							</div>
							<div class="social-net">
								<label>Share :  </label>
								<ul>
									<li>
										<a class="facebook" href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
									</li>
									<li>
										<a class="twiter" href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
									</li>
									<li>
										<a class="google" href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a>
									</li>
									<li>
										<a class="linkdin" href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- SINGLE-PRODUCT INFO TAB START -->
					<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="product-more-info-tab">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs more-info-tab">
								<li class=""><a href="#moreinfo" data-toggle="tab" aria-expanded="false">Mô tả chi tiết</a></li>
								<li class=""><a href="#review" data-toggle="tab" aria-expanded="false">REVIEWS</a></li>
								<li class="active"><a href="#datasheet" data-toggle="tab" aria-expanded="true">Các thuộc tính</a></li>
							</ul>
							  <!-- Tab panes -->
							<div class="tab-content">
								<div class="tab-pane" id="moreinfo">
									<div class="tab-description">
										<?php echo $item->detail ?>
									</div>
								</div>
								<div class="tab-pane" id="review">
									<div class="row tab-review-row">
										<div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
											<div class="tab-rating-box">
												<span>Grade</span>
												<div class="rating-box">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half-empty"></i>
												</div>	
												<div class="review-author-info">
													<strong>write A REVIEW</strong>
													<span>06/22/2015</span>
												</div>															
											</div>
										</div>
										<div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
											<div class="write-your-review">
												<p><strong>write A REVIEW</strong></p>
												<p>write A REVIEW</p>
												<span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
												<a href="#">Report abuse </a>
											</div>
										</div>
										<a href="#" class="write-review-btn">Write your review!</a>
									</div>
								</div>
								<div class="tab-pane active" id="datasheet">
									<div class="deta-sheet">
										<table class="table-data-sheet">			
											<tbody>
												<tr class="odd">
													<td>Chất liệu</td>
													<td>
														<?php foreach ($item->composition as $k => $v): ?>
															<?php echo $v->name . ', ' ?>
														<?php endforeach ?>
													</td>
												</tr>
												<tr class="even">
													<td class="td-bg">Phong Cách</td>
													<td class="td-bg">
														<?php foreach ($item->style as $k => $v): ?>
															<?php echo $v->name . ', ' ?>
														<?php endforeach ?>
													</td>
												</tr>
												<tr class="odd">
													<td>Thuộc tính</td>
													<td>
														<?php foreach ($item->property as $k => $v): ?>
															<?php echo $v->name . ', ' ?>
														<?php endforeach ?>
													</td>
												</tr>
											</tbody>
										</table>				
									</div>
								</div>
							</div>									
						</div>
					</div>
					<!-- SINGLE-PRODUCT INFO TAB END -->
				</div>
			</div>
		</div>
		<!-- START SINGLE PRODUCT AREA END -->
	 	<!-- Sản phẩm mới -->
	 	@include('user.layout.featured')
 	@include('user.layout.footertop')
 	<!-- @include('user.layout.footerbottom') -->
 	@include('user.layout.quickview')
		
@endsection()