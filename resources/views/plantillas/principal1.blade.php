<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>Educ@tic Bolivia</title>

  <!-- Bootstrap CSS -->
  <link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="{!! asset('css/bootstrap-theme.css') !!}" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="{!! asset('css/elegant-icons-style.css') !!}" rel="stylesheet" />
  <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet" />
  <!-- Custom styles -->
  
  <link href="{!! asset('css/style.css') !!}" rel="stylesheet">
  
  <link href="{!! asset('css/style-responsive.css') !!}" rel="stylesheet" />



</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="#" class="logo">Educ@<span class="lite">tic</span>
      
      </a>
      <!--logo end-->      

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          <!-- task notificatoin start -->
          <!-- alert notification end-->
          <!-- user login dropdown start-->                   

          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
            <a class="" href="#">
                          <i class="icon_house_alt"></i>
                          <span>Inicio</span>
                      </a>
          </li>




<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="fa fa-list"></i>
        <span>Minerales</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{ route('minerales.index') }}">Lista</a></li>
    </ul>
</li>          
<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="fa fa-institution"></i>
        <span>Empresas Compra</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{ route('empresacompras.index') }}">Lista</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="fa fa-graduation-cap"></i>
        <span>Empresas Venta</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{ route('empresaventas.index') }}">Lista</a></li>
    </ul>
</li>
<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="fa fa-graduation-cap"></i>
        <span>Compras</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{ route('compras.index') }}">Lista</a></li>
    </ul>
</li>

         

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        
         @yield('contenido')    
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          &#169 Copyright Daniel Ojalvo Canedo &nbsp &nbsp
          <br><br>
      </div>
    </div>
  </section>
  <!-- container section end -->

  <!-- javascripts -->
  <script src="{!! asset('js/jquery.js') !!}"></script>

  <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

  <script src="{!! asset('js/jquery.nicescroll.js') !!}" type="text/javascript"></script>
  <script src="{!! asset('js/scripts.js') !!}"></script>


</body>

</html>
