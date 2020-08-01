
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->                        

                            @foreach ($menus as $menu)
                                @if(count($menu->childs))
                                    @include('layouts.submenus', ['parent' => $menu, 'childs' => $menu->childs])
                                @else
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a href="{{url('/categories/'.$menu->id.'/products')}}">{{$menu->name}}</a></h4>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div><!--/category-products-->