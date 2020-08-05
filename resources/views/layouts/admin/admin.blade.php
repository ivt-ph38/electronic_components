<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{-- {{ csrf_token() }} --}}">
		<meta name="description" content="{{-- {{ $description }} --}}">
		<meta name="keywords" content="{{-- {{ $keywords }} --}}">
		<meta name="author" content="">
		<meta http-equiv="content-language" content="vi" />
		<title>Linh kiện điện tử</title>

		<!-- Favicons -->
		{{-- <link rel="icon" href="{{asset('favicon.png')}}">
		<link rel="icon" href="{{asset('favicon-32x32.png')}}" sizes="32x32" type="image/png">
		<link rel="icon" href="{{asset('favicon-16x16.png')}}" sizes="16x16" type="image/png">
		<link rel="apple-touch-icon" href="{{asset('apple-touch-icon.png')}}" sizes="180x180">

		<!-- Facebook -->
		<meta property="og:url" content="{{ Request::url() }}">
		<meta property="og:title" content="{{ $webname }}">
		<meta property="og:description" content="{{ $description }}">
		<meta property="og:type" content="website">
		<meta property="og:image" content="">
		<meta property="og:site_name" content="{{ $webname }}">
		<meta property="og:locale" content="vi_VN"> --}}
		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/bootstrap.max.css')}}">
		<link rel="stylesheet" href="{{asset('css/admin.css')}}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{asset('summernote/summernote.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/fontawesome/css/fontawesome.min.css')}}">
		<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" ></script>
		<script src="{{asset('summernote/summernote.min.js')}}" ></script>
	</head>
	<body>
		@include('layouts.admin.header')
		<div class="container-fluid mt-5 pt-5">
			<div class="row">
				<div class="col-md-2">
					@include('layouts.admin.left')
					@yield('left');
				</div>
				<div class="col-md-10">
					@yield('content')
				</div>
			</div>
		</div>
		<hr>
		<script src="{{asset('js/popper.min.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/datatables.min.js')}}"></script>
		<script src="{{asset('js/dataTables.bootstrap4.min.js')}}"></script>
		<link rel="stylesheet" href="{{asset('css/dataTables.bootstrap4.min.css')}}">
		<script>
			$(document).ready(function() {

           $('#technig').summernote({

             height:300,

           });

       });
		</script>
	</body>
</html>