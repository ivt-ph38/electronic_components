@extends('layouts.master')
@section('content')
    				@include('layouts.slide')
                    @foreach ($res as $category)

	                    <div class="features_items"><!--features_items-->
	                        <h2 class="title text-left">{{$category->name}}<a href="{{url('/categories/'.$category->id.'/products')}}">Xem thêm</a></h2>
	                        @foreach ($category->top_products as $product)                        
	                        	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
	                        		@include('layouts.product', ['product' => $product])	
	                       		</div>
	                       @endforeach                  
	                    </div><!--features_items-->
	
                    @endforeach

@endsection