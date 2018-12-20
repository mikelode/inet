<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>{{ config('app.name', 'Symva') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-3.3.7/css/bootstrap.min.css') }}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <style>
        @page { margin: 0px; }
        body{
            margin: 70px;
            font-family: Tahoma, Helvetica, Arial;
            font-size: 11px;
        }
        .centrar-content-div{
            text-align: center;
        }

        .logo{
            position: absolute;
        }

        .page-header{
            margin-top: 5px;
            margin-bottom: 3px;
        }

        .panel-header{
            width: 450px;
            margin: 0 auto;
            border: 1px solid black;
        }

        .panel-header .panel-body{
            padding: 0px;
        }

        .resaltartexto{
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>

</head>
<body>
<div class="container-fluid">
    <img src="{{ asset('img/gore.png') }}" alt="" class="logo">
    <div class="page-header centrar-content-div">
        <h4>GOBIERNO REGIONAL DE PUNO</h4>
        <p>OFICINA REGIONAL DE SUPERVISION Y LIQUIDACION DE PROYECTOS</p>
        <div class="panel panel-default panel-header">
            <div class="panel-body">
                <h3 class="resaltartexto">AUTORIZACIÓN OFICIAL DE VIAJE</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            1.- NOMBRES Y APELLIDOS
            <span style="float: right;">:</span>
        </div>
        <div class="col-xs-9">
            <div class="resaltartexto">
                {{ $hojaviaje->titular }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            2.- DEPENDENCIA
            <span style="float: right;">:</span>
        </div>
        <div class="col-xs-9">
            <div class="resaltartexto">{{ $hojaviaje->entidad }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            3.- LUGAR DE VISITA
            <span style="float: right;">:</span>
        </div>
        <div class="col-xs-9">
            <div class="resaltartexto">
            @foreach($hojaviaje->destinos as $destino)
                {{ $destino->placement . ', ' }}
            @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            3.1.- OBRA
            <span style="float: right;">:</span>
        </div>
        <div class="col-xs-9">
            <div class="resaltartexto">
            @foreach($hojaviaje->obras as $obra)
                {{ $obra->project }}<br>
            @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3">
            4.- MOTIVO
            <span style="float: right;">:</span>
        </div>
        <div class="col-xs-9">
            <div class="resaltartexto">{{ $hojaviaje->viaMotivo }}</div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            5.- CRONOGRAMA DE ACTIVIDADES
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th>FECHA DESDE</th>
                    <th>FECHA HASTA</th>
                    <th>ACTIVIDAD A REALIZAR</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hojaviaje->actividades as $act)
                <tr>
                    <td>{{ $act->actStartdate }}</td>
                    <td>{{ $act->actEnddate }}</td>
                    <td>{{ $act->actDescripcion }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            6.- ESCALA DE VIÁTICOS
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th></th>
                    <th>SALIDA</th>
                    <th>RETORNO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>FECHA</td>
                    <td>{{ $hojaviaje->viaStartdate }}</td>
                    <td>{{ $hojaviaje->viaReturndate }}</td>
                </tr>
                <tr>
                    <td>HORA</td>
                    <td>{{ $hojaviaje->viaStarttime }}</td>
                    <td>{{ $hojaviaje->viaReturntime }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4">
            7.- ADELANTO DE VIATICOS: S/
        </div>
        <div class="col-xs-4">COMPONENTE:</div>
        <div class="col-xs-4">META:</div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            8.- PERSONAL QUE VIAJA
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th>NOMBRES Y APELLIDOS</th>
                    <th>DNI</th>
                    <th>FIRMA</th>
                </tr>
                </thead>
                <tbody>
                @foreach($hojaviaje->pasajeros as $psj)
                <tr>
                    <td>{{ $psj->passenger }}</td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            9.- MEDIO DE TRANSPORTE UTILIZADO:
            9.1.-
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <table class="table table-condensed table-bordered">
                <thead>
                <tr>
                    <th>CHOFER</th>
                    <th>DNI</th>
                    <th>{{ $hojaviaje->trnTipo }}</th>
                    <th>PLACA</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{ $hojaviaje->chofer }}</td>
                    <td></td>
                    <td>{{ $hojaviaje->trnMarca }}</td>
                    <td>{{ $hojaviaje->trnPlaca }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>





