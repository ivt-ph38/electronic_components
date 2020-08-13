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
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
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
						Đăng Nhập
					</span>

					<div class="wrap-input100 validate-input">
						<input class="form-control" placeholder="Email" name="email" type="text" value="{{ old('email') }}" autofocus>
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20 form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đăng nhập">
					</div>

					<div class="text-center p-t-45 p-b-4">
						<a href="#" class="txt2 hov1">
							Quên Mật Khẩu /
						</a>

						<a href="{{ route('register') }}" class="txt2 hov1">
							Đăng Ký
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection	