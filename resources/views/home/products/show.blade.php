@extends('layouts.master')
@section('content')
      <p class="breadcrumbs"><a href="{{ route('welcome') }}">Trang Chủ</a> /<a href="{{ route('categories.products', [$product->category_id]) }}">{{ $product->category->name }}</a>/ {{ $product->name }}</p>
      <div class="row">
        <div class="col-lg-5">
   <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{url($product->image)}}" class="img-responsive">          
            </div>
            @foreach ($product->images as $key => $image) 
            <div class="item">
                <img src="{{url($image->path)}}" class="img-responsive">
            </div>
            @endforeach 
        <!-- End Item -->
        </div>
        <!-- End Carousel Inner -->
        <div class="controls">
            <ul class="nav detail-images">
                @foreach ($product->images as $key => $image)
                <li data-target="#custom_carousel" class="<?php if($key==0){echo "active";} ?> pad" data-slide-to="<?php echo $key; ?>"><a href="#"><img src="{{url($image->path)}}"></a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <script>
      $(document).ready(function(ev){
    $('#custom_carousel').on('slide.bs.carousel', function (evt) {
      $('#custom_carousel .controls li.active').removeClass('active');
      $('#custom_carousel .controls li:eq('+$(evt.relatedTarget).index()+')').addClass('active');
    })
});
    </script>
        </div>
        <div class="col-lg-7"> 
            <h4>{{ $product->name }}</h4>
              @if($product->price != 0)
                @if (!empty($product->discount) || $product->discount != 0)
                  @php
                  $price = $product->price - ($product->discount*(($product->price) / 100));
                  @endphp
                  <h5 class="text-danger mb-0"> {{ number_format($price, 0).' đ' }} - <s class="text-secondary">{{ number_format($product->price, 0).' đ' }}</s> ( -{{ $product->discount }} % )</h5>
                @else
                <h4 class="text-danger">Giá : {{ number_format($product->price, 0).' đ' }}</h4>
                 @endif
                @endif
              <h5>Danh Mục : <a href="{{ route('categories.products', [$product->category_id]) }}">{{ $product->category->name }}</a></h5>  
          <hr>
              <p>{{ $product->description }}</p>
          <hr>
        </div>        
        <div class="col-lg-12 mt-5">
          <h2 class="text-uppercase h4">Chi Tiết Sản Phẩm</h2>
        </div>
        <div class="col-lg-12">
          <hr class="mt-0">
        </div>
        <div class="col-lg-12">
          {!! $product->detail !!}
          <hr class="mt-0 mb-0">
        </div>
      </div>
      <div class="row">
        @include('home.products.comments', ['product' => $product])
      </div>
      <div class="row">
        <div class="col-lg-12 mt-5">
          <h2 class="text-uppercase h4">Sản Phẩm Liên Quan</h2>
        </div>
        @foreach($relateds as $related)
                                <div class="col-md-3">
                                                       <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">

                                            <a href="{{ route('product.show', [$related->id])}}"><img src="{{ $related->image }}" alt="{{$related->name}}" /></a>

                                            <p>{{$related->name}}</p>
                                            <h5>
                                                @if($product->price != 0)
                                                @if (!empty($product->discount) || $product->discount != 0)
                                                  @php
                                                  $price = $product->price - ($product->discount*(($product->price) / 100));
                                                  @endphp
                                                  <h5 class="text-danger mb-0">{{ number_format($price, 0).' đ' }} - <s class="text-secondary">{{ number_format($related->price, 0).' đ' }}</s> ( -{{ $related->discount }} % )</h5>
                                                @else
                                                @php
                                                  $price = $product->price - ($product->discount*(($product->price) / 100));
                                                  @endphp
                                                  <h5 class="text-danger mb-0">{{ number_format($price, 0).' đ' }}</h5>
                                                 @endif
                                                 @endif  
                                             </h5>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{url('/cart/add-to-cart/'.$related->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
      </div>
@endsection

@section('js_file')
  <script type="text/javascript" src="{{ URL::asset('js/comments.js') }}"></script>
@endsection