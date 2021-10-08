<header id="header">

    <div id="trueHeader">

        <div class="wrapper">
            
            <div class="container">
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ url('/') }}"> 
                        <img src="img/logo.png" style="width: 32%; margin-top:8px"> 
                    </a>
                </div>

                <!-- Menu -->
                <div class="menu_main">
                    <div class="navbar yamm navbar-default">
                        <div class="container">
                            <div class="navbar-header">
                                <div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"> <span>Menu</span>
                                    <button type="button"> <i class="fa fa-bars"></i></button>
                                </div>
                            </div>
                            <div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">
                                <nav>
                                    <ul class="nav navbar-nav">
                                        <li class="dropdown"> <a href="{{ url('/') }}" class="dropdown-toggle"> INICIO</a></li>
                                        <li class="dropdown"> <a href="{{ route('acercade') }}" class="dropdown-toggle"> ACERCA DE</a></li>

                                        @guest
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="{{ route('login') }}">{{ __('INICIAR SESIÓN') }}</a>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="{{ route('register') }}">{{ __('REGISTRATE') }}</a>
                                        </li>

                                        @if (Route::has('register'))
                                        <li class="dropdown">
                                            
                                        </li>
                                        @endif
                                        @else
                                        <li class="dropdown">
                                            <a class="dropdown-toggle" href="{{ route('home') }}">{{ __('MENÚ PRINCIPAL') }}</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-toggle" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('CERRAR SESIÓN') }}
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                        @endguest
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end menu -->
            </div>
        </div>
    </div>
</header>
