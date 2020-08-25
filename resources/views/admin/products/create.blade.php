@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-plus"></i> {{ __('Thêm Sản Phẩm') }}
	</h1>
</section>
@include('layouts.admin.validation')
@include('layouts.admin.add_wysiwyg')
<form action="{{ route('admin.products.store') }}" file="true" method="POST" role="form" enctype="multipart/form-data">
<div class="row">
	<div class="col-lg-6">
	<div class="card bg-light h-100">	
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
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Chọn Từ Thư Viện" aria-label="Chọn Từ Thư Viện" aria-describedby="basic-addon2" id="image-gallery" name="image">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#exampleModalava">Chọn Ảnh</button>
						</div>
					</div>
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
			<div class="form-group">
				<label for="">{{ __('Hình ảnh chi tiết') }}</label>
				<input type="file" class="form-control" placeholder="Chọn Từ Thư Viện" aria-label="Chọn Từ Thư Viện" aria-describedby="basic-addon2" id="image1-gallery" name="product_images[]" multiple="multiple">
			</div>
			<div class="modal" id="myModal">
				<div class="modal-dialog mw-100 w-75">
				    <div class="modal-content">
				      <div class="modal-body">
				         <iframe class="filemanager" src="{{asset('filemanager/dialog.php?type=0')}}"></iframe>
				    	</div> 
				   	</div>
				</div>
			</div> 									
		</div>
	</div>	
	</div>
	<div class="col-lg-6">
		<div class="card bg-light h-100">
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
		</div>
		</div>		
	</div>
	<div class="col-lg-12 mt-5">
		<div class="card bg-light h-100">
			<div class="card-body border-top border-success">
				<div class="form-group">
					<label for="">Nội dung</label>
					<textarea id="editor-ckeditor" rows="10" cols="80" name="detail">{{ old('detail') }}</textarea>
				</div>
			<button type="submit" class="btn btn-primary">Đồng ý</button>							
			</div>
		</div>	
	</div>	
</div>
</form>
	
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