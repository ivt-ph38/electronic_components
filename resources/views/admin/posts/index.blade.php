@extends('layouts.admin.admin')

@section('content')


<section class="content-header mb-3 border-bottom border-primary">

	<h1>

		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Danh Sách Bài Viết') }}

	</h1>

</section>

<hr>

<div class="table-responsive">
	
	<a class="btn btn-success" href="{{ route('admin.posts.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Thêm Bài Viết') }}</a>	

	<table class="table table-striped table-bordered mt-3" id="example">

		<thead>

			<tr class="bg-success text-white">

				<th><input type="checkbox" id="select_all" /></th>

				<th>{{ __('ID') }}</th>

				<th>{{ __('Tiêu Đề') }}</th>

				<th>{{ __('Hiển Thị Bên Trái') }}</th>

				<th>{{ __('Hiển Thị Bên Dưới Trái') }}</th>

				<th>{{ __('Hiển Thị Bên Dưới Phải') }}</th>

				<th>{{ __('Hành Động') }}</th>

			</tr>

		</thead>

		<tbody>

			@foreach($posts as $post)

			<tr>

				<td><input type="checkbox" class="checkbox" name="check[]" value="{{ $post->id }}" class="checkbox-table"></td>

				<td>{{ $post->id }}</td>

				<td>{{ $post->title }}</td>

				<td>
					@if ($post->left == 1)
					<i class="fa fa-check"></i>
					@else
					<i class="fa fa-times"></i>
					@endif
				</td>

				<td>
					@if ($post->bottom == 1)
					<i class="fa fa-check"></i>
					@else
					<i class="fa fa-times"></i>
					@endif
				</td>

				<td>
					@if ($post->bottom1 == 1)
					<i class="fa fa-check"></i>
					@else
					<i class="fa fa-times"></i>
					@endif
				</td>

				<td class="actions">	

					<a href="{{ route('admin.posts.edit', [$post->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>

				<form action="{{ route('admin.posts.delete', [$post->id]) }}" method="POST" role="form">			 @method('DELETE')
 					 @csrf
 					 <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn có chắc muốn xóa bài viết này.')"></i></button>
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

<a class="btn btn-success" href="{{ route('admin.posts.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Thêm Bài Viết') }}</a>

@endsection