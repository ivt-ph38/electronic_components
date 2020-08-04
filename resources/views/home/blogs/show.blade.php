@extends('layouts.master')
@section('content')
<p class="breadcrumbs"><a href="">Trang chủ</a> / {{ $blog->title }} </p>
<div class="row">
	<div class="col-lg-12 text-center">
		<h1 class="text-uppercase text-title mt-5 mb-4 pb-2 h4">{{ $blog->title }}</h1>
	</div>
	<div class="col-lg-12">
		<p>{!! $blog->content !!}</p>
		<hr class="mt-0 mb-0">
	</div>
</div>
@endsection