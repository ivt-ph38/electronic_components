  
@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fas fa-list-alt"></i> {{ __('Danh sách đơn hàng') }}
	</h1>
</section>
<div class="">
	<form action="{{url('/admin/orders/search')}}" method="GET">
		<div class="row">
			<div class="col-sm-3"><i class="fa fa-filter" aria-hidden="true"></i> ID/ Code: 
				<input type="" name="id" value="">
			</div>
			<div class="col-sm-3"></i> Tên KH: 
				<input type="" name="name">
			</div>
			<div class="col-sm-3"></i> Số điện thoại: 
				<input type="" name="phone">
			</div>
			<div class="col-sm-3">
				<button class="btn btn-primary" type="sumit"><span class="fa fa-search"></span></button>
			</div>
			
		</div>
	</form>
	<table class="table table-striped table-bordered mt-3" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('ID/ Code') }}</th>
				<th>{{ __('Ngày đặt hàng') }}</th>
				<th style="padding: 2px">
					<select name="status" id="status" class="btn btn-success btn-block">
						<option value="0" @if (isset ($status) && $status == 0) selected='selected' @endif>Trạng thái</option>
						<option value="1" @if (isset ($status) && $status == 1) selected='selected' @endif>Mới tạo</option>
						<option value="2" @if (isset ($status) && $status == 2) selected='selected' @endif>Giao hàng</option>
						<option value="3" @if ( isset ($status) && $status == 3) selected='selected' @endif>Đã giao</option>
						<option value="3" @if (isset ($status) && $status == 4) selected='selected' @endif>Hủy</option>
					</select>
				</th>
				<th>{{ __('Người đặt hàng') }}</th>
				<th>{{ __('Số điện thoại') }}</th>
				<th>{{ __('Giá trị') }}</th>
				<th colspan="2">{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($orders as $order)
			<tr>
				<th>{{$order->id}}/ {{$order->code}}</th>
				<th>{{date_format($order->created_at, 'd/m/Y H:i:s')}}</th>
				<th>
					@if ($order->status == 1)<span class="btn btn-primary">Mới tạo</span>@endif
					@if ($order->status == 2)<span class="btn btn-warning">Giao hàng</span>@endif
					@if ($order->status == 3)<span class="btn btn-success">Đã giao</span>@endif
					@if ($order->status == 4)<span class="btn btn-danger">Hủy</span>@endif					
				</th>
				<th>{{$order->name}}</th>
				<th>{{$order->phone}}</th>
				<th>{{number_format($order->total,0,"",",")}}</th>
				<th>
					<a class="btn" href="{{url('/order/'.$order->code)}}"><span class="fa fa-eye"></span></a>
					<a class="btn" href="{{url('/admin/orders/edit/'.$order->id)}}"><span class="fa fa-pencil"></span></a>
					<a class="btn"><span class="fa fa-trash-o"></span></a>
				</th>
			</tr>
			@empty
			<tr>
				<td colspan="7">Không tìm thấy</td>
			</tr>
			@endforelse
		</tbody>
	</table>
</div>

<hr>

<h4> {{ $orders->links() }}</h4>
@endsection

@section('js')
	$( document ).ready(function() {
		function filter () {
			var status = $( "#status" ).val();
			location.href = "{{url('/admin/orders/status/')}}" + '/' + status;
		}

		$( "#status" ).change(function() {
    		filter();
		});
	});

@endsection