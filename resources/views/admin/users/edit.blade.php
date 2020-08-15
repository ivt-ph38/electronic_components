@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Chỉnh Sửa Thành Viên') }}
	</h1>
</section>
@include('layouts.admin.validation')
<form action="{{route('admin.users.update',$user->id)}}" method="POST" role="form">
<div class="row">
	<div class="col-lg-12">
		<div class="card mt-3 bg-light">
			<div class="card-body border-top border-success">
				@method('PUT')
				@csrf
				<div class="form-group">
					<label for="">Họ Tên</label>
					<input type="text" name="name" value="{{$user->name}}" class="form-control" id="" placeholder="Họ Tên">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input type="text" disabled="disabled" name="email" value="{{$user->email}}" class="form-control" id="" placeholder="Email">
				</div>	
				<div class="form-group">
					<label for="">Địa Chỉ</label>
					<input type="text" name="address" value="{{$user->address}}" class="form-control" id="" placeholder="Địa Chỉ">
				</div>
				<div class="form-group">
					<label for="">Mật Khẩu</label>
					<input type="password" name="password" class="form-control" id="" placeholder="Mật Khẩu">
				</div>
				<div class="form-group">
					<label for="">Nhập Lại Mật Khẩu</label>
					<input type="password" name="password_confirmation" class="form-control" id="" placeholder="Xác Nhận Mật Khẩu">
				</div>
			    <div class="form-group">
			      <label for="role">Vai Trò</label>
			      <select class="form-control" name="role">
			        <option value="admin">admin</option>
			        <option value="user">user</option>
			      </select>
			    </div>																		
				<button type="submit" class="btn btn-primary">Đồng Ý</button>
			</div>
		</div>
	</div>
</div>
</form>
@endsection