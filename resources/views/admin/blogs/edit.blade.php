@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>

		<i class="fas fa-plus-circle"></i> {{ __('Chỉnh Sửa Tin Tức '.$blog->title) }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" role="form">
<div class="row">
	<div class="col-lg-12">
		<div class="card-body border-top border-primary">
		@method('PUT')	
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Tin Tức') }}</label>
				<input type="text" name="title" value="{{ $blog->title }}" class="form-control" id="" placeholder="Input field">

			</div>
			<div class="form-group">
				<label for="">{{ __('Tiêu Đề Trang') }}</label>
				<input type="text" name="slug" value="{{ $blog->slug }}" class="form-control" id="" placeholder="Input field">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ $blog->description }}" class="form-control" id="" placeholder="Input field">
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
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control summernote" name="content">{{ $blog->content }}</textarea>
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
@endsection