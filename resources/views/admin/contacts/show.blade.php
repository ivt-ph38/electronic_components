@extends('layouts.admin.admin')
@section('content')
<section class="content-header mb-3">
	<h1>
		<i class="fa fa-list" aria-hidden="true"></i> {{ __('Chi Tiết Liên Hệ') }}
	</h1>
</section>
<div class="card bg-light">
	<div class="card-body border-top border-primary">
		<div class="row">
			<div class="col-lg-6">
				<dl class="row">
					<dt class="col-lg-3">{{ __('ID') }}</dt>
					<dd class="col-lg-9">{{ $contact->id }}</dd>
					<dt class="col-lg-3">{{ __('Tiêu Đề') }}</dt>
					<dd class="col-lg-9">{{ $contact->title }}</dd>
					<dt class="col-lg-3">{{ __('Họ Tên') }}</dt>
					<dd class="col-lg-9">{{ $contact->name }}</dd>
					<dt class="col-lg-3">{{ __('Email') }}</dt>
					<dd class="col-lg-9">{{ $contact->email }}</dd>
				</dl>
			</div>
			<div class="col-lg-6">
				<dl class="row">
					<dt class="col-lg-3">{{ __('Địa Chỉ') }}</dt>
					<dd class="col-lg-9">{{ $contact->address }}</dd>
					<dt class="col-lg-3">{{ __('Số Điện Thoại') }}</dt>
					<dd class="col-lg-9">{{ $contact->phone }}</dd>
					<dt class="col-lg-3">{{ __('Ngày Gửi') }}</dt>
					<dd class="col-lg-9">{{ $contact->created_at->format('d-m-Y H:i:s') }}</dd>
				</dl>
			</div>
		</div>
	</div>
</div>
<div class="card mt-3 bg-light">
	<div class="card-body border-top border-success">
		<p>
			<strong>
				{{ __('Nội Dung Liên Hệ') }}
			</strong>
		</p>
		{{ $contact->content }}
	</div>
</div>
<hr>
@endsection