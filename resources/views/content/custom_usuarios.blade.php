@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="float-right">
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#mdlNewusuario">
                        Registrar Usuario <img src="{{ asset('/img/newuser48.png') }}" alt="">
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
                        <th>ID</th>
                        <th>DNI</th>
                        <th>Nombres</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Usuario</th>
                        <th>Email</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                        <td>RESET</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($usuarios as $i=>$usu)
                        <tr id="{{ 'user-' . $usu->id }}">
                            <td>{{ $usu->id }}</td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $usu->id }}" data-name="dni" data-title="Editar DNI">{{ $usu->persona == null ? '' : $usu->persona->perDni }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $usu->id }}" data-name="name" data-title="Editar Nombre">{{ $usu->persona == null ? '' : $usu->persona->perNombre }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $usu->id }}" data-name="patern" data-title="Editar Apellido Paterno">{{ $usu->persona == null ? '' : $usu->persona->perPaterno }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $usu->id }}" data-name="matern" data-title="Editar Apellido Materno">{{ $usu->persona == null ? '' : $usu->persona->perMaterno }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $usu->id }}" data-name="username" data-title="Editar Nombre de Usuario">{{ $usu->name }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $usu->id }}" data-name="useremail" data-title="Edita Email">{{ $usu->email }}</a></td>
                            <td>
                                <a href="#" class="enable"><img class="edit" alt=""></a>
                            </td>
                            <td>
                                <a href="#"><img src="{{ asset('/img/delete24.png') }}" alt=""></a>
                            </td>
                            <td>
                                <button class="btn btn-primary btn-sm" onclick="resetClave({{ $usu->id }})">Clave</button>
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
    <div class="modal fade" id="mdlNewusuario" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVO USUARIO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('usuario/store') }}" id="frmNewusuario">
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
                            <label for="txtBirth" class="col-sm-3 col-form-label lb-sm font-weight-bold">NOM. USUARIO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtUsrname" name="ntxtUsrname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtBirth" class="col-sm-3 col-form-label lb-sm font-weight-bold">EMAIL (*)</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control form-control-sm" id="txtUsrmail" name="ntxtUsrmail">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fnStoreUsuario($('#frmNewusuario'))">Guardar</button>
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

        $('.editable').editable({
            disabled: true,
            url: "{{ url('usuario/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });

        function resetClave(id){

            var ok = confirm('¿Está seguro de reseter la clave del usuario?');

            if(!ok) return;

            $.get('../usuario/resetclave/' + id, function(response){
                alert(response.msg);
            });

        }
    </script>
@endsection