
<div style="padding: 50px; margin:0 auto">
	<h2>Đơn hàng</h2>
	<p>Mã đơn hàng: <b>#{{$order->code}}</b> <a href="{{url('/order/'.$order->code)}}">#Xem chi tiết</a></label></p>
	<p>Thời gian đặt hàng: {{date_format($order->created_at, 'd/m/Y H:i:s')}}</p>
	<p>Tên khách hàng: {{$order->name}}</p>
	<p>Số điện thoại: {{$order->phone}}</p>
	<p>Email: {{$order->email}}</p>
	<p>Địa chỉ: {{$order->address}}</p>
	<table>
		<thead>
			<tr>
				<td>Tên sản phẩm</td>
				<td>Giá</td>
				<td>Giảm giá</td>
				<td>Số lượng</td>
				<td>Thành tiền</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($order->details as $item)
				<tr>
					<td>{{$item->product->name}}</td>
					<td>{{number_format($item->price, 0, '', ',')}}</td>
					<td>
						<?php 
							if ($item->discount != null) {
								echo '(-'.$item->discount.'%)';
							}
						?>
					</td>
					<td>{{$item->quantity}}</td>
					<td>
						<?php 
							if (is_null($item->discount)) {
								$item->discount = 0;
							}
						?>
						{{number_format($item->quantity*$item->price*(100 - $item->discount)/100, 0, ',', ',')}}
					</td>
				</tr>
			@endforeach
				<tr>
					<td colspan="5" style="text-align: right;">
					Tổng tiền: {{number_format($order->total, 0, '', ',')}}<u>đ</u>
					</td>
				</tr>
		</tbody>
	</table>
	<p><a href="{{url('/')}}"><button style="padding: 5px; border-radius: 0; background: #5cb85c; color: #fff">Trang chủ HTSHOP</button></a></p>
</div>