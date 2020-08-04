	
		<div class="">
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Sản phẩm</td>
							<td class="description"></td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Thành tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@csrf
						@forelse (Cart::content() as $item)
							<tr>
								<td class="cart_product">
									<a href=""><img style="width: 50px" src="{{ URL::asset('images/product01.jpg')}}" alt=""></a>
								</td>
								<td class="cart_description">
									{{$item->name}}
								</td>
								<td class="cart_price">
									<p>{{number_format($item->price, 0, ',', ',')}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<span class="cart_quantity_up"> + 
											<input type="hidden" name="rowId" value="{{$item->rowId}}">
										</span>
										<input id="{{$item->rowId}}" style="width: 60px; text-align:center;" class="cart_quantity_input" type="text" min="1" name="quantity" value="{{$item->qty}}" autocomplete="on">
										<span class="cart_quantity_down" href=""> - 
											<input type="hidden" name="rowId" value="{{$item->rowId}}">
										</span>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price" id="item_total_price_{{$item->rowId}}">{{number_format($item->qty*$item->price, 0, ',', ',')}}</p>
								</td>
								<td class="cart_delete">
									<span class="cart_quantity_delete remove"><i class="fa fa-times"></i>
										<input type="hidden" name="rowId" value="{{$item->rowId}}">
									</span>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="6" style="padding-top: 25px; text-align: center;">
									Không có sản phẩm nào trong giỏ hàng
								</td>
							</tr>
						@endforelse
						@if (count(Cart::content()))
							<tr>
								<td colspan="6" class="progress-body">
									<div class="progress">
							        	<div class="one primary-color"></div>
							        	<div class="two primary-color">
							        		<span class="fa fa-check"></span>
							        		<p class="text-right">Freeship TP.HCM</p>
							        	</div>
							        	<div class="three no-color">
							        		<span class="fa fa-check"></span>
							        		<p class="text-right">Freeship</p>
							        	</div>
							  			<div class="progress-bar" style="width: 70%;"></div>
									</div>
									<p style="text-align: center;">Đơn hàng đã đủ điều kiện Freeship</p>
								</td>
							</tr>
							<tr>
								<td class="cart_total text-right" colspan="4">
									<span class="cart_total_price ">Tạm tính:</span>
									<span class="cart_total_price" id="cart_total_price">{{Cart::total()}}<u>đ</u></span>
								</td>
								<td class="cart_total">
									<a class="btn btn-danger" href="#"><b>ĐẶT HÀNG</b></a>
								</td>
							</tr>
						@endif
					</tbody>
				</table>

			</div>
		</div>