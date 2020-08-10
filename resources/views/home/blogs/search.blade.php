@extends('layouts.master')
@section('content')
<p class="breadcrumbs"><a href="">Trang chủ</a> / Blogs </p>
<div class="row">
	@foreach($blogs as $blog)
	<div class="col-lg-4 card-blog">
	<div class="card">
  		<a href="{{ route('blog.show.by.id', [$blog->slug]) }}"><img class="card-img-top" src="{{ $blog->image }}" alt="Card image cap"></a>
  			<div class="card-body">
    			<h5 class="card-title"><b><a href="{{ route('blog.show.by.id', [$blog->slug]) }}">{{ $blog->title }}</a></b></h5>
   				 <p class="card-text">{{ $blog->description }}</p>
    			<a href="{{ route('blog.show.by.id', [$blog->slug]) }}" class="btn btn-primary">Xem Thêm</a>
  			</div>
	</div>	
	</div>
	@endforeach	
</div>
@endsection