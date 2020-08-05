@extends('layouts.master')
@section('content')
<div class="features_items"><!--features_items-->	
	<h2 class="title text-left">Đặt hàng</h2>  
	<section id="cart_items" class="checkout-form" style="padding: 10px;">                
		<?php 
		if (count(Cart::content())) { ?>


<form action="{{ url('/') }}" file="true" method="POST" role="form">
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="phone">{{ __('Số điện thoại') }}</label>
				<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="" placeholder="Nhập số điện thoại của bạn">
			</div>
			<div class="form-group">
				<label for="name">{{ __('Họ tên') }}</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Nhập họ tên của bạn">
			</div>										
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="email">{{ __('Email') }}</label>
				<input type="email" name="email" value="{{ old('email') }}" class="form-control" id="price" placeholder="Nhập địa chỉ email của bạn">
			</div>				
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="province">{{ __('Tỉnh/ Thành phố') }}</label>
				<input type="text" name="province" value="{{ old('province') }}" class="form-control" id="" placeholder="Chọn tỉnh thành...">
			</div>
			<div class="form-group">
				<label for="name">{{ __('Địa chỉ') }}</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Nhập họ tên của bạn">
			</div>										
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="district">{{ __('Huyện/ Quận') }}</label>
				<input type="text" name="district" value="{{ old('district') }}" class="form-control" id="price" placeholder="Chọn huyện, quận...">
			</div>				
		</div>		
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="message">Nội dung lưu ý đối với shiper</label>
						<textarea class="form-control" name="message" value="{{ old('message') }}"></textarea>
					</div>
			<button type="submit" class="btn btn-danger pull-right">Đặt hàng</button>							
			</div>
	</div>
	
</div>
</form>





		<?php
		} else { ?>
			<p>Bạn chưa có sản phẩm trong giỏ hàng.</p>
			<p><a class="btn btn-danger btn-block" href="{{url('/')}}"><span class="fa fa-home"></span> Về Trang chủ</a></p>
		<?php
		}
		?>
	</section> <!--/#cart_items-->
</div><!--features_items-->
@endsection