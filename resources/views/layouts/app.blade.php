<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--<![endif]-->
<head>
    <title>Sistema de Ventas - Grupo 10</title>
    <meta charset="utf-8">
    <!-- Meta -->
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="description" content="">

    <!-- this styles only adds some repairs on idevices  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/icono.png') }}">

    <!-- Google fonts - witch you want to use - (rest you can just remove) -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

    <!--[if lt IE 9]>
<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

    <!-- ######### CSS STYLES ######### -->

    <link rel="stylesheet" href="/layout/css/reset.css" type="text/css">
    <link rel="stylesheet" href="/layout/css/style.css" type="text/css">
    <link rel="stylesheet" href="/layout/css/font-awesome/css/font-awesome.min.css">

    <!-- responsive devices styles -->
    <link rel="stylesheet" media="screen" href="/layout/css/responsive-leyouts.css" type="text/css">

    <!-- mega menu -->
    <link href="/layout/js/mainmenu/sticky.css" rel="stylesheet">
    <link href="/layout/js/mainmenu/bootstrap.min.css" rel="stylesheet">
    <link href="/layout/js/mainmenu/demo.css" rel="stylesheet">
    <link href="/layout/js/mainmenu/menu.css" rel="stylesheet">

    <!-- revolution slider -->

    <!-- CSS STYLE-->
    <link rel="stylesheet" type="text/css" href="/layout/js/revolutionslider/css/style.css" media="screen">


    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="/layout/js/revolutionslider/rs-plugin/css/settings.css" media="screen">

    <!-- simple line icons -->
    <link rel="stylesheet" type="text/css" href="/layout/css/Simple-Line-Icons-Webfont/simple-line-icons.css" media="screen">

    <!-- flexslider -->
    <link rel="stylesheet" href="/layout/js/flexslider/flexslider.css" type="text/css" media="screen">

    <!-- Accordions -->
    <link rel="stylesheet" href="/layout/js/accordion/accordion.css" type="text/css" media="all">

    <!-- tabs -->
    <link rel="stylesheet" type="text/css" href="/layout/js/tabs/assets/css/responsive-tabs.css">
    <link rel="stylesheet" type="text/css" href="/layout/js/tabs/assets/css/responsive-tabs2.css">
    <link rel="stylesheet" type="text/css" href="/layout/js/tabs/assets/css/responsive-tabs10.css">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    @yield('estilos')

</head>

<body>
    <div class="site_wrapper">
        
        @include('layouts.menu')

        @yield('content')

        @include('layouts.footer')

    </div>
    <!--end sitewraper-->



    <!-- ######### JS FILES ######### -->
    <!-- get jQuery from the google apis -->
    <script type="text/javascript" src="/layout/js/universal/jquery.js"></script>

    <!-- style switcher -->
    <script src="/layout/js/style-switcher/jquery-1.js"></script>
    <script src="/layout/js/style-switcher/styleselector.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="/layout/js/revolutionslider/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="/layout/js/revolutionslider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="/layout/js/revolutionslider/custom1.js"></script>

    <!-- mega menu -->
    <script src="/layout/js/mainmenu/bootstrap.min.js"></script>
    <script src="/layout/js/mainmenu/customeUI.js"></script>

    <!-- sticky menu -->
    <script type="text/javascript" src="js/mainmenu/sticky.js"></script>
    <script type="text/javascript" src="js/mainmenu/modernizr.custom.75180.js"></script>

    <!-- tabs -->
    <script src="js/tabs/assets/js/responsive-tabs.min.js" type="text/javascript"></script>

    <!-- accordion -->
    <script type="text/javascript" src="js/accordion/custom.js"></script>

    <!-- scroll up -->
    <script src="js/scrolltotop/totop.js" type="text/javascript"></script>

    <!-- Flexslider -->
    <script src="js/flexslider/jquery.flexslider.js"></script>
    <script src="js/flexslider/custom.js"></script>
</body>
</html>
