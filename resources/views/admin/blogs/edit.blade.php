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
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control summernote" name="content" value="{{ $blog->content }}"></textarea>
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