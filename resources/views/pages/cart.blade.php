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
	        },
	        error: function (error) {
		       	alert("Hệ thống đang bảo trì");
		    }
		});
	});
@endsection