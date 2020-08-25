@extends('layouts.login')
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" role="form" action="{{ route('password.request') }}" method="POST">
					@csrf
					<span class="login100-form-title p-b-33">
						<a href="{{route('welcome')}}"><img src="{{asset('images/logo.png')}}" alt="{{$webname}}"></a>
					</span>
					<input type="hidden" name="token" value="{{ $token }}">
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" value="{{ $email ?? old('email')}}" id="" placeholder="Email">
					@if($errors->has('email'))
						<p>{{ $errors->first('email') }}</p>
					@endif	
					</div>
					<div class="form-group">
						<label for="">Mật Khẩu Mới</label>
						<input type="password" name="password" class="form-control" id="" placeholder="* Nhập Mật Khẩu Mới Của Bạn">
					@if($errors->has('password'))
						<p class="note">{{ $errors->first('password') }}</p>
					@endif		
					</div>
					<div class="form-group">
						<label for="">Xác Nhận Mật Khẩu</label>
						<input class="form-control" placeholder="* Xác nhận mật khẩu" name="password_confirmation" type="password">
					</div>										
					<div class="container-login100-form-btn m-t-20 form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đồng Ý">
					</div>

					<div class="text-center p-t-45 p-b-4">
						<a href="{{ route('login') }}" class="txt2 hov1">
							Đăng Nhập
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection