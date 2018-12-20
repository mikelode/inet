@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="float-right">
                    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#mdlNewentity">
                        Registrar Entidad <img src="{{ asset('/img/entity48.png') }}" alt="">
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
                        <th>Documento</th>
                        <th>Denominación</th>
                        <th>Sigla</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($entidades as $i=>$entidad)
                        <tr>
                            <td>
                                <img src="{{ asset('/img/entity24.png') }}" alt="">
                            </td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $entidad->entId }}" data-name="doc" data-title="Editar Número de Documento">{{ $entidad->entDoc }}</a></td>
                            <td><a href="#" class="editable" data-type="textarea" data-pk="{{ $entidad->entId }}" data-name="denom" data-title="Editar Denominación">{{ $entidad->entDenom }}</a></td>
                            <td><a href="#" class="editable" data-type="text" data-pk="{{ $entidad->entId }}" data-name="sigla" data-title="Editar Sigla">{{ $entidad->entSigla }}</a></td>
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
    <div class="modal fade" id="mdlNewentity" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVA ENTIDAD</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('entidad/store') }}" id="frmNewentidad">
                        <div class="form-group row">
                            <label for="txtDoc" class="col-sm-3 col-form-label-sm lb-sm font-weight-bold">DOCUMENTO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtDoc" name="ntxtDoc" placeholder="Ruc u otro">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtDenom" class="col-sm-3 col-form-label lb-sm font-weight-bold">DENOMINACIÓN</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtDenom" name="ntxtDenom" placeholder="Denominación">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtSigla" class="col-sm-3 col-form-label lb-sm font-weight-bold">SIGLA</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtSigla" name="ntxtSigla" placeholder="Sigla de la entidad">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fnStoreEntidad($('#frmNewentidad'))">Guardar</button>
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
            url: "{{ url('entidad/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });
    </script>
@endsection