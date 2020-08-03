	
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
									<a href=""><img width="50" src="{{ URL::asset('images/product01.jpg')}}" alt=""></a>
								</td>
								<td class="cart_description">
									{{$item->name}}
								</td>
								<td class="cart_price">
									<p>{{number_format($item->price, 0, ',', ',')}}</p>
								</td>
								<td class="cart_quantity">
									<div class="cart_quantity_button">
										<a class="cart_quantity_up" href=""> + 
											<input type="hidden" name="rowId" value="{{$item->rowId}}">
										</a>
										<input onchange="cart_quantity_update()" id="{{$item->rowId}}" style="width: 60px; text-align:center;" class="cart_quantity_input" type="number" min="1" name="quantity" value="{{$item->qty}}" autocomplete="on">
										<a class="cart_quantity_down" href=""> - 
											<input type="hidden" name="rowId" value="{{$item->rowId}}">
										</a>
									</div>
								</td>
								<td class="cart_total">
									<p class="cart_total_price">{{number_format($item->qty*$item->price, 0, ',', ',')}}</p>
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
					</tbody>
				</table>
				@if (count(Cart::content()))
				TỔn
				@endif
			</div>
		</div>