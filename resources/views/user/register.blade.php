<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Brandshop | Home One</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico in the root directory -->
		<!-- <link rel="apple-touch-icon" href="apple-touch-icon.png"> -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}">
		
		<!-- Google Font -->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!-- style css -->
		<link rel="stylesheet" href="{{ asset('user/style.css') }}">
		<!-- modernizr css -->
        <script src="{{ asset('user/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    </head>
    <body>


        <div class="I-login">
            <div class="login_header">
                <div class="wrapper">
                    <div class="image_wrapper">
                        <img src="{{ asset('img/home-one/logo.png') }}">
                    </div>
                </div>
            </div>
            <div class="login_content">
                <form class="login_form" method="post" action="{{ route('customer.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if ( Session::has('error') )
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>{{ Session::get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                        </div>
                    @endif
                    <h1 class="title_form">Đăng Kí</h1>
                    <input type="text" name="email" placeholder="Email">
                    <input type="password" name="password" placeholder="Mật khẩu">
                    <input type="text" name="name" placeholder="Họ và tên">
                    <input type="text" name="address" placeholder="Địa chỉ">
                    <input type="date" name="birthday" placeholder="Ngày sinh">
                    <input type="text" name="telephone" placeholder="Số điện thoại">
                    <select name="sex">
                        <option value="0">-> Giới tính</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                        <option value="3">Khác</option>
                    </select>
                    <button type="submit">Đăng Kí</button>
                    <div class="register_wrapper"><span>hoặc</span><a href="{{ route('customer.login') }}">Đăng nhập</a></div>
                </form>
            </div>
        </div>


        <!-- all js here -->
        <!-- jquery latest version -->
        <script src="{{ asset('user/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
        <!-- owl.carousel js -->
        <script src="{{ asset('user/js/owl.carousel.min.js') }}"></script>
        <!-- meanmenu js -->
        <script src="{{ asset('user/js/jquery.meanmenu.js') }}"></script>
        <!-- jquery-ui js -->
        <script src="{{ asset('user/js/jquery-ui.min.js') }}"></script>
        <!-- Nivo Slider js -->
        <script src="{{ asset('user/js/jquery.nivo.slider.pack.js') }}"></script>
        <!-- count down JS -->
        <script src="{{ asset('user/js/jquery.countdown.js') }}"></script>
        <!-- Cloud Zoom JS -->
        <script src="{{ asset('user/js/cloud-zoom.js') }}"></script>
        <!-- wow js -->
        <script src="{{ asset('user/js/wow.min.js') }}"></script>
        <!-- plugins js -->
        <script src="{{ asset('user/js/plugins.js') }}"></script>
        <!-- main js -->
        <script src="{{ asset('user/js/main.js') }}"></script>
        <!-- custom js -->
        <script src="{{ asset('user/js/custom.js') }}"></script>
    </body>
</html>