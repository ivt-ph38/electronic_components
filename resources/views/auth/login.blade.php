@extends('layouts.login')
@section('content')
<?php //Hiển thị thông báo thành công?>
@if ( Session::has('success') )
	<div class="alert alert-success alert-dismissible" role="alert">
		<strong>{{ Session::get('success') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" role="form" action="{{ route('login') }}" method="POST">
					@csrf
					<span class="login100-form-title p-b-33">
						<a href="{{route('welcome')}}"><img src="{{asset('images/logo.png')}}" alt="{{$webname}}"></a>
					</span>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" value="{{old('email')}}" id="" placeholder="Email">
					@if($errors->has('email'))
						<p>{{ $errors->first('email') }}</p>
					@endif	
					</div>
					<div class="form-group">
						<label for="">Mật Khẩu</label>
						<input type="password" name="password" class="form-control" id="" placeholder="Mật Khẩu">
					@if($errors->has('password'))
						<p>{{ $errors->first('password') }}</p>
					@endif		
					</div>					
					<div class="container-login100-form-btn m-t-20 form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng nhập">
					</div>

					<div class="text-center p-t-45 p-b-4">
						<a href="{{ route('register') }}" class="txt2 hov1">
							Đăng Ký
						</a>
						/
						<a href="{{ route('password.request') }}" class="txt2 hov1">
							Quên Mật Khẩu
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection	