                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">

                                            <a href="{{ route('product.show', [$product->slug])}}"><img src="{{ $product->image }}" alt="{{$product->name}}" /></a>

                                            <p>{{$product->name}}</p>
                                            <h5>
                                                @if($product->price != 0)
                                                @if (!empty($product->discount) || $product->discount != 0)
                                                  @php
                                                  $price = $product->price - ($product->discount*(($product->price) / 100));
                                                  @endphp
                                                  <h5 class="text-danger mb-0">{{ number_format($price, 0).' đ' }} - <s class="text-secondary">{{ number_format($product->price, 0).' đ' }}</s> ( -{{ $product->discount }} % )</h5>
                                                @else
                                                 @endif
                                                 @endif  
                                             </h5>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></li>
                                    </ul>
                                </div>
                            </div>