@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fas fa-plus-circle"></i> {{ __('Chỉnh Sửa Sản Phẩm '. $product->name) }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.products.update',$product->id) }}" method="POST" role="form">
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@method('PUT')	
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Sản Phẩm') }}</label>
				<input type="text" name="name" value="{{ $product->name }}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">{{ __('Tiêu Đề Trang') }}</label>
				<input type="text" name="slug" value="{{ $product->slug }}" class="form-control" id="" placeholder="Input field">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ $product->description }}" class="form-control" id="" placeholder="Input field">
			</div>		
			<div class="form-group">
					<label for="">{{ __('Hình đại diện') }}</label>
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Chọn Từ Thư Viện" aria-label="Chọn Từ Thư Viện" aria-describedby="basic-addon2" id="image-gallery" name="image">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModalava">Chọn Ảnh</button>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="exampleModalava" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog mw-100 w-75" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<iframe width="100%" height="550" frameborder="0" src="/filemanager/dialog.php?type=1&field_id=image-gallery&akey=xaqogz6cCYn8PS"> </iframe>
								</div>
							</div>
						</div>
					</div>
			</div>
		</div>	
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="">{{ __('Giá Sản Phẩm') }}</label>
				<input type="price" name="price" value="{{ $product->price }}" class="form-control" id="price" placeholder="Input field">
			</div>		
			<div class="form-group">
				<label for="">{{ __('Giảm Giá') }}</label>
				<input type="text" name="discount" value="{{ $product->discount }}" class="form-control" id="" placeholder="Input field">
			</div>		
			<div class="form-group">
				<label for="">{{ __('Số lượng') }}</label>
				<input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" id="" placeholder="Input field">
			</div>						
			<div class="form-group">
				<label for="">{{ __('Danh Mục') }}</label>
				<select name="category_id" id="input" class="form-control">

					<option>{{ __('-- Danh Mục --') }}</option>
				@include('admin.categories.selectbox_categories', ['categories' => $categories, 'selected' => 0, 'diff' => null])
				</select>	
			</div>			
			</div>				
			<div class="form-group">
				<input type="hidden" name="status" value="0">
				<input type="checkbox" name="status" value="1">
				<label for="status" name="status">{{ __('Còn hàng ') }}</label>
			</div>			
		</div>		
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<input class="form-control summernote" name="detail" value="{{ $product->detail }}"></input>
					</div>
					<button type="submit" class="btn btn-primary">Đồng ý</button>				
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