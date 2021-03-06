	
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
									<?php 
										if ($item->discount != 0) {
									?>
										<h5><s>{{number_format($item->price, 0, ',', ',')}}</s> -{{$item->options->discount}}%</h5>
										<p>{{number_format($item->price-$item->discount, 0, ',', ',')}}</p>
									<?php
										} else {
									?>
									<p>{{number_format($item->price, 0, ',', ',')}}</p>
									<?php 
										} 
									?>
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
									<p class="cart_total_price" id="item_total_price_{{$item->rowId}}">{{number_format($item->total, 0, ',', ',')}}</p>
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
							        	<div class="three no-color">
							        		<span id="freeship" class="fa fa-check <?php if ((int)Cart::total(0, 0, '') < 500000) { echo 'hidden'; } ?>"></span>
							        		<p class="text-right">Freeship</p>
							        	</div>
							  			<div class="progress-bar" id="progress-bar" style="width: {{(int)Cart::total(0, 0, '')/500000*100}}%;"></div>
									</div>
									<?php 
										if ((int)Cart::total(0, 0, '') < 500000) {
											$help_text = 'Mua thêm ' . number_format(500000-(int)Cart::total(0, 0, ''), 0, ',', ',') . 'đ để được Freeship';
										} else {
											$help_text = 'Đơn hàng đã đủ điều kiện Freeship';
										}
									?>
									<p style="text-align: center;" id="help-text">
										{{$help_text}}
									</p>
								</td>
							</tr>
							<tr>
								<td class="cart_total text-right" colspan="5">
									<span class="cart_total_price ">Tạm tính:</span>
									<span class="cart_total_price" id="cart_total_price">{{Cart::total(0, 0, ',')}}<u>đ</u></span>
								</td>
								<td class="cart_total">
									<a class="btn btn-danger btn-block" style="border-radius: 0" href="{{url('/checkout')}}"><b>ĐẶT HÀNG</b></a>
								</td>
							</tr>
						@endif
					</tbody>
				</table>

			</div>
		</div>