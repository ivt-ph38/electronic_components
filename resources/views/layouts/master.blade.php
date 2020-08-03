<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang chủ | TH SHOP</title>
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/price-range.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/carousel.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="#">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <header id="header"><!--header-->      
        @include('layouts.header')
    </header><!--/header-->  
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('layouts.sidebar')
                </div>
                <div class="col-sm-9 padding-right">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        @include('layouts.footer')
    </footer><!--/Footer-->
    
  
    <script src="{{ URL::asset('js/jquery.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ URL::asset('js/price-range.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
    <script src="{{ URL::asset('js/typeahead.bundle.min.js') }}"></script>
    <script type="text/javascript">@yield('js')</script>  

    <!--/Search-->
    <script type="text/javascript">
        $(document).ready(function($) {
            var engine = new Bloodhound({
                remote: {
                    url: "{{url('api/products/search')}}" + '/%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#search").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, [
                {
                    source: engine.ttAdapter(),
                    name: 'products',
                    display: function(data) {
                        return data;
                    },
                    limit: 8,
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown"></div><a class="list-group-item tt-suggestion tt-selectable">Không tìm thấy sản phẩm</a>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown"></div>'
                        ],
                        suggestion: function (data) {
                            return '<a href="/products/' + data.id + '" class="list-group-item"><img src="'+ data.image +'">&nbsp&nbsp' + data.name + '</a>';
                        }
                    }
                } 
            ]);
        });
    </script>
</body>
</html>