@extends('layouts.master')
@section('content')
<div class="features_items"><!--features_items-->	
	<h2 class="title text-left">GIỎ HÀNG</h2>  
	<section id="cart_items">                
		@include('pages.cart_content')
	</section> <!--/#cart_items-->
</div><!--features_items-->
@endsection
@section('js')
	$(document).on('click', '.cart_quantity_delete', function() {
		rowId = $(this)[0].children[1].value;
	  	$.ajax({
	        url: 'api/cart/remove-item',
	        type: 'POST',
		    data: {
		    	'_token': $("input[name*='_token']").val(),
		        'rowId': rowId,
		   	},
		    datatype: 'json',
		    success: function (data) {
	        	$("#cart_items").html(data.view);
	        	$('#cart_count').html(data.count);
	        },
	        error: function (error) {
		       	alert("Hệ thống đang bảo trì");
		    }
		});
	});

	$(document).on('click', '.cart_quantity_up', function() {
		rowId = $(this)[0].children[0].value;
		elm_qty = $(this)[0].parentElement.children[1];
		qty = Number(elm_qty.value);
		if (Number.isNaN(qty)) {
			qty = 1;
		}
		qty += 1;
		elm_qty.value = qty;
		cart_quantity_update(rowId, qty);
	});

	$(document).on('click', '.cart_quantity_down', function() {
		rowId = $(this)[0].children[0].value;
		elm_qty = $(this)[0].parentElement.children[1];
		qty = Number(elm_qty.value);
		if (Number.isNaN(qty)) {
			qty = 1;
		}
		if (qty > 1) {
			qty -= 1;
		}
		elm_qty.value = qty;
		cart_quantity_update(rowId, qty);
	});

	$(document).on('keyup', '.cart_quantity_input', function() {
		rowId = $(this)[0].getAttribute('id');
		qty = Number($(this)[0].value);
		if (qty != '') {
			if (Number.isNaN(qty) || qty < 1) {
				qty = 1;
			}
			$(this)[0].value = qty;
			cart_quantity_update(rowId, qty);
		}
	});

	$(document).on('focusout', '.cart_quantity_input', function() {
		rowId = $(this)[0].getAttribute('id');
		qty = Number($(this)[0].value);
		if (qty == '') {
			qty = 1;
			$(this)[0].value = qty;
		}
		cart_quantity_update(rowId, qty);
	});

	function cart_quantity_update (rowId, qty) {
		$.ajax({
	        url: 'api/cart/update-item',
	        type: 'POST',
		    data: {
		    	'_token': $("input[name*='_token']").val(),
		        'rowId': rowId,
		        'qty' : qty,
		   	},
		    datatype: 'json',
		    success: function (data) {
		    	$('#item_total_price_'+data.item.rowId).html(data.item.qty*data.item.price);
		    	$('#cart_total_price').html(data.total);
		    	$('#cart_count').html(data.count);
		    	total = parseInt(data.total.replace(',' , ''));
		    	if (total < 300000) {
		    		$('#freeship-in-city').attr('class', 'fa fa-check hidden');
		    	}
		    	else {
		    		$('#freeship-in-city').attr('class', 'fa fa-check');
		   		}
		   		if (total < 500000) {
		    		$('#freeship').attr('class', 'fa fa-check hidden');
		    		format_number = Intl.NumberFormat().format(500000-total);
		    		help_text = 'Mua thêm ' + format_number.toString() + 'đ để được Freeship';
		    	}
		    	else {
		    		$('#freeship').attr('class', 'fa fa-check');
		    		help_text = 'Đơn hàng đã đủ điều kiện Freeship';
		   		}
		   		$('#progress-bar').attr('style', 'width: '+ (total / 500000 * 100) +'%');
		   		$('#help-text').text(help_text);
		   		
	        },
	        error: function (error) {
		       	alert("Hệ thống đang bảo trì");
		    }
		});
	}

@endsection