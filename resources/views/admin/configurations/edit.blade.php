@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="far fa-edit"></i> {{ __('Chỉnh Sửa Cấu Hình') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.configurations.update',$configuration->id) }}" method="POST" role="form">
<div class="row">
	<div class="col-lg-12">
		<div class="card bg-light">
			<div class="card-body border-top border-success">
			@method('PUT')
			@csrf
				<div class="form-group">
					<label for="">{{ __('Tên Cấu Hình') }}</label>
					<input type="text" name="display" value="{{ $configuration->display }}" class="form-control" disabled="none">
				</div>
				<div class="form-group">
					<label for="">{{ __('Giá Trị') }}</label>
					<input type="text" name="value" value="{{ $configuration->value }}" class="form-control" id="" placeholder="Input field">
				</div>
				<button type="submit" class="btn btn-primary">Đồng ý</button>	
			</div>
		</div>
	</div>
</div>
</form>
<hr>
<a href="{!! route('admin.configurations.index') !!}" class="btn btn-info"><i class="fas fa-list-alt"></i> {{ __('Danh Sách Cấu Hình') }}</a>
@endsection