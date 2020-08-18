    <section id="slider" class="hidden-sm hidden-xs"><!--slider-->
        <div>
            <div class="row">
                <div class="col-sm-12 hidden-xs hidden-sm">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $step = 0; ?>
                            @foreach ($banners as $banner)
                            <li data-target="#slider-carousel" data-slide-to="{{$step}}" 
                            @if ($step == 0) class="active" @endif
                            ></li>
                            <?php $step++; ?>
                            @endforeach
                        </ol>
                        
                        <div class="carousel-inner">
                            <?php $step = 0; ?>
                            @foreach ($banners as $banner)
                            <div class="item @if ($step == 0) active @endif">
                                <div class="col-sm-12">
                                    <a href="{{$banner->link}}" target="_blank"><img src="{{ url($banner->path) }}" class="img-responsive" alt="{{$banner->name}}" /></a>
                                </div>
                            </div>
                            <?php $step++; ?>
                            @endforeach
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->