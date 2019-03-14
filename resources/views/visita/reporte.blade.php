<h4 class="text-center">{{ $persona->perNombre . ' ' . $persona->perPaterno . ' ' . $persona->perMaterno }}</h4>
<table class="table table-striped table-inverse" style="table-layout: fixed;" width="100%">
    <thead class="thead-inverse">
        <tr>
            <th width="5%">Nro</th>
            <th width="10%">Fecha</th>
            <th width="60%">Descripción</th>
            <th width="25%">Nota</th>
        </tr>
        </thead>
        <tbody>
            @foreach($visita->detalle as $i => $detalle)
            <tr>
                <td scope="row">{{ $i + 1 }}</td>
                <td> {{ $detalle->dvtFecha }} </td>
                <td> {{ $detalle->dvtDesc }} </td>
                <td> {{ $detalle->dvtNota }} </td>
            </tr>
            @endforeach
        </tbody>
</table>