@extends('layouts.master')
@section('content')
                    @include('layouts.slide')
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-left">TÊN DANH MỤC</h2>                        
                        <div class="col-sm-4">
                        	@include('layouts.product')
                       </div>                      
                    </div><!--features_items-->
@endsection