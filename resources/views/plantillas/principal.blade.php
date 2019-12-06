@include('sweet::alert')<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html  lang="es">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SEDUCA</title>
 

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">



    <link rel="stylesheet" href="{!! asset('css/bootstrap.min.css') !!}">
  <link href="{!! asset('css/bootstrap-theme.css') !!}" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/themify-icons.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/flag-icon.min.css') !!}">


    <link rel="stylesheet" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/sweetalert.css') !!}">



</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel" style="background: #000000">
        <nav class="navbar navbar-expand-sm navbar-default" style="background: #000000">

            <div class="navbar-header miclase">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{ route('plantillas.principal') }}"><img src="{!! asset('img/milogo.png') !!}" ></a>
      
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse" >
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('plantillas.principal') }}"> <i class="menu-icon fa fa-home"></i>Inicio </a>
                    </li>
                    <h3 class="menu-title" style="margin-top: -20px">Configuración</h3><!-- /.menu-title -->
                    
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="font-size: 90%" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Usuario</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000000">
                            <li style="margin-top: -8px"><i class="fa fa-table"></i><a href="{{ route('usuarios.index') }}">Lista</a></li>
                            <li style="margin-top: -8px"><i class="fa fa-plus"></i><a href="{{ route('usuarios.registro') }}">Agregar</a></li>
                        </ul>
                    </li>


                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="font-size: 90%; margin-top: -8px" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-desktop"></i>Unidad</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000000">
                            <li style="margin-top: -8px"><i class="fa fa-table"></i><a href="{{ route('unidades.index') }}">Lista</a></li>
                            <li style="margin-top: -8px"><i class="fa fa-plus"></i><a href="{{ route('unidades.registro') }}">Agregar</a></li>
                        </ul>
                    </li>



                    <h3 class="menu-title" style="margin-top: -20px">Trámites</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="font-size: 90%" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-male"></i>Solicitante</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000000">
                            <li style="margin-top: -8px"><i class="fa fa-table"></i><a href="{{ route('solicitantes.index') }}">Lista</a></li>
                            <li style="margin-top: -8px"><i class="fa fa-plus"></i><a href="{{ route('solicitantes.registro') }}">Agregar</a></li>                            
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="font-size: 90%; margin-top: -8px" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-folder"></i>Folio</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000000">
                            <li style="margin-top: -8px"><i class="fa fa-table"></i><a href="{{ route('folios.index') }}">Lista</a></li>
                           
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" style="font-size: 90%; margin-top: -8px" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-paper-plane"></i>Ruta</a>
                        <ul class="sub-menu children dropdown-menu" style="background: #000000">
                            <li style="margin-top: -8px"><i class="fa fa-table"></i><a href="#">Lista</a></li>
                            <li style="margin-top: -8px"><i class="fa fa-plus"></i><a href="#">Agregar</a></li>
                        </ul>
                    </li>



                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                   <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{!! asset('img/user.png') !!}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{ route('usuarios.editarPass', 
                                ['cuenta' => Auth::user()->Cuenta]) }}"><i class="fa fa-lock"></i> Cambiar password</a>

                            <a class="nav-link" href="{{ route('usuarios.logout') }}"><i class="fa fa-power-off"></i> Salir</a>
                        </div>
                    </div>


                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

                                    



                
                                <!-- Credit Card -->
                           
                                      @yield('contenido')    
                                       


</script>


            
    </div><!-- /#right-panel -->
                                <!-- Right Panel -->                            
                     




                            <script src="{!! asset('js/jquery.min.js') !!}"></script>
                            <script src="{!! asset('js/popper.min.js') !!}"></script>

                       

                            <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
                            <script src="{!! asset('js/main.js') !!}"></script>

</body>
</html>
