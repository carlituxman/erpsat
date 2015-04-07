<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'ERPsat')</title>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <script src="/assets/js/jquery-1.10.2.js"></script>

    {{--
    <link href="/css/app.css" rel="stylesheet">
    --}}

    {!!HTML::style('/assets/css/sb-admin.css')!!}
    {!!HTML::style('/assets/css/erpsat.css')!!}

    <!-- Fonts -->

    @yield('extra_css')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div id="wrapper">

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{Config::get('erpsat.app')}}</a>
            </div>

            <div class="collapse navbar-collapse" id="navbar-main">

                <ul class="nav navbar-nav">

                    @section('menu-superior')
                        @foreach ( $menuWeb as $m1 )
                          <li class="dropdown">
                            @if ( count($m1['opciones'])>0)
                              <a href="{{$m1['url']}}" data-toggle="dropdown" class="dropdown-toggle">
                                <i class="fa {{$m1['icon']}}" ></i>
                                {{ $m1['nom'] }}
                                <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                @foreach ( $m1['opciones'] as $m2 )
                                  @if( $m2['url']=='!' )
                                    <li class="dropdown-header"> {{$m2['nom']}} :</li>
                                    <li class="divider"></li>
                                  @elseif( $m2['url']=="-" )
                                    <li class="divider"></li>
                                  @else
                                    <li>
                                      <a href="{{$m2['url']}}">
                                        <i class="fa {{$m2['icon']}}"></i>
                                        {{$m2['nom']}}
                                      </a>
                                    </li>
                                  @endif
                                @endforeach
                              </ul>
                            @else
                              <a href="{{$m1['url']}}"> <i class="fa {{$m1['icon']}}"></i> {{$m1['nom']}} </a>
                            @endif
                          </li>
                        @endforeach
                    @show

                </ul>

                <ul class="nav navbar-nav navbar-right">

                    @section('menu-login')
                        @if (Auth::guest())
                            <li><a href="/auth/login">Login</a></li>
                            <li><a href="/auth/register">Register</a></li>
                        @else
                            <li class="dropdown">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    <i class="fa fa-user fa-fw"></i>{{ Auth::user()->nombre }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/auth/logout">Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    @show

                </ul>
            </div>
            @show

        </div>
    </nav>

    @yield('menu-lateral')

    <div class="pelota"></div>

    @yield('content')

    </div>

    <!-- Scripts -->
    <script src="/assets/js/bootstrap.min.js"></script>

    <script src="//cdn.datatables.net/1.10.5/js/jquery.dataTables.min.js"></script>
    <link href="//cdn.datatables.net/1.10.5/css/jquery.dataTables.min.css" rel="stylesheet">


    <script src="/assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/assets/js/sb-admin.js"></script>

    <script src="/assets/js/erpsat.js"></script>

    @yield('extra_js')

</body>
</html>
