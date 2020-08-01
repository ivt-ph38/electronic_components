  
@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fas fa-list-alt"></i> {{ __('Danh Sách danh mục') }}
	</h1>
</section>

{{-- {{ Form::open(['route' => ['admin.categories.destroy'], 'method' => 'post']) }}
<a class="btn btn-success" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm danh mục') }}</a>
{{ Form::button('<i class="far fa-check-square"></i> Xóa Đã Chọn Hoặc Cập Nhật STT, Giá', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Bạn muốn xóa sản phẩm đã chọn hoặc cập nhật STT, Giá?')"]) }} --}}
<hr>
<div class="table-responsive">
	<a class="btn btn-success" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm danh mục') }}</a>	
	<table class="table table-striped table-bordered mt-3" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('ID') }}</th>
				<th>{{ __('Tên danh mục') }}</th>
				<th colspan="2">{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
				@if(count($category->childs))
					@include('admin.categories.category', ['category' => $category, 'level' => 0])
					@include('admin.categories.childs', ['categories' => $category->childs, 'level' => 0])
				@else
					@include('admin.categories.category', ['category' => $category, 'level' => 0])
				@endif
			@endforeach
		</tbody>
	</table>
</div>

<hr>

<a class="btn btn-success" onclick="return confirm('Bạn có chắc muốn xóa '.$category->name)" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm danh mục') }}</a>

{{-- {{ Form::button('<i class="far fa-check-square"></i> Xóa Đã Chọn Hoặc Cập Nhật STT, Giá', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Bạn muốn xóa sản phẩm đã chọn hoặc cập nhật STT, Giá?')"]) }}
{{ Form::close() }} --}}

@endsection