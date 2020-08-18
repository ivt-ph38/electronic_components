        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                        <div class="logo">
                            <a href="{{ route('welcome') }}"><img src="{{url('/images/logo.png')}}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-sm-5 col-xs-12">
                        <div class="search_box">
                            <input id='search' name="search" type="text" placeholder="Tìm kiếm sản phẩm trên HTSHOP..."/>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> GIỎ HÀNG (<span id="cart_count">{{Cart::count()}}</span>)</a></li>
                                <li><a href="{{route('login')}}"><i class="fa fa-lock"></i> TÀI KHOẢN</a></li>
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