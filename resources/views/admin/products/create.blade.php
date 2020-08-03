@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fas fa-plus-circle"></i> {{ __('Thêm Sản Phẩm') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.products.store') }}" file="true" method="POST" role="form">
<div class="row">
	<div class="col-lg-6">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Sản Phẩm') }}</label>
				<input type="text" name="name" value="{{ old('name') }}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">{{ __('Tiêu Đề Trang') }}</label>
				<input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="" placeholder="Input field">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control" id="" placeholder="Input field">
			</div>						
{{-- 			<div class="form-group">
				<label for="">{{ __('Hình đại diện') }}</label>
				  <div class="custom-file">
				    <input type="file" class="custom-file-input" value="{{$image->getFilename()}}" id="customFile" name="image">
				    <label class="custom-file-label" for="customFile">Choose file</label>
				  </div>
				<script>
				// Add the following code if you want the name of the file appear on select
				$(".custom-file-input").on("change", function() {
				  var fileName = $(this).val().split("\\").pop();
				  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
				});
				</script>	
			</div> --}}
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