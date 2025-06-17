<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
        <a class="nav-link"  style="font-size: 16px;  background-color: #1783db">
                <i class=" fas fa-tree" style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Ecoturismo Ixtepeji</span>
            </a>
        
    <a class="nav-link" href="/home" style="font-size: 16px;  background-color: #1783db">
        <i class=" fas fa-building" style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Inicio</span>
    </a>

    @can('ver-usuario')
    <a class="nav-link" href="/usuarios" style="font-size: 16px;  background-color: #1783db">
        <i class=" fas fa-users"  style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; " >Usuarios</span>
    </a>
    @endcan

    @can('ver-rol')
    <a class="nav-link" href="/roles" style="font-size: 16px; background-color: #1783db">
        <i class=" fas fa-user-lock" style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Roles</span>
    </a>
    @endcan

    @can('editar-cabana')
    <a class="nav-link" href="/cabanas" style="font-size: 16px;  background-color: #1783db">
        <i class=" fas fa-home" style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Cabañas</span>
    </a>
    @endcan

    <a class="nav-link" href="{{ route('vercabanas') }}"  style="font-size: 16px;  background-color: #1783db">
        <i class="fas fa-home"  style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Ver Cabañas</span>
    </a>
    
    @can('ver-ofrece')
    <a class="nav-link" href="/ofreces" style="font-size: 16px;  background-color: #1783db" >
        <i class="fas fa-campground" style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Actividades</span>
    </a>
    @endcan

    @can('ver-reservacion')
    <a class="nav-link" href="/controls" style="font-size: 16px;  background-color: #1783db">
        <i class="far fa-calendar-check"  style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Reservar Cabaña</span>
    </a>
    @endcan
    @can('ver-reserva')
    <a class="nav-link" href="/reservaciones" style="font-size: 16px; background-color: #1783db">
        <i class="far fa-calendar-check"  style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Reservarvaciones</span>
    </a>
    @endcan
    
  

    @if(\Illuminate\Support\Facades\Auth::user())
        <li class="dropdown">
            <a href="#" data-toggle="dropdown"
               class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <i class="fas fa-cog" style="font-size: 20px; color:#fff"></i><span style="color:#fff; font-size: 20px; ">Opciones</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">
                 {{\Illuminate\Support\Facades\Auth::user()->name}}</div>
                <a class="dropdown-item has-icon edit-profile" href="#" data-id="{{ \Auth::id() }}">
                    <i class="fa fa-user"></i>Tus información</a>
                <a href="{{ url('logout') }}" class="dropdown-item has-icon text-danger"
                   onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();" style="font-size:16px;">
                    <i class="fas fa-door-open"></i > Cerrar sesión
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                </form>
            </div>
        </li>
    @else
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                {{--                <img alt="image" src="#" class="rounded-circle mr-1">--}}
                <div class="d-sm-none d-lg-inline-block">{{ __('messages.common.hello') }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">{{ __('messages.common.login') }}
                    / {{ __('messages.common.register') }}</div>
                <a href="{{ route('login') }}" class="dropdown-item has-icon">
                    <i class="fas fa-sign-in-alt"></i> {{ __('messages.common.login') }}
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('register') }}" class="dropdown-item has-icon">
                    <i class="fas fa-user-plus"></i> {{ __('messages.common.register') }}
                </a>
            </div>
        </li>
    @endif
    
</li>
