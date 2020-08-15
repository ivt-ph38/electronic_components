<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>{{ $webname }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{asset('css/login.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/line-awesome.css') }}" rel="stylesheet">
	<link href="{{ asset('css/line-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
@if (Auth::check())
<div>
Bạn đang đăng nhập với quyền 
@if( Auth::user()->role == 'admin')
	{{ "admin" }}
@elseif( Auth::user()->role == 'user')
	{{ "user" }}
@endif
</div>
<div class="pull-right" style="margin-top: 3px;"><a class="btn btn-primary" href="/{{ url('/logout') }}">Đăng xuất</a></div>
@endif
	@yield('content')
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="js/main.js"></script>
</body>
</html>