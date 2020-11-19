@extends('user.layout.layout')
@section('body')
	<header>
	 	@include('user.layout.header_area')
	 	@include('user.layout.header_menu')
	</header>
	<main>
		<div class="I-purchase">
			<div class="wrapper">
				<div class="purchase_wrapper">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
							<div class="navigation_wrapper">
								<a href=""><span class="icon user"><i class="fas fa-user"></i></span>Hồ sơ</a>
								<a href=""><span class="icon address"></span>Địa chỉ</a>
								<a href=""><span class="icon buying"></span>Đơn mua</a>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6 col-md-9 col-lg-9 col-xl-9">
							<div class="main_wrapper">
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
 	@include('user.layout.footertop')
 	@include('user.layout.quickview')
@endsection()