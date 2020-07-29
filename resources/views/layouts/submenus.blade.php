                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="google.com">{{$parent->name}}</a>
                                        <a data-toggle="collapse" data-parent="#accordian" href="#menu-{{$parent->id}}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="menu-{{$parent->id}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach ($childs as $menu)
                                                @if(count($menu->childs))
                                                    <li>
                                                        <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a data-toggle="collapse" data-parent="#menu-{{$parent->id}}" href="#menu-{{$menu->id}}">
                                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                                    {{$menu->name}}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        @include('layouts.submenus2', ['parent' => $menu, 'childs' => $menu->childs])
                                                    </li>
                                                @else                                          
                                                    <li><a href="#">{{$menu->name}} </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>




