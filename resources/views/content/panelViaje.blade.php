@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Portfolio Item Row -->
        <div class="row my-4">

            <div class="col-md-2">
                <div class="card">
                    <button type="button" class="btn btn-outline-secondary" onclick="fnGotoUrl('{{ url('travelsheet/new') }}')">
                        Nueva Hoja de Viaje <img src="{{ asset('/img/travel48.png') }}" alt="">
                    </button>
                </div>
            </div>
            <div class="col-md-10">
                <div id="contentDirectorio">
                    <table id="tblDirectorio" class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th width="5%">Nro</th>
                            <th width="8%">Código</th>
                            <th width="22%">Persona</th>
                            <th width="20%">Destino</th>
                            <th width="30%">Obra</th>
                            <th width="5%">Ver</th>
                            <th width="5%">Imprimir</th>
                            <th width="5%">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hojas as $i=>$hoja)
                            <tr>
                                <td>{{ $i+1 }}</td>
                                <td>{{ $hoja->viaId }}</td>
                                <td>{{ $hoja->titular }}</td>
                                <td>
                                    <ul>
                                    @foreach($hoja->destinos as $destino)
                                    <li>{{ $destino->placement }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <ul>
                                    @foreach($hoja->obras as $obra)
                                    <li>{{ $obra->project }}</li>
                                    @endforeach
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ url('travelsheet/show') . '/' . $hoja->viaId }}">
                                        <img src="{{ asset('/img/look24.png') }}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('hojaviaje.pdf', ['id' => $hoja->viaId]) }}" target="_blank">
                                        <img src="{{ asset('/img/print24.png') }}" alt="">
                                    </a>
                                </td>
                                <td>
                                    <img src="{{ asset('/img/delete24.png') }}" alt="">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
    <div class="modal fade" role="dialog" id="mdlAddcontact">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVO CONTACTO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('directorio/contacto') }}" id="frmAddcontact">
                        <div class="form-group row">
                            <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">Persona</label>
                            <div class="col-sm-9">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slcObra" class="col-sm-3 col-form-label lb-sm font-weight-bold">Obra</label>
                            <div class="col-sm-9">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slcEntity" class="col-sm-3 col-form-label lb-sm font-weight-bold">Entidad</label>
                            <div class="col-sm-9">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtCargo" class="col-sm-3 col-form-label lb-sm font-weight-bold">Cargo</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" placeholder="Cargo laboral" id="txtCargo" name="ntxtCargo">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtDomlegal" class="col-sm-3 col-form-label lb-sm font-weight-bold">Domicilio legal</label>
                            <div class="col-sm-9">
                                <textarea class="form-control form-control-sm" name="ntxtDomlegal" id="txtDomlegal" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtDomejec" class="col-sm-3 col-form-label lb-sm font-weight-bold">Domicilio ejecución</label>
                            <div class="col-sm-9">
                                <textarea class="form-control form-control-sm" name="ntxtDomejec" id="txtDomejec" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtEmail" class="col-sm-3 col-form-label lb-sm font-weight-bold">Correo electrónico(s)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control form-control-sm" name="ntxtEmail" id="txtEmail" cols="30" rows="2" placeholder="Separe los correos con un slash (/)"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtTelefono" class="col-sm-3 col-form-label lb-sm font-weight-bold">Teléfono(s)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" name="ntxtTelefono" id="txtTelefono" placeholder="Separe los teléfonos con un guión (-)">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fnAddContact($('#frmAddcontact'))">Guardar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-scripts')

    <script type="text/javascript">

        $('#tblDirectorio').DataTable({
            "language":{
                "url": "../plugins/datatables/Spanish.json"
            }
        });

        $('.slcSearch').select2({
            width: '100%',
            dropdownCssClass: 'slcOwnstyle'
        });
    </script>

@endsection