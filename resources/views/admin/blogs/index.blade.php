@extends('layouts.admin.admin')

@section('content')


<section class="content-header mb-3 border-bottom border-primary">

	<h1>

		<i class="fas fa-list-alt"></i> {{ __('Danh Sách Tin Tức') }}

	</h1>

</section>

{{-- {{ Form::open(['route' => ['admin.blogs.destroy'], 'method' => 'post']) }}

<a class="btn btn-success" href="{{ route('admin.blogs.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm Tin Tức') }}</a>

{{ Form::button('<i class="far fa-check-square"></i> Xóa Đã Chọn Hoặc Cập Nhật STT, Giá', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Bạn muốn xóa sản phẩm đã chọn hoặc cập nhật STT, Giá?')"]) }} --}}

<hr>

<script src="{{asset('js/jquery.priceformat.min.js')}}"></script>

<div class="table-responsive">
	
	<a class="btn btn-success" href="{{ route('admin.blogs.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm Tin Tức') }}</a>	

	<table class="table table-striped table-bordered mt-3" id="example">

		<thead>

			<tr class="bg-success text-white">

				<th><input type="checkbox" id="select_all" /></th>

				<th>{{ __('ID') }}</th>

				<th>{{ __('Tiêu Đề') }}</th>

				<th>{{ __('Hình Đại Diện') }}</th>

				<th>{{ __('Hành Động') }}</th>

			</tr>

		</thead>

		<tbody>

			@foreach($blogs as $blog)

			<tr>

				<td><input type="checkbox" class="checkbox" name="check[]" value="{{ $blog->id }}" class="checkbox-table"></td>

				<td>{{ $blog->id }}</td>

				<td>{{ $blog->title }}</td>

				<td>

					@php

					$path = $_SERVER['SERVER_NAME'].'/images/';

					$image = str_replace($path, $_SERVER['SERVER_NAME'].'/thumbs/', $blog->image);

					@endphp

					<img src="{{ $image }}" class="table-img" alt="{{ $blog->title }}">

				</td>

				<td class="actions">	

					<a href="{{ route('admin.blogs.edit', [$blog->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="far fa-edit">Chỉnh Sửa</i></a>

					{{-- @php

					$messagedel = 'Bạn muốn xóa sản phẩm '.$blog->name;

					@endphp --}}

					{{-- {{ Form::button('<i class="far fa-times-circle"></i>', ['type' => 'submit', 'class' => 'btn btn-danger','name' => 'delete', 'value' => $blog->id, 'onclick' => "return confirm('$messagedel')"]) }}

 --}}			<form action="{{ route('admin.blogs.delete', [$blog->id]) }}" method="POST" role="form">							@method('DELETE')
 					 @csrf
 					 <button type="submit" class="btn btn-danger"><i class="fad fa-trash" onclick="return confirm('Bạn có chắc muốn xóa '.$blog->name)">Xoá</i></button>
				</form>

				</td>

			</tr>

			@endforeach

		</tbody>

		<script type="text/javascript">

			//select all checkboxes

			$("#select_all").change(function(){  //"select all" change

				$(".checkbox").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status

			});

			//".checkbox" change

			$('.checkbox').change(function(){

				//uncheck "select all", if one of the listed checkbox item is unchecked

				if(false == $(this).prop("checked")){ //if this item is unchecked

				$("#select_all").prop('checked', false); //change "select all" checked status to false

			}

			//check "select all" if all checkbox items are checked

			if ($('.checkbox:checked').length == $('.checkbox').length ){

				$("#select_all").prop('checked', true);

			}

		});

		</script>

	</table>

</div>

<hr>

<a class="btn btn-success" href="{{ route('admin.blogs.create') }}"><i class="fas fa-plus-circle"></i> {{ __('Thêm Tin Tức') }}</a>

{{-- {{ Form::button('<i class="far fa-check-square"></i> Xóa Đã Chọn Hoặc Cập Nhật STT, Giá', ['type' => 'submit', 'class' => 'btn btn-danger', 'onclick' => "return confirm('Bạn muốn xóa sản phẩm đã chọn hoặc cập nhật STT, Giá?')"]) }}

{{ Form::close() }} --}}

@endsection