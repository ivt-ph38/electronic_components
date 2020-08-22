        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-md-1 col-sm-2 hidden-xs">
                        <div class="logo">
                            <a href="{{ route('welcome') }}"><img src="{{url('/images/logo.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-5 col-xs-6">
                        <div class="search_box">
                            <input id='search' name="search" type="text" placeholder="Tìm kiếm sản phẩm trên HTSHOP..."/>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-6">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> GIỎ HÀNG (<span id="cart_count">{{Cart::count()}}</span>)</a></li>
                            @if (Auth::check()) 
                            <li>
                                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true"></i> {{ __('Đăng Xuất') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            @else
                            <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> ĐĂNG NHẬP</a></li>
                            @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ route('welcome') }}">TRANG CHỦ</a></li>
                                <li><a href="{{ route('all.product') }}">SẢN PHẨM</a></li>
                                <li><a href="{{ route('blog.show') }}">BLOG</a></li>
                                <li><a href="{{ route('contacts.create') }}">LIÊN HỆ</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> {{ $hotline }}</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> {{ $email }}</a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->