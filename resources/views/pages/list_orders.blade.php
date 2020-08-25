@extends('layouts.master')
@section('content')
<div class="features_items" style="padding: 50px"><!--features_items-->	
	<h2 class="title text-left">Danh sách đơn hàng
	<?php if (Session::has('success')) { ?>
		<small class="text-success">({{Session::get('success')}})</small>
	<?php } ?> 
	</h2> 
	<section id="cart_items" class="checkout-form" style="padding: 10px;">                
<div class="table-responsive">
	<table class="table table-striped table-bordered mt-3" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>ID</th>
				<th>Ngày đặt</th>
				<th>Giá trị</th>
				<th>Trạng thái</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{$order->code}}</td>
					<td>{{date_format($order->created_at, 'd/m/Y H:i:s')}}</td>
					<td>{{number_format($order->total,0, '.', ',')}} VND</td>
					<td>
						@if ($order->status == 1)<span class="label label-success">Mới tạo</span>@endif
						@if ($order->status == 2)<span class="label label-warning">Giao hàng</span>@endif
						@if ($order->status == 3)<span class="label label-success">Đã giao</span>@endif
						@if ($order->status == 4)<span class="label label-danger">Hủy</span>@endif
					</td>
					<td><a href="{{url('/order/'.$order->code)}}">Xem đơn hàng</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
</div>



	</section> <!--/#cart_items-->
</div><!--features_items-->
@endsection