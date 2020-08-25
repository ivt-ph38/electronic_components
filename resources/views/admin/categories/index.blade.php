  
@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Danh Sách danh mục') }}
	</h1>
</section>

<hr>
<div class="table-responsive">
	<a class="btn btn-success" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm danh mục') }}</a>
	<hr>	
    <!-- Hiển thị thông báo -->
	<div class="flash-message">
	    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	      @if(Session::has('alert-' . $msg))

	      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	      @endif
	    @endforeach
	</div> <!-- end .flash-message -->
	<table class="table table-striped table-bordered mt-3" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('ID') }}</th>
				<th>{{ __('Tên danh mục') }}</th>
				<th>Sản phẩm</th>
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

<a class="btn btn-success" href="{{ route('admin.categories.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm danh mục') }}</a>

@endsection