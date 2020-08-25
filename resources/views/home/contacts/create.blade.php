@extends('layouts.master')
@section('content')
<div class="row">
<div class="col-lg-6">
<form action="{{ route('contacts.store') }}" class="" method="POST" role="form">
	@csrf
	<div class="form-group">		
		<input type="text" name="title" class="form-control" id="" placeholder="Vui lòng nhập tiêu đề">
	</div>
	@if ($errors->has('title'))
		<small id="" class="form-text text-muted text-danger">* {{$errors->first('title')}}</small>
	@endif		
	<div class="form-group">
		<input type="text" name="name" class="form-control" id="" placeholder="Vui lòng nhập tên">
	</div>
	@if ($errors->has('name'))
		<small id="" class="form-text text-muted text-danger">* {{$errors->first('name')}}</small>
	@endif		
	<div class="form-group">	
		<input type="text" name="email" class="form-control" id="" placeholder="Vui lòng nhập email">
	</div>
	@if ($errors->has('email'))
		<small id="" class="form-text text-muted text-danger">* {{$errors->first('email')}}</small>
	@endif		
	<div class="form-group">
		<input type="text" name="address" class="form-control" id="" placeholder="Nhập địa chỉ">
	</div>
	@if ($errors->has('address'))
		<small id="" class="form-text text-muted text-danger">* {{$errors->first('address')}}</small>
	@endif		
	<div class="form-group">
		<input type="text" name="phone" class="form-control" id="" placeholder="Nhập số điện thoại">
	</div>
	@if ($errors->has('phone'))
		<small id="" class="form-text text-muted text-danger">* {{$errors->first('phone')}}</small>
	@endif		
	<div class="form-group">
		<textarea name="content" id="input" class="form-control" rows="7"></textarea>
	</div>
	@if ($errors->has('content'))
		<small id="" class="form-text text-muted text-danger">* {{$errors->first('content')}}</small>
	@endif							
	<button type="submit" class="btn btn-primary mt-5">Gửi Liên Hệ</button>
</form>
</div>
<div class="col-lg-6 map">
	{!!$map!!}
</div>
</div>
@endsection