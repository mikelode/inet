@extends('../app')
@section('main-content')


    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Portfolio Item Row -->
        <div class="row my-4">

            <div class="col-md-3">
                <div class="card">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#mdlAddcontact">
                        Agregar Contacto <img src="{{ asset('/img/user32.png') }}" alt="">
                    </button>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header p-0" id="searchOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#boxOne" aria-expanded="true" aria-controls="boxOne">
                                    Nombres y/o apellidos
                                </button>
                            </h5>
                        </div>
                        <div id="boxOne" class="collapse show" aria-labelledby="searchOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="dirName" placeholder="nombre o apellido de la persona" aria-label="nombre o apellido" aria-describedby="basico">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="findInDirectory($('#dirName').val(),'name')">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0" id="searchTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#boxTwo" aria-expanded="false" aria-controls="boxTwo">
                                    Cargo
                                </button>
                            </h5>
                        </div>
                        <div id="boxTwo" class="collapse" aria-labelledby="searchTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="dirJob" placeholder="cargo laboral del personal" aria-label="cargo" aria-describedby="basico">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button" onclick="findInDirectory($('#dirJob').val(),'job')">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0" id="searchThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#boxThree" aria-expanded="false" aria-controls="boxThree">
                                    Entidad
                                </button>
                            </h5>
                        </div>
                        <div id="boxThree" class="collapse" aria-labelledby="searchThree" data-parent="#accordion">
                            <div class="card-body">
                                <select class="slcSearch" id="slcEntidad" onchange="findInDirectory($(this).val(),'entity')">
                                    <option value="NA">-- Elegir entidad --</option>
                                    @foreach($entidades as $entidad)
                                        <option value="{{ $entidad->entId }}">{{ $entidad->entDenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header p-0" id="searchFour">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#boxFour" aria-expanded="false" aria-controls="boxFour">
                                    Proyecto
                                </button>
                            </h5>
                        </div>
                        <div id="boxFour" class="collapse" aria-labelledby="searchFour" data-parent="#accordion">
                            <div class="card-body">
                                <select class="slcSearch" id="slcObra" onchange="findInDirectory($(this).val(),'project')">
                                    <option value="NA">-- Elegir obra --</option>
                                    @foreach($obras as $obra)
                                        <option value="{{ $obra->obrId }}">{{ $obra->obrName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div id="contentDirectorio">
                    <table id="tblDirectorio" class="table table-sm">
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
                        @foreach($directorio as $i => $dir)
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
                                <select id="slcPerson" name="nslcPerson" class="slcSearch">
                                    @foreach($personas as $i=>$persona)
                                        <option value="{{ $persona->perId }}">{{ $persona->perFullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slcObra" class="col-sm-3 col-form-label lb-sm font-weight-bold">Obra</label>
                            <div class="col-sm-9">
                                <select id="slcObra" name="nslcObra" class="slcSearch">
                                    @foreach($obras as $i=>$obra)
                                        <option value="{{ $obra->obrId }}">{{ $obra->obrName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slcEntity" class="col-sm-3 col-form-label lb-sm font-weight-bold">Entidad</label>
                            <div class="col-sm-9">
                                <select id="slcEntity" name="nslcEntity" class="slcSearch">
                                    @foreach($entidades as $i=>$entidad)
                                        <option value="{{ $entidad->entId }}">{{ $entidad->entDenom }}</option>
                                    @endforeach
                                </select>
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
                "url": "plugins/datatables/Spanish.json"
            }
        });

        $('.slcSearch').select2({
            width: '100%',
            dropdownCssClass: 'slcOwnstyle'
        });
    </script>

@endsection