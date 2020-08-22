@extends('layouts.master')
@section('content')
<div class="row">
<div class="col-lg-6">
<form action="{{ route('contacts.store') }}" method="POST" role="form">
	@csrf
	<div class="form-group">		
		<input type="text" name="title" class="form-control" id="" placeholder="Vui lòng nhập tiêu đề">
	</div>
	<div class="form-group">
		
		<input type="text" name="name" class="form-control" id="" placeholder="Vui lòng nhập tên">
	</div>
	<div class="form-group">
		
		<input type="text" name="email" class="form-control" id="" placeholder="Vui lòng nhập email">
	</div>
	<div class="form-group">
		
		<input type="text" name="address" class="form-control" id="" placeholder="Vui lòng nhập địa chỉ">
	</div>
	<div class="form-group">
		
		<input type="text" name="phone" class="form-control" id="" placeholder="Vui lòng nhập số điện thoại">
	</div>
	<div class="form-group">
		<textarea name="content" id="input" class="form-control" rows="7" required="required"></textarea>
	</div>					
	<button type="submit" class="btn btn-primary">Gửi Liên Hệ</button>
</form>
</div>
<div class="col-lg-6 map">
	{!!$map!!}
</div>
</div>
@endsection