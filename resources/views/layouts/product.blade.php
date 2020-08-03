                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <a href="#"><img src="{{ URL::asset('images/product01.jpg') }}" alt="" /></a>
                                            <p>{{$product->name}}</p>
                                            <h5>{{number_format($product->price, 0, ',', ',')}} đ</h5>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="{{url('/cart/add-to-cart/'.$product->id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a></li>
                                    </ul>
                                </div>
                            </div>