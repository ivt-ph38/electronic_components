@extends('layouts.admin.admin')

@section('content')

<section class="content-header mb-3 border-bottom border-primary">

	<h1>

		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Danh Sách Tin Tức') }}

	</h1>

</section>

<hr>

<script src="{{asset('js/jquery.priceformat.min.js')}}"></script>

<div class="table-responsive">
	
	<a class="btn btn-success" href="{{ route('admin.blogs.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Thêm Tin Tức') }}</a>	

	<table class="table table-striped table-bordered mt-3" id="example">

		<thead>

			<tr class="bg-success text-white">

				<th>{{ __('ID') }}</th>

				<th>{{ __('Tiêu Đề') }}</th>

				<th>{{ __('Hình Đại Diện') }}</th>

				<th>{{ __('Hành Động') }}</th>

			</tr>

		</thead>

		<tbody>

			@foreach($blogs as $blog)

			<tr>

				<td>{{ $blog->id }}</td>

				<td>{{ $blog->title }}</td>

				<td>

					<img src="{{url($blog->image)}}" class="table-img" alt="{{ $blog->name }}">

				</td>

				<td class="actions">	

					<a href="{{ route('admin.blogs.edit', [$blog->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
					<form action="{{ route('admin.blogs.delete', [$blog->id]) }}" method="POST" role="form">								  @method('DELETE')
 					 @csrf
 					 <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn có chắc muốn xóa tin tức này.');"></i></button>
				</form>

				</td>

			</tr>

			@endforeach

		</tbody>

	</table>

</div>

<hr>

<a class="btn btn-success" href="{{ route('admin.blogs.create') }}"><i class="fa fa-plus" aria-hidden="true"></i> {{ __('Thêm Tin Tức') }}</a>

@endsection