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
	 	@include('user.layout.slider')
	 	@include('user.layout.banner_add')
	 	@include('user.layout.service')
	 	<!-- Sản phẩm nổi bật -->
	 	@include('user.layout.arrival')
	 	<!-- Mô tả đặc biệt -->
	 	@include('user.layout.specification')
	 	<!-- Sản phẩm mới -->
	 	@include('user.layout.featured')
	 	@include('user.layout.blog')
	</main>
 	@include('user.layout.footertop')
 	@include('user.layout.quickview')
		
@endsection()
