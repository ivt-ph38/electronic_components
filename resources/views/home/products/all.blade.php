@extends('layouts.master')
@section('content')
    <p class="breadcrumbs"><a href="{{ route('welcome') }}">Trang Chủ</a> / Sản Phẩm</p>

	<div class="features_items"><!--features_items-->
	<h2 class="title text-left">Sản Phẩm</h2>

	<div class="row filter">
		<div class="col-sm-3"><i class="fa fa-filter" aria-hidden="true"></i> Hiện thị: 
			<select name="groupby" id="groupby">
				<option value="all">Tất cả</option>
				<option value="on_sale" <?php if(isset($filter['groupby']) && $filter['groupby'] == 'on_sale')  {echo 'selected';} ?> >Giảm giá</option>
				<option value="available" <?php if(isset($filter['groupby']) && $filter['groupby'] == 'available')  {echo 'selected';} ?>>Còn hàng</option>
			</select>
		</div>
		<div class="col-sm-3 pull-right">Sắp xếp: 
			<select name="orderby" id="orderby">
				<option value="new">Mới nhất</option>
				<option value="price-asc" <?php if(isset($filter['orderby']) && $filter['orderby'] == 'price-asc')  {echo 'selected';} ?>>Giá thấp</option>
				<option value="price-desc" <?php if(isset($filter['orderby']) && $filter['orderby'] == 'price-desc')  {echo 'selected';} ?>>Giá cao</option>
			</select>
		</div>
	</div>

	@foreach ($products as $product)                        
	    <div class="col-sm-3">
			@include('layouts.product', ['product' => $product])
		</div>
	@endforeach                  
	</div><!--features_items-->
	<h4>{{ $products->links() }}</h4>

@endsection