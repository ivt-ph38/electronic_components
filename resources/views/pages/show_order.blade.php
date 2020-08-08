@extends('layouts.master')
@section('content')
<div class="features_items" style="padding: 50px"><!--features_items-->	
	<h2 class="title text-left">Đơn hàng
	<?php if (Session::has('success')) { ?>
		<small class="text-success">({{Session::get('success')}})</small>
	<?php } ?> 
	</h2> 
	<section id="cart_items" class="checkout-form" style="padding: 10px;">                


<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf
			<div class="form-group">
				<label for="">{{ __('Mã đơn hàng') }}: <b>#{{$order->code}}</b></label>
			</div>
			<div class="form-group">
				<label for="">{{ __('Thời gian tạo') }}: <b>{{date_format($order->created_at, 'd/m/Y H:i:s')}}</b></label>
			</div>
			<div class="form-group">
				<label for="">{{ __('Trạng thái') }}: <b>#{{$order->status}}</b></label>
			</div>		
			<div class="form-group">
				<label for="phone">{{ __('Số điện thoại') }}: <b>{{$order->phone}}</b></label>
			</div>
			<div class="form-group">
				<label for="name">{{ __('Họ tên') }}:<b> {{$order->name}}</b></label>
			</div>										
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="email">{{ __('Email') }}:<b> {{$order->email}}</b></label>
			</div>				
		</div>		
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="address">{{ __('Địa chỉ') }}:<b> {{$order->address}}</b></label>
			</div>										
		</div>
	</div>
	
</div>

<div class="">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price text-center">Giá</td>
							<td class="quantity text-center">Số lượng</td>
							<td class="total text-right">Thành tiền</td>
						</tr>
					</thead>
					<tbody>
						@csrf
						@foreach ($order->details as $item)
							<tr>
								<td class="cart_product">
									<a href=""><img style="width: 50px" src="{{ URL::asset('images/product01.jpg')}}" alt=""></a>
								</td>
								<td class="cart_description">
									{{$item->product->name}}
								</td>
								<td class="cart_price text-center">
									{{$item->price}}
									<?php 
											if ($item->discount != null) {
												echo '(-'.$item->discount.'%)';
											}
									?>
								</td>
								<td class="cart_total text-center">
									<p class="cart_total_price">{{$item->quantity}}</p>
								</td>
								<td class="cart_total text-right">
									<p class="cart_total_price" id="">
										<?php 
											if (is_null($item->discount)) {
												$item->discount = 0;
											}
										?>
										{{number_format($item->quantity*$item->price*(100 - $item->discount)/100, 0, ',', ',')}}</p>
								</td>
							</tr>
						@endforeach
							<tr>
								<td class="cart_total text-right" colspan="5">
									<span class="cart_total_price ">Tổng tiền:</span>
									<span class="cart_total_price" id="cart_total_price">{{$order->total}}<u>đ</u></span>
								</td>
							</tr>
					</tbody>
				</table>

			</div>
		</div>

	</section> <!--/#cart_items-->
</div><!--features_items-->
@endsection