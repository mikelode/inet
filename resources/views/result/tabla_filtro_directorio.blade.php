<table id="tblDirectorioFind" class="table table-sm">
    <thead>
    <tr>
        <th>Nro</th>
        <th>Persona</th>
        <th>Cargo</th>
        <th>Entidad</th>
        <th>Domicilio Legal</th>
        <th>Domicilio Ejec. Contract.</th>
        <th>Correo</th>
        <th>Teléfono</th>
        <th>Obra</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($contactos as $i => $dir)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $dir->perFullName }}</td>
            <td>{{ $dir->dirCargo }}</td>
            <td>{{ $dir->entDenom }}</td>
            <td>{{ $dir->dirDirecLegal }}</td>
            <td>{{ $dir->dirDirecEjec }}</td>
            <td>{{ $dir->dirDirElect }}</td>
            <td>{{ $dir->dirTelefono }}</td>
            <td>{{ $dir->obrName }}</td>
            <td>
                <a href="#">
                    <img src="{{ asset('/img/edit24.png') }}" alt="">
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<script type="text/javascript">

    $('#tblDirectorioFind').DataTable({
        "language":{
            "url": "plugins/datatables/Spanish.json"
        }
    });

</script>