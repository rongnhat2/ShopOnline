@extends('user.layout.layout')
@section('body')

	<!--[if lt IE 8]>
	    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
 	@include('user.layout.header_area')
 	@include('user.layout.header_menu')
 	@include('user.layout.slider')
 	@include('user.layout.banner_add')
 	@include('user.layout.service')
 	@include('user.layout.arrival')
 	@include('user.layout.specification')
 	@include('user.layout.add_image')
 	@include('user.layout.hotdeals')
 	@include('user.layout.featured')
 	@include('user.layout.blog')
 	@include('user.layout.testimonial')
 	@include('user.layout.brand')
 	@include('user.layout.newsletter')
 	@include('user.layout.footertop')
 	@include('user.layout.footerbottom')
 	@include('user.layout.quickview')
		
@endsection()
