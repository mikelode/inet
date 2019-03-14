<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Symva') }}</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('/plugins/fullcalendar-3.9.0/fullcalendar.min.css') }}" type="text/css">
    
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
        <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-5.0.7/css/fontawesome-all.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css" />
        <link rel="stylesheet" href="{{ asset('/plugins/jquery-ui/jquery-ui.min.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('/plugins/jqueryui-editable/css/jqueryui-editable.css') }}" type="text/css">
        <link rel="stylesheet" href="{{ asset('/plugins/summernote/dist/summernote-bs4.css') }}" type="text/css">
    
    
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
    
    </head>

<body>
    <div class="container" style="min-height: calc(100vh - 35px);">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#">
                        <img src="{{ asset("img/logo_quello.png") }}" width="30" height="30" class="d-inline-block align-top" alt="">
                        MUNICIPALIDAD DISTRITAL DE QUELLOUNO
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collpase navbar-collapse" id="navbarNavDropdown">
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
                </nav>
            </div>
        </div>
        <div class="row" id="main">
            <div class="col-md-12">
                @yield('main-content')
            </div>
        </div>
    </div>
    @include('partials.footer')
        @include('partials.scripts') @yield('custom-scripts')
</body>

</html>