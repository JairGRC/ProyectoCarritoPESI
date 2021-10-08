<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Sistema de Ventas - Grupo 10</title>

    <!-- vendor css -->
    <link href="/plantilla/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/plantilla/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="/plantilla/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="/plantilla/lib/rickshaw/rickshaw.min.css" rel="stylesheet">

    <!-- Starlight CSS -->
    <link rel="stylesheet" href="/plantilla/css/starlight.css">

    @yield('estilos')

</head>

<body style="background: white;">

    <!-- ########## START: LEFT PANEL ########## -->
    <div class="sl-logo"><a href="{{ route('home') }}"><i class="icon ion-android-star-outline"></i> EMPRESA</a></div>
    <div class="sl-sideleft">

        <label class="sidebar-label">Menú Principal</label>
        <div class="sl-sideleft-menu">
            <a href="{{ route('home') }}" class="sl-menu-link active">
                <div class="sl-menu-item">
                    <i class="fa fa-home tx-22"></i>
                    <span class="menu-item-label">Inicio</span>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->

            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fa fa-shopping-cart tx-22"></i>
                    <span class="menu-item-label">Ventas</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{route('cabeceraventa.create')}}" class="nav-link">Nueva Venta</a></li>
                <li class="nav-item"><a href="{{route('cabeceraventa.index')}}" class="nav-link">Ventas</a></li>
            </ul>

            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fa fa-tags tx-20"></i>
                    <span class="menu-item-label">Productos</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('producto.index') }}" class="nav-link">Productos</a></li>
                <li class="nav-item"><a href="{{route('categoria.index')}}" class="nav-link">Categorías</a></li>
                <li class="nav-item"><a href="{{ route('unidad.index') }}" class="nav-link">Unidades</a></li>
            </ul>

            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="fa fa-users tx-20"></i>
                    <span class="menu-item-label">Clientes</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="{{ route('cliente.index') }}" class="nav-link">Clientes</a></li>
                <li class="nav-item"><a href="{{ route('cliente.create') }}" class="nav-link">Nuevo Cliente</a></li>
            </ul>

            <a href="#" class="sl-menu-link">
                <div class="sl-menu-item">
                    <i class="icon ion-person-stalker tx-20"></i>
                    <span class="menu-item-label">Usuarios</span>
                    <i class="menu-item-arrow fa fa-angle-down"></i>
                </div><!-- menu-item -->
            </a><!-- sl-menu-link -->
            <ul class="sl-menu-sub nav flex-column">
                <li class="nav-item"><a href="#" class="nav-link">Usuarios</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Roles</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Permisos</a></li>
            </ul>

            <br>
        </div><!-- sl-sideleft -->
        <!-- ########## END: LEFT PANEL ########## -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <!-- ########## START: HEAD PANEL ########## -->
        <div class="sl-header">
            <div class="sl-header-left">
                <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
                <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
            </div><!-- sl-header-left -->
            
            <div class="sl-header-right">
                <nav class="nav">
                    <div class="dropdown">
                        <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
                            <span><i class="fa fa-user tx-20"></i> </span><span class="logged-name">{{ Auth::user()->Nombres }}<span class="hidden-md-down"> {{ Auth::user()->ApePaterno }} </span></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-header wd-200">
                            <ul class="list-unstyled user-profile-nav">
                                <li><a href="#"><i class="icon ion-ios-person-outline"></i> Editar Perfil</a></li>
                                <li><a href="{{ url('/') }}"><i class="icon ion-ios-gear-outline"></i> Panel</a></li>
                                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon ion-power"></i> Cerrar Sesión</a></li>
                            </ul>
                        </div><!-- dropdown-menu -->
                    </div><!-- dropdown -->
                </nav>
            </div><!-- sl-header-right -->
        </div><!-- sl-header -->
        <!-- ########## END: HEAD PANEL ########## -->
    </div>

    <div class="sl-mainpanel" style="background: white;">
        @yield('content')
    </div>

    <script src="/plantilla/lib/jquery/jquery.js"></script>
    <script src="/plantilla/lib/popper.js/popper.js"></script>
    <script src="/plantilla/lib/bootstrap/bootstrap.js"></script>
    <script src="/plantilla/lib/jquery-ui/jquery-ui.js"></script>
    <script src="/plantilla/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="/plantilla/lib/jquery.sparkline.bower/jquery.sparkline.min.js"></script>
    <script src="/plantilla/lib/d3/d3.js"></script>
    <script src="/plantilla/lib/rickshaw/rickshaw.min.js"></script>
    <script src="/plantilla/lib/chart.js/Chart.js"></script>
    <script src="/plantilla/lib/Flot/jquery.flot.js"></script>
    <script src="/plantilla/lib/Flot/jquery.flot.pie.js"></script>
    <script src="/plantilla/lib/Flot/jquery.flot.resize.js"></script>
    <script src="/plantilla/lib/flot-spline/jquery.flot.spline.js"></script>
    @yield('script')
    <script src="/plantilla/js/starlight.js"></script>
    <script src="/plantilla/js/ResizeSensor.js"></script>
    <script src="/plantilla/js/dashboard.js"></script>
</body>
</html>
