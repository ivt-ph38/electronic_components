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
		<link rel="stylesheet" href="{{asset('css/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/fontawesome/css/solid.min.css')}}">
		<script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" ></script>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="{{asset('js/ckeditor/ckeditor.js')}}"></script>
		<script src="{{asset('js/bootstrap.min.js')}}"></script>
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
					@if (Session::has('success'))
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
					@endif
					@if (Session::has('error'))
					<div class="alert alert-danger">
						{{ Session::get('error') }}
					</div>
					@endif					
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
		<script type="text/javascript">
			@yield('js')
		</script>
	</body>
</html>