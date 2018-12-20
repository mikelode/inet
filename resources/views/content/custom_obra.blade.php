@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="float-right">
                    <button type="button" class="btn btn-outline-warning" data-toggle="modal" data-target="#mdlNewobra">
                        Registrar Obra <img src="{{ asset('/img/obra48.png') }}" alt="">
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
                        <th>Código</th>
                        <th>Nombre completo</th>
                        <th>Nombre corto</th>
                        <th>Año</th>
                        <th>Secuencia funcional</th>
                        <th>Función</th>
                        <th>División funcional</th>
                        <th>Grupo funcional</th>
                        <th>Ubigeo</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($obras as $i=>$obra)
                        <tr>
                            <td>
                                <img src="{{ asset('/img/obra24.png') }}" alt="">
                            </td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $obra->obrId }}" data-name="code" data-title="Editar código de la obra">{{ $obra->obrCode }}</a></td>
                            <td><a href="#" class="editable" data-type="textarea" data-pk="{{ $obra->obrId }}" data-name="name" data-title="Editar nombre de la obra">{{ $obra->obrName }}</a></td>
                            <td><a href="#" class="editable" data-type="textarea" data-pk="{{ $obra->obrId }}" data-name="shortname" data-title="Editar nombre corto">{{ $obra->obrShortname }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $obra->obrId }}" data-name="year" data-title="Editar año">{{ $obra->obrYear }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $obra->obrId }}" data-name="secfun" data-title="Editar secuencia funcional">{{ $obra->obrSecfun }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $obra->obrId }}" data-name="fun" data-title="Editar funcion">{{ $obra->obrFunc }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $obra->obrId }}" data-name="div" data-title="Editar división funcional">{{ $obra->obrDiv }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $obra->obrId }}" data-name="grup" data-title="Editar grupo funcional">{{ $obra->obrGrup }}</a></td>
                            <td>
                                <a href="#" class="especial-editable" data-type="select2" data-pk="{{ $obra->obrId }}" data-value="{{ $obra->obrUbigeo }}" data-name="ubi" data-title="Editar ubigeo">
                                    {{ $obra->ubiProvincia . ' - ' . $obra->ubiDistrito }}
                                </a>
                            </td>
                            <td><a href="#" class="enable"><img class="edit" alt=""></a></td>
                            <td><img src="{{ asset('/img/delete24.png') }}" alt=""></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
    <div class="modal fade" id="mdlNewobra" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVA OBRA</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('obra/store') }}" id="frmNewobra">
                        <div class="form-group row">
                            <label for="txtDni" class="col-sm-3 col-form-label lb-sm font-weight-bold">CODIGO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtCode" name="ntxtCode" placeholder="SNIP o Unificado">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtName" class="col-sm-3 col-form-label lb-sm font-weight-bold">NOMBRE COMPLETO</label>
                            <div class="col-sm-9">
                                <textarea class="form-control form-control-sm" id="txtName" name="ntxtName" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtShortname" class="col-sm-3 col-form-label lb-sm font-weight-bold">NOMBRE CORTO</label>
                            <div class="col-sm-9">
                                <textarea class="form-control form-control-sm" id="txtShortname" name="ntxtShortname" cols="30" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtYear" class="col-sm-3 col-form-label lb-sm font-weight-bold">AÑO</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control form-control-sm" id="txtYear" name="ntxtYear" placeholder="Apellido materno">
                            </div>
                            <label for="slcUbigeo" class="col-sm-1 col-form-label lb-sm font-weight-bold">UBIGEO</label>
                            <div class="col-sm-5">
                                <select id="slcUbigeo" name="nslcUbigeo">
                                    @foreach($ubigeos as $i => $ubigeo)
                                        <option value="{{ $ubigeo->ubiId }}">{{ $ubigeo->ubiProvincia . ' - ' . $ubigeo->ubiDistrito }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <label for="txtBirth" class="col-sm-12 col-form-label lb-sm font-weight-bold">CLASIFICADO FUNCIONAL PROGRAMÁTICO</label>
                            </div>
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="txtSecfun" name="ntxtSecfun" placeholder="Sec.Funcional">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="txtFunc" name="ntxtFunc" placeholder="Función">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="txtDiv" name="ntxtDiv" placeholder="División">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control form-control-sm" id="txtGrup" name="ntxtGrup" placeholder="Grupo">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fnStoreObra($('#frmNewobra'))">Guardar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('custom-scripts')
    <script type="text/javascript">
        $('#slcUbigeo').select2({
            width: '100%',
            dropdownCssClass: 'slcOwnstyle'
        });

        $('.enable').click(function(e){
            e.preventDefault();
            $(this).toggleClass('canceledit');
            $(this).closest('tr').find('.editable').editable('toggleDisabled');
        });

        $('.editable').editable({
            disabled: true,
            url: "{{ url('obra/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });

        var ubigeos  = [];

        $.get('../listUbigeo', function(data){
            $.each(data, function(k,v){
                ubigeos.push({ id: k, text: v});
            });
        });

        $('.especial-editable').editable({
            disabled: true,
            source: ubigeos,
            select2:{
                placeholder: 'Elija el ubigeo',
                width: '100%'
            },
            url: "{{ url('obra/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });
    </script>
@endsection