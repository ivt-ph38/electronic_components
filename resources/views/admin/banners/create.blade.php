@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fas fa-plus-circle"></i> {{ __('Thêm banner') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.banners.store') }}" method="POST" role="form" enctype="multipart/form-data">
<div class="row">
		<div class="col-lg-12">
			<div class="card-body border-top border-primary">
				@csrf		
				<div class="form-group">
					<label for="">{{ __('Tên banner') }}</label><span class="text-danger"> *</span>
					<input type="text" name="name" class="form-control" id="" placeholder="Nhập tên banner" value="{{old('name')}}">
				</div>
				<div class="form-group">
					<label for="">{{ __('Link liên kết') }}</label><span class="text-danger"> *</span>
					<input type="text" name="link" class="form-control" id="" placeholder="Nhập link liên kết" value="{{old('link')}}">
				</div>
				<div class="form-group">
					<label for="">{{ __('Hình ảnh') }}</label><span class="text-danger"> *</span>
					<input type="file" name="image" value="" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Đồng ý</button>		
			</div>
		</div>
	</div>
</div>
</form>
@endsection