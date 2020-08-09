@extends('layouts.master')
@section('content')
<div class="row">
<div class="col-lg-6">
<form action="{{ route('contacts.store') }}" method="POST" role="form">
	@csrf
	<div class="form-group">
		<label for="">Tiêu đề</label>
		<input type="text" name="title" class="form-control" id="" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Họ Tên</label>
		<input type="text" name="name" class="form-control" id="" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" class="form-control" id="" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Địa chỉ</label>
		<input type="text" name="address" class="form-control" id="" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Số điện thoại</label>
		<input type="text" name="phone" class="form-control" id="" placeholder="Input field">
	</div>
	<div class="form-group">
		<label for="">Nội dung</label>
		<textarea name="content" id="input" class="form-control" rows="7" required="required"></textarea>
	</div>					
	<button type="submit" class="btn btn-primary">Gửi Liên Hệ</button>
</form>
</div>
<div class="col-lg-6">
	
</div>
</div>
@endsection