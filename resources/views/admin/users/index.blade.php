@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3 border-bottom border-primary">
	<h1>
		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Danh Sách Thành Viên') }}
	</h1>
</section>
<form class="form-inline" action="{{route('admin.users.search')}}">
  @csrf		
  <input class="form-control form-control-sm mr-3 w-50" name="keyword" type="text" placeholder="Nhập tên hoặc email người dùng"
    aria-label="Search">
  <button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
<hr>
@include('layouts.admin.validation')
<div class="table-responsive">
	<table class="table table-striped table-bordered" id="example">
		<thead>
			<tr class="bg-success text-white">
				<th>{{ __('ID') }}</th>
				<th>{{ __('Họ Tên') }}</th>
				<th>{{ __('Email') }}</th>
				<th>{{ __('Địa Chỉ') }}</th>
				<th>{{ __('Đăng Ký Ngày') }}</th>
				<th>{{ __('Vai Trò') }}</th>
				<th>{{ __('Hành Động') }}</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->address }}</td>
				<td>{{ $user->created_at }}</td>
				<td>{{ $user->role }}</td>
				<td class="actions">
					<a href="{{ route('admin.users.edit', [$user->id]) }}" class="btn btn-secondary" title="{{ __('Chỉnh Sửa') }}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<form action="{{ route('admin.users.delete', [$user->id]) }}" method="POST" role="form">				 @method('DELETE')
 					 @csrf
 					 <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true" onclick="return confirm('Bạn có chắc muốn xóa Thành Viên Này')"></i></button>
				</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection