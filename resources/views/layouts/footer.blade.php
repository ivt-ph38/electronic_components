        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Giới Thiệu</h2>
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($bottomposts as $bottompost)
                                <li><a href="{{route('post.show', [$bottompost->slug])}}">{{$bottompost->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Chính Sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($bottompost1s as $bottompost1)
                                <li><a href="{{route('post.show', [$bottompost1->slug])}}">{{$bottompost1->title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                        <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="F0AtMMbi"></script>    
                            {!!$facebook!!}
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">HT Company</a></span></p>
                </div>
            </div>
        </div>
        