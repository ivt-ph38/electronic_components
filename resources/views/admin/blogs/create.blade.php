@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-plus"></i> {{ __('Thêm Tin Tức') }}
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
				<input type="text" name="title" value="{{ old('title') }}" class="form-control" id="" placeholder="Vui lòng nhập tiêu đề">

			</div>
			<div class="form-group">
				<label for="">{{ __('Đường Dẫn') }}</label>
				<input type="text" name="slug" value="{{ old('slug') }}" class="form-control" id="" placeholder="Vui lòng nhập đường dẫn">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ old('description') }}" class="form-control" id="" placeholder="Vui lòng nhập mô tả">
			</div>			
			<div class="form-group">
				<label for="">{{ __('Ảnh đại diện') }}</label>
				<input type="file" name="image" value="" class="form-control">
			</div>										
		</div>
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control summernote" name="content" value="">{{ old('content') }}</textarea>
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