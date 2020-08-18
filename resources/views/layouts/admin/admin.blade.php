<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- CSRF Token -->
		<meta name="_token" content="{{ csrf_token() }}">
		<meta name="description" content="{{-- {{ $description }} --}}">
		<meta name="keywords" content="{{-- {{ $keywords }} --}}">
		<meta name="author" content="">
		<meta http-equiv="content-language" content="vi" />
		<title>Linh kiện điện tử</title>

		<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/bootstrap.max.css')}}">
		<link rel="stylesheet" href="{{asset('css/admin.css')}}">
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{asset('summernote/summernote.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/fontawesome/css/fontawesome.min.css')}}">
		<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" ></script>
		<link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="{{asset('summernote/summernote.min.js')}}" ></script>
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
		<script type="text/javascript">
			@yield('js')
		</script>
	</body>
</html>