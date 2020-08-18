@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fas fa-plus-circle"></i> {{ __('Thêm Sản Phẩm') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.products.store') }}" file="true" method="POST" role="form" enctype="multipart/form-data">
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Sản Phẩm') }}</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Nhập tên sản phẩm">
			</div>	
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control" id="" placeholder="Nhập mô tả">
			</div>
			<div class="form-group">
				<label for="">{{ __('Ảnh đại diện') }}</label>
				<input type="file" name="image" value="" class="form-control">
			</div>					
			<div class="form-group">
				<label for="">{{ __('Hình ảnh chi tiết') }}</label>
				<input type="file" name="product_images[]" value="" class="form-control" multiple="multiple">						
			</div>						
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="">{{ __('Giá Sản Phẩm') }}</label>
				<input type="price" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Nhập giá sản phẩm">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Giảm Giá') }}</label>
				<input type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="" placeholder="Nhập giảm giá">
			</div>		
			<div class="form-group">
				<label for="">{{ __('Số lượng') }}</label>
				<input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="" placeholder="Nhập số lượng sản phẩm">
			</div>						
			<div class="form-group">
				<label for="">{{ __('Danh Mục') }}</label>
				<select name="category_id" id="input" class="form-control">
					@include('admin.categories.selectbox_categories', ['categories' => $categories, 'selected' => 0, 'diff' => null])

				</select>
			</div>			
			<div class="form-group">
				<input type="hidden" name="status" value="0">
				<input type="checkbox" name="status" value="1">
				<label for="">{{ __('Còn hàng ') }}</label>
			</div>			
		</div>		
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control summernote" name="detail" value="{{ old('detail') }}"></textarea>
					</div>
			<button type="submit" class="btn btn-primary">Đồng ý</button>							
			</div>
	</div>
	
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