@extends('layouts.master')
@section('content')
<div class="features_items"><!--features_items-->	
	<h2 class="title text-left">Đặt hàng</h2>  
	<section id="cart_items" class="checkout-form" style="padding: 10px;">                
		<?php 
		if (count(Cart::content())) { ?>


<form action="{{ url('/checkout') }}" file="true" method="POST" role="form">
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="phone">{{ __('Số điện thoại') }}: <span class="text-danger">*</span></label>
				<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="" placeholder="Nhập số điện thoại của bạn">
				@if ($errors->has('phone'))
			      <small id="" class="form-text text-muted text-danger">* {{$errors->first('phone')}}</small>
			    @endif
			</div>
			<div class="form-group">
				<label for="name">{{ __('Họ tên') }}: <span class="text-danger">*</span></label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Nhập họ tên của bạn">
				@if ($errors->has('name'))
			      <small id="" class="form-text text-muted text-danger">* {{$errors->first('name')}}</small>
			    @endif
			</div>										
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="email">{{ __('Email') }}: <span class="text-danger">*</span></label>
				<input type="email" name="email" value="{{ old('email') }}" class="form-control" id="price" placeholder="Nhập địa chỉ email của bạn">
				@if ($errors->has('email'))
			      <small id="" class="form-text text-muted text-danger">* {{$errors->first('email')}}</small>
			    @endif
			</div>				
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="address">{{ __('Địa chỉ') }}: <span class="text-danger">*</span></label>
				<input type="text" name="address" value="{{ old('address') }}" class="form-control" id="" placeholder="Nhập họ tên của bạn">
				@if ($errors->has('address'))
			      <small id="" class="form-text text-muted text-danger">* {{$errors->first('address')}}</small>
			    @endif
			</div>										
		</div>
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success cart_total">
					<div class="form-group">
						<label for="message">Nội dung lưu ý đối với shiper</label>
						<input type="text" name="message" value="{{ old('message') }}" class="form-control" id="" placeholder="Nội dung lưu ý đối với shiper...">
					</div>
					<?php if ((int)Cart::total(0, 0, '') > 500000) {  ?>
						<span class="btn btn-success">* Freeship</span>
					<?php } ?> 
			<button type="submit" class="btn btn-danger pull-right" style="border-radius: 0">Đặt hàng</button>							
			</div>
	</div>
	
</div>
</form>
<div class="" style="margin-top: 15px">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total text-right">Thành tiền</td>
						</tr>
					</thead>
					<tbody>
						@csrf
						@foreach (Cart::content() as $item)
							<tr>
								<td class="cart_product">
									<a href=""><img style="width: 50px" src="{{ URL::asset('images/product01.jpg')}}" alt=""></a>
								</td>
								<td class="cart_description">
									{{$item->name}}
								</td>
								<td class="cart_price">
									<?php 
										if ($item->discount != 0) {
									?>
										<h5><s>{{number_format($item->price, 0, ',', ',')}}</s> -{{$item->options->discout}}%</h5>
										<p>{{number_format($item->price-$item->discount, 0, ',', ',')}}</p>
									<?php
										} else {
									?>
									<p>{{number_format($item->price, 0, ',', ',')}}</p>
									<?php 
										} 
									?>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{$item->qty}}</p>
								</td>
								<td class="cart_total text-right">
									<p class="cart_total_price" id="item_total_price_{{$item->rowId}}">{{number_format($item->total, 0, ',', ',')}}</p>
								</td>
							</tr>
						@endforeach
							<tr>
								<td class="cart_total text-right" colspan="5">
									<span class="cart_total_price ">Tổng tiền:</span>
									<span class="cart_total_price" id="cart_total_price">{{Cart::total(0, 0, ',')}}<u>đ</u></span>
								</td>
							</tr>
					</tbody>
				</table>

			</div>
		</div>


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