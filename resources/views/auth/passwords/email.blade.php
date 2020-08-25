@extends('layouts.login')
@section('content')
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form" role="form" action="{{ route('password.email') }}" method="POST">
					@csrf
					<span class="login100-form-title p-b-33">
						<a href="{{route('welcome')}}"><img src="{{asset('images/logo.png')}}" alt="{{$webname}}"></a>
					</span>
					<div class="form-group">
						<label for="">Email</label>
						<input type="text" class="form-control" name="email" value="{{old('email')}}" id="" placeholder="* Nhập Email Của Bạn">
					</div>	
					@if($errors->has('email'))
						<p class="note">{{ $errors->first('email') }}</p>
					@endif					
					<div class="container-login100-form-btn m-t-20 form-group">
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Đặt Lại Mật Khẩu">
					</div>
					<div class="text-center p-t-45 p-b-4">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection