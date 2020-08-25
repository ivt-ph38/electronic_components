@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Chỉnh Sửa Tin Tức '.$blog->title) }}
	</h1>
</section>
@include('layouts.admin.validation')
@include('layouts.admin.add_wysiwyg')
<form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" role="form" enctype="multipart/form-data">
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
				<label for="">{{ __('Mô tả') }}</label>
				<input type="text" name="description" value="{{ $blog->description }}" class="form-control" id="" placeholder="Input field">
			</div>
			<div class="form-group">
				<label for="">{{ __('Hình Đại Diện') }}</label>
				<img class="img-thumbnail" src="{{url($blog->image)}}">
					<div class="input-group">
						<input type="text" class="form-control" value="{{$blog->image}}" placeholder="Chọn Từ Thư Viện" aria-label="Chọn Từ Thư Viện" aria-describedby="basic-addon2" id="image-gallery" name="image">
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#myModal">Chọn Ảnh</button>
						</div>
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
	<div class="col-lg-12">
	<div class="col-lg-12">
		<div class="card-body border-top border-success">
			<div class="form-group">
				<label for="">Nội dung</label>
				<textarea id="editor-ckeditor" rows="10" cols="80" name="content">{{ $blog->content }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Đồng ý</button>							
		</div>
	</div>
	</div>
	
</div>
</form>
@endsection