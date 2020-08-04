        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="logo pull-left">
                            <a href="{{ route('welcome') }}"><img src="images/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="search_box">
                            <input id='search' name="search" type="text" placeholder="Tìm kiếm sản phẩm trên HTSHOP..."/>
                        </div>
                    </div> 
                    <div class="col-sm-3">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/cart')}}"><i class="fa fa-shopping-cart"></i> GIỎ HÀNG (13)</a></li>
                                <li><a href="login.html"><i class="fa fa-lock"></i> TÀI KHOẢN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom sticky-top"><!--header-bottom-->
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
                                <li><a href="index.html">SẢN PHẨM</a></li>
                                <li><a href="{{ route('blog.show') }}">BLOG</a></li>
                                <li><a href="contact-us.html">LIÊN HỆ</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i> +84965389902</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> linhkiendientu.th@gmail.com</a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->