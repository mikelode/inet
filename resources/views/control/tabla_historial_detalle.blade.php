
<table class="table" style="font-size: 15px; font-weight: bold;">
    <tbody>
        @if($msgId == 500)
        <tr>
            <td class="bg-warning" colspan="2"> {{ $msg }} </td>
        </tr>
        @else
        <tr class="table-info">
            <td align="center"> {{ $historial[0]->COD_PERSONA }} </td>
            <td align="center"> {{ $historial[0]->NOMBRES . ' ' . $historial[0]->AP_PATERNO . ' ' . $historial[0]->AP_MATERNO }} </td>
        </tr>
        @endif
    </tbody>
</table>

<table id="tblHistlaboral" class="table table-sm">
    <thead>
    <tr>
        <th>N°</th>
        <th>PERIODO</th>
        <th>PROYECTO</th>
        <th>PLANILLA</th>
        <th>CARGO</th>
        <th>INGRESO</th>
    </tr>
    </thead>
    <tbody>
    @if($msgId == 500)
        <tr>
            <td colspan="7">
                {{ $msg }}
            </td>
        </tr>
    @else
        @foreach($historial as $i => $hist)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td> {{ $hist->COD_PERIODO }} </td>
                <td>{{ $hist->DES_PROYECTO }}</td>
                <td>{{ $hist->DES_PLANILLA }}</td>
                <td>{{ $hist->DESCRIPCION }}</td>
                <td>{{ number_format($hist->IMPORTE,2,'.',',') }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>

<script type="text/javascript">

    $('#tblHistlaboral').DataTable({
        "language":{
            "url": "plugins/datatables/Spanish.json"
        }
    });

</script>