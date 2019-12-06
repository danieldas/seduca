<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="icon_profile"></i>
        <span>Usuarios</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
      <li><a class="" href="{{ route('usuarios.index') }}">Lista</a></li>
      <li><a class="" href="{{ route('usuarios.registro') }}">Agregar</a></li>
    </ul>
</li>

<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="fa fa-male"></i>
        <span>Facilitadores</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{ route('facilitadores.index') }}">Lista</a></li>
    </ul>
</li>          

<li class="sub-menu">
    <a href="javascript:;" class="">
        <i class="fa fa-graduation-cap"></i>
        <span>Capacitaciones</span>
        <span class="menu-arrow arrow_carrot-right"></span>
    </a>
    <ul class="sub">
        <li><a class="" href="{{ route('capacitaciones.index') }}">Lista</a></li>
    </ul>
</li>
