@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="float-right">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#mdlNewperson">
                        Registrar Persona <img src="{{ asset('/img/newuser48.png') }}" alt="">
                    </button>
                </div>
            </div>
        </div>
        <!-- Portfolio Item Row -->
        <div class="row my-3">
            <div class="col-md-12">
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>Nro</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Fecha de nacimiento</th>
                        <th>Agregar a eventos</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($personas as $i=>$persona)
                        <tr id="{{ 'persona-' . $persona->perId }}">
                            <td>
                                <img src="{{ asset('/img/user24.png') }}" alt="">
                            </td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $persona->perId }}" data-name="dni" data-title="Editar DNI">{{ $persona->perDni }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $persona->perId }}" data-name="name" data-title="Editar Nombre">{{ $persona->perNombre }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $persona->perId }}" data-name="patern" data-title="Editar Apellido Paterno">{{ $persona->perPaterno }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $persona->perId }}" data-name="matern" data-title="Editar Apellido Materno">{{ $persona->perMaterno }}</a></td>
                            <td><a href="#" class="editable" data-type="combodate" data-pk="{{ $persona->perId }}" data-name="birth" data-title="Editar Fecha Nacimiento">{{ $persona->perNacimiento }}</a></td>
                            <td>
                                @if(is_null($persona->evtPerson))
                                    <a href="#" class="addToEvents"><img class="add" alt=""></a>
                                @else
                                    <img class="added" alt="">
                                @endif
                            </td>
                            <td>
                                <a href="#" class="enable"><img class="edit" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('/img/delete24.png') }}" alt=""></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="modal fade" id="mdlNewperson" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVA PERSONA</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('persona/store') }}" id="frmNewpersona">
                        <div class="form-group row">
                            <label for="txtDni" class="col-sm-3 col-form-label lb-sm font-weight-bold">DNI</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtDni" name="ntxtDni" placeholder="DNI">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtName" class="col-sm-3 col-form-label lb-sm font-weight-bold">NOMBRE</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtName" name="ntxtName" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtPaterno" class="col-sm-3 col-form-label lb-sm font-weight-bold">AP. PATERNO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtPaterno" name="ntxtPaterno" placeholder="Apellido paterno">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtMaterno" class="col-sm-3 col-form-label lb-sm font-weight-bold">AP. MATERNO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtMaterno" name="ntxtMaterno" placeholder="Apellido materno">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtBirth" class="col-sm-3 col-form-label lb-sm font-weight-bold">FEC. NACIMIENTO.</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm" id="txtBirth" name="ntxtBirth">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fnStorePersona($('#frmNewpersona'))">Guardar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-scripts')
    <script type="text/javascript">
        $('.enable').click(function(e){
            e.preventDefault();
            $(this).toggleClass('canceledit');
            $(this).closest('tr').find('.editable').editable('toggleDisabled');
        });

        $('.addToEvents').click(function(e){
            e.preventDefault();
            var ok = confirm('¿Está seguro de agregar la fecha de nacimiento de la persona como evento en el calendario laboral de la ORSyLP?');

            if(!ok){
                return;
            }

            var url = "{{ url('persona/evento') }}";
            var data = {'perKey' : $(this).closest('tr').attr('id')};

            $.post(url, data, function(response){
                alert(response.msg);
                if(response.msgId === 200){
                    window.location = response.url;
                }
            });
        });

        $('.editable').editable({
            disabled: true,
            combodate: {
                minYear: 1950,
                maxYear: 2005
            },
            url: "{{ url('persona/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });
    </script>
@endsection