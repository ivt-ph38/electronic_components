@extends('layouts.master')
@section('content')
    <p class="breadcrumbs">{!!$breadcrumbs!!}</p>

	<div class="features_items"><!--features_items-->
	<h2 class="title text-left">{{$category->name}}</h2>
	@foreach ($products as $product)                        
	    <div class="col-sm-3">
			@include('layouts.product', ['product' => $product])
		</div>
	    @endforeach                  
	</div><!--features_items-->

@endsection