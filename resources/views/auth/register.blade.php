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
				<form class="login100-form validate-form" role="form" action="{{ url('/register') }}" method="POST">
					@csrf
					<span class="login100-form-title p-b-33">
						Đăng Ký Thành Viên
					</span>
					<div class="form-group">
						<label for="">Họ Tên</label>
						<input type="text" name="name" class="form-control" id="" placeholder="* Họ Tên">
					</div>
					@if($errors->has('name'))
						<p class="note">{{ $errors->first('name') }}</p>
					@endif						
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" name="email" class="form-control" id="" placeholder="* Email">
					</div>
					@if($errors->has('email'))
						<p class="note">{{ $errors->first('email') }}</p>
					@endif						
					<div class="form-group">
						<label for="">Mật Khẩu</label>
						<input type="password" name="password" class="form-control" id="" placeholder="* Mật Khẩu">
					</div>
					@if($errors->has('password'))
						<p class="note">{{ $errors->first('password') }}</p>
					@endif
					<div class="form-group">
						<label for="">Xác Nhận Mật Khẩu</label>
						<input class="form-control" placeholder="* Xác nhận mật khẩu" name="password_confirmation" type="password">
					</div>
					@if($errors->has('password'))
						<p class="note">{{ $errors->first('password') }}</p>
					@endif													
					<div class="form-group">
						<label for="">Địa Chỉ</label>
						<input type="text" name="address" class="form-control" id="" placeholder="* Địa Chỉ">
					</div>
					@if($errors->has('address'))
						<p class="note">{{ $errors->first('address') }}</p>
					@endif						
					<button type="submit" class="btn btn-primary">Đăng Ký</button>
					<div class="text-center p-t-45 p-b-4">
						<p>Đã có tài khoản : <a href="{{ route('login') }}" class="txt2 hov1">
							Đăng Nhập
						</a></p>
					</div>										
				</form>
			</div>
		</div>
	</div>
@endsection
