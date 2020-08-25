@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-plus"></i> {{ __('Thêm Tin Tức') }}
	</h1>
</section>
@include('layouts.admin.validation')
@include('layouts.admin.add_wysiwyg')
<form action="{{ route('admin.blogs.store') }}" file="true" method="POST" role="form" enctype="multipart/form-data">
<div class="row">
	<div class="col-lg-12">
		<div class="card bg-light h-100">
		<div class="card-body border-top border-primary">
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Tin Tức') }}</label>
				<input type="text" name="title" value="{{ old('title') }}" class="form-control" id="" placeholder="Vui lòng nhập tiêu đề">
			</div>						
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control" id="" placeholder="Vui lòng nhập mô tả">
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
		</div>
		</div> 								
	</div>					
	<div class="col-lg-12 mt-5">
		<div class="card bg-light h-100">
		<div class="card-body border-top border-success">
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea id="editor-ckeditor" rows="10" cols="80" name="content">{{ old('content') }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Đồng ý</button>							
		</div>
		</div>
	</div>
</div>
</form>
@endsection