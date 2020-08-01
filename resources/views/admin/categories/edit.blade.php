@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fas fa-plus-circle"></i> {{ __('Sửa danh mục') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{ route('admin.categories.update',$category->id) }}" method="POST" role="form">
<div class="row">
		<div class="col-lg-12">
			<div class="card-body border-top border-primary">
				@method('PUT')	
				@csrf		
				<div class="form-group">
					<label for="">{{ __('Tên danh mục') }}</label>
					<input type="text" name="name" class="form-control" id="" placeholder="Input field" value="{{$category->name}}">
				</div>
				<div class="form-group">
					<label for="">{{ __('Danh mục cha:') }}</label>
					<select class="form-control" name="parent_id" id="parent_id">
						@include('admin.categories.selectbox_categories', ['categories' => $categories, 'selected' => $category->parent_id, 'diff' => $category->id])
					</select>
				</div>
				<button type="submit" class="btn btn-primary">Đồng ý</button>		
			</div>
		</div>
	</div>
</div>
</form>
@endsection