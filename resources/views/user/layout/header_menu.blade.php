
		<!-- MENU ARAE START -->
		<div class="menu-main-area">
			<div class="container">
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-7">
						<div class="logo-area">
							<a href="#"><img src="{{ asset('img/home-one/logo.png') }}" alt="" /></a>
						</div>
					</div>
					<div class="col-md-8 col-sm-12 col-xs-0">
						<div class="mainmenu">
                            <nav>
                                <ul id="nav">
                                    <li class="current"><a href="{{ route('customer.index') }}">Trang chủ</a> </li>
									<li><a href="#">Về chúng tôi</a></li>
                                    <li><a href="{{ route('customer.shop_list', ['slug' => 'nam']) }}">Nam</a></li>
                                    <li class="hot"><a href="{{ route('customer.shop_list', ['slug' => 'nu']) }}">Nữ</a></li>
                                    <li><a href="{{ route('customer.shop_list', ['slug' => 'tat-ca-san-pham']) }}">Danh mục</a>
                                    	<ul class="sub-menu">
                                        	<?php foreach ($categories as $key => $value): ?>	
                                            	<li><a href="{{ route('customer.shop_list', ['slug' => $value->slug]) }}"><?php echo $value->name ?></a></li>
                                        	<?php endforeach ?>	
                                        </ul>
									</li>
                                    <li><a href="#">BLOG</a></li>
                                    <li><a href="#">Liên Hệ</a></li>
                                </ul>
                            </nav>
                        </div>
					</div>
					<div class="col-md-2 col-sm-12 col-xs-5">
						<div class="cart-area">
							<ul>
								<li class="cart-active">
									<a href="#">
										<img src="{{ asset('img/icon/cart.png') }}" alt="" />
										<p>(3)</p>
										<span>250.000</span>
									</a>
									 <div class="cart-form">
										<div class="cart-single-product">
											<div class="cart-single-product-img">
												<img src="" alt="">
											</div>
											<div class="cart-single-product-title">
												<a href="#">Vopntria jast</a>
												<p>$380<span>X</span>01</p>
											</div>
											<div class="cart-single-product-del">
												<a href="#"><i class="flaticon-rubbish-bin"></i></a>
											</div>
										</div>
										<div class="total-amount fix">
											<p>Tổng: </p><span>$845 </span>
											
										</div>
										<div class="action-cart">
											<a href="#" class="viewcart">Xem giỏ hàng</a>
											<a href="#" class="checkout">Đặt hàng</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MENU ARAE END -->
		<!-- MOBILE-MENU-AREA START --> 
		<div class="mobile-menu-area">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
					<div class="mobile-area">
						<div class="mobile-menu">
							<nav id="mobile-nav">
								<ul>
									<li><a href="{{ route('customer.index') }}">Trang chủ </a></li>
                                    <li><a href="#"> Về chúng tôi </a></li>
                                    <li><a href="{{ route('customer.shop_list', ['slug' => 'nam']) }}"> Nam </a></li>
                                    <li class="hot"><a href="{{ route('customer.shop_list', ['slug' => 'nu']) }}">Nữ</a></li>
									<li><a href="{{ route('customer.shop_list', ['slug' => 'tat-ca-san-pham']) }}"> Phụ kiện </a>
										<ul>
                                        	<?php foreach ($categories as $key => $value): ?>	
                                            	<li><a href="{{ route('customer.shop_list', ['slug' => $value->slug]) }}"><?php echo $value->name ?></a></li>
                                        	<?php endforeach ?>	
										</ul>
									</li>
									<li><a href="#">Blog</a></li>
									<li><a href="#"> Liên hệ </a></li>
								</ul>
							</nav>
						</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- MOBILE-MENU-AREA END  -->