@extends('layouts.base')

@section('menu-lateral')
<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Buscar...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>

            @foreach ( $menuLateral as $m1 )
              <li class="dropdown">
                @if ( count($m1['opciones'])>0)
                  <a href="{{$m1['url']}}" data-toggle="dropdown" class="dropdown-toggle">
                    <i class="fa {{$m1['icon']}}"></i>
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

        </ul>
        <!-- /#side-menu -->
    </div>
    <!-- /.sidebar-collapse -->
</nav>
@endsection

@section('content')
<div id="page-wrapper" class="contenido">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Home</div>

                <div class="panel-body">
                    You are logged in!
                </div>

            </div>
        </div>
    </div>
</div>
@endsection