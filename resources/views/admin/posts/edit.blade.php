@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Chỉnh Sửa Bài Viết "'.$post->title.'"') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.posts.update', $post->id) }}" method="POST" role="form">
<div class="row">
	<div class="col-lg-6">

		<div class="card-body border-top border-primary">
		@method('PUT')
		@csrf		
			<div class="form-group">
				<label for="">{{ __('Tên Bài Viết') }}</label>
				<input type="text" name="title" value="{{ $post->title }}" class="form-control" id="" placeholder="Nhập tên sản phẩm">
			</div>	
			<div class="form-group">
				<label for="">{{ __('Đường Dẫn') }}</label>
				<input type="text" name="slug" value="{{ $post->slug }}" class="form-control" id="" placeholder="Nhập mô tả">
			</div>
			<div class="form-group">
				<label for="">{{ __('Mô Tả') }}</label>
				<input type="text" name="description" value="{{ $post->description }}" class="form-control">
			</div>										
		</div>
	</div>
	<div class="col-lg-6">
		<div class="card-body border-top border-warning">
			<div class="form-group">
				<input type="hidden" name="left" value="0">
				<input type="checkbox" name="left" value="1">
				<label for="">{{ __('Hiển Thị Bên Trái ') }}</label>
			</div>
			<div class="form-group">
				<input type="hidden" name="bottom" value="0">
				<input type="checkbox" name="bottom" value="1">
				<label for="">{{ __('Hiển Thị Bên Dưới Trái ') }}</label>
			</div>
			<div class="form-group">
				<input type="hidden" name="bottom1" value="0">
				<input type="checkbox" name="bottom1" value="1">
				<label for="">{{ __('Hiển Thị Bên Dưới Phải ') }}</label>
			</div>											
		</div>		
	</div>
	<div class="col-lg-12">
			<div class="card-body border-top border-success">
					<div class="form-group">
						<label for="">Nội dung</label>
						<textarea class="form-control summernote" name="content" value="{{ $post->content }}"></textarea>
					</div>
			<button type="submit" class="btn btn-primary">Đồng ý</button>							
			</div>
	</div>
	
</div>
</form>
@endsection