@extends('layouts.master')
@section('content')
    				@include('layouts.slide')
                    @foreach ($res as $category)

	                    <div class="features_items"><!--features_items-->
	                        <h2 class="title text-left">{{$category->name}}<a href="">Xem thêm</a></h2>
	                        @foreach ($category->top_products as $product)                        
	                        	<div class="col-sm-3">
	                        	
	                        		@include('layouts.product', ['product' => $product])
                    			
	                       		</div>
	                       @endforeach                  
	                    </div><!--features_items-->
	
                    @endforeach

@endsection