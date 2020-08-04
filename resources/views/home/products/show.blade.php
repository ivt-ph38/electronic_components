@extends('layouts.master')
@section('content')
      {{-- <div class="col-lg-12 mb-5">
        <h5>TH Shop/Danh Mục/Tên Sản Phẩm</h5>
      </div> --}}
      <div class="row">
        <div class="col-lg-5">
          <div id="carouselExampleIndicators" class="carousel slide product-carousel" data-ride="carousel">
            <div class="carousel-inner border">
              <div class="carousel-item active">
                <img class="d-block w-100" src="{{ $product->image }}" alt="">
              </div>
            </div>

          </div>
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
                <h4 class="text-danger">: {{ number_format($product->price, 0).' đ' }}</h4>
                 @endif
                @endif
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
@endsection