@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fas fa-plus-circle"></i> {{ __('Thêm Sản Phẩm') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.products.store') }}" method="POST" role="form">
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Sản Phẩm') }}</label>
				<input type="text" name="name" class="form-control" id="" placeholder="Input field">
			</div>
			@if($errors->has('name'))
				<p>{{ $errors->first('name') }}</p>
			@endif
			<div class="form-group">
				<label for="">{{ __('Tiêu Đề Trang') }}</label>
				<input type="text" name="slug" class="form-control" id="" placeholder="Input field">
			</div>
			@if($errors->has('slug'))
				<p>{{ $errors->first('slug') }}</p>
			@endif			
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" class="form-control" id="" placeholder="Input field">
			</div>
			@if($errors->has('description'))
				<p>{{ $errors->first('description') }}</p>
			@endif			
			<div class="form-group">
				<label for="">{{ __('Ảnh Đại Diện') }}</label>
				<input type="text" class="form-control" placeholder="Chọn Từ Thư Viện" aria-label="Chọn Từ Thư Viện" aria-describedby="basic-addon2" id="image-gallery" name="image">
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModalava">Chọn Ảnh</button>
				</div>
			</div>
			@if($errors->has('image'))
				<p>{{ $errors->first('image') }}</p>
			@endif							
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="">{{ __('Giá Sản Phẩm') }}</label>
				<input type="price" name="price" class="form-control" id="price" placeholder="Input field">
			</div>
			@if($errors->has('price'))
				<p>{{ $errors->first('price') }}</p>
			@endif			
			<div class="form-group">
				<label for="">{{ __('Giảm Giá') }}</label>
				<input type="text" name="discount" class="form-control" id="" placeholder="Input field">
			</div>
			@if($errors->has('discount'))
				<p>{{ $errors->first('discount') }}</p>
			@endif			
			<div class="form-group">
				<label for="">{{ __('Số lượng') }}</label>
				<input type="text" name="quantity" class="form-control" id="" placeholder="Input field">
			</div>
			@if($errors->has('quantity'))
				<p>{{ $errors->first('quantity') }}</p>
			@endif						
			<div class="form-group">
				<label for="">{{ __('Danh Mục') }}</label>
				<select name="category_id" id="input" class="form-control">
					<option>{{ __('-- Danh Mục --') }}</option>
					@foreach($categories as $category)
					<option name="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>
			@if($errors->has('category_id'))
				<p>{{ $errors->first('category_id') }}</p>
			@endif			
			<div class="form-group">
				<input type="checkbox" name="status" value="">
				<label for="">{{ __('Còn hàng ') }}</label>
			</div>			
		</div>		
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control summernote" name="detail"></textarea>
					</div>
				@if($errors->has('name'))
					<p>{{ $errors->first('detail') }}</p>
				@endif				
			</div>
	</div>
<button type="submit" class="btn btn-primary">Đồng ý</button>	
</div>
</form>
<script type="text/javascript">

	$(document).ready(function() {
	$('.summernote').summernote({
		height: 500,
	});
	});
</script>	
<script src="{{asset('js/jquery.priceformat.min.js')}}"></script>
<script type="text/javascript">
	$('#price').priceFormat({
	prefix: '',
	suffix: ' VND',
	centsLimit: 0,
	thousandsSeparator: '.'
});
</script>
@endsection