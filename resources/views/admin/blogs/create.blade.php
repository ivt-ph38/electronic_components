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
				<input type="text" name="name" value="{{ old('title') }}" class="form-control" id="" placeholder="Input field">

		<i class="fas fa-plus-circle"></i> {{ __('Thêm Tin Tức') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.blogs.store') }}" method="POST" role="form">
<div class="row">
	<div class="col-lg-12">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Tin Tức') }}</label>
				<input type="text" name="title" value="{{ old('title') }}" class="form-control" id="" placeholder="Input field">

			</div>
			<div class="form-group">
				<label for="">{{ __('Tiêu Đề Trang') }}</label>
				<input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="" placeholder="Input field">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control" id="" placeholder="Input field">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Hình đại diện') }}</label>
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" id="customFile" name="image">
				    <label class="custom-file-label" for="customFile">Choose file</label>
				  </div>
				<script>
				// Add the following code if you want the name of the file appear on select
				$(".custom-file-input").on("change", function() {
				  var fileName = $(this).val().split("\\").pop();
				  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
				});
				</script>	
			</div>								
		</div>
	</div>
<<<<<<< HEAD
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<label for="">{{ __('Giá Sản Phẩm') }}</label>
				<input type="price" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Input field">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Giảm Giá') }}</label>
				<input type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="" placeholder="Input field">
			</div>		
			<div class="form-group">
				<label for="">{{ __('Số lượng') }}</label>
				<input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="" placeholder="Input field">
			</div>						
			<div class="form-group">
				<label for="">{{ __('Danh Mục') }}</label>
				<select name="category_id" id="input" class="form-control">
					<option>{{ __('-- Danh Mục --') }}</option>
					@foreach($categories as $category)
					<option name="category_id" value="{{ $category->id }}">{{ $category->name }}</option>
					@endforeach
				</select>
			</div>			
			<div class="form-group">
				<input type="hidden" name="status" value="0">
				<input type="checkbox" name="status" value="1">
				<label for="">{{ __('Còn hàng ') }}</label>
			</div>			
		</div>		
	</div>
=======
>>>>>>> a3764a6... create blog
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
<<<<<<< HEAD
						<textarea class="form-control summernote" name="detail" value="{{ old('detail') }}"></textarea>
=======
						<textarea class="form-control summernote" name="content" value="{{ old('content') }}"></textarea>
>>>>>>> a3764a6... create blog
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