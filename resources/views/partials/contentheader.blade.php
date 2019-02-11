<div id="loading-screen" style="display:none; position: absolute;">
  {{--<img src="{{ asset('img/gear.svg') }}">--}}
  <p class="text-info">Cargando...</p>
</div>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="height: 32px; font-size: 12px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : null }}">
                    <a class="nav-link" href="{{ url('/') }}">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('directorio') ? 'active' : null }}" href="{{ url('directorio') }}">Directorio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Organigrama</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" id="navbarServices" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Servicios</a>
                    <div class="dropdown-menu" aria-labelledby="navbarServices">
                        <a href="{{ url('service/travelsheet') }}" class="dropdown-item">Hoja de viaje</a>
                    </div>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                </li>
                <li class="nav-item">
                    {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('custom/*') ? 'active' : null }}" role="button" id="navbarCustom" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                        Configurar
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarCustom">
                        @can('custom-persona')
                        <a href="{{ url('custom/personas') }}" class="dropdown-item">Personas</a>
                        @endcan
                        @can('custom-entidad')
                        <a href="{{ url('custom/entidades') }}" class="dropdown-item">Entidades</a>
                        @endcan
                        @can('custom-obra')
                        <a href="{{ url('custom/obras') }}" class="dropdown-item">Obras</a>
                        @endcan
                        @can('custom-evento')
                        <a href="{{ url('custom/eventos') }}" class="dropdown-item">Eventos</a>
                        @endcan
                        <a href="{{ url('custom/usuarios') }}" class="dropdown-item">Usuarios</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarUser" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarUser">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
