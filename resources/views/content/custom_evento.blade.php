@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="float-right">
                    @can('create-events', \App\Models\Evento::class)
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#mdlNewevent">
                        Registrar Evento <img src="{{ asset('/img/event48.png') }}" alt="">
                    </button>
                    @endcan
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
                        <th>Título del evento</th>
                        <th>Inicia</th>
                        <th>Termina</th>
                        <th>Todo el día</th>
                        <th>Evento Nacional</th>
                        <th>Evento Local</th>
                        <th>Tipo de Evento</th>
                        <th>Icono</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventos as $i=>$evento)
                        <tr id="{{ 'persona' . $evento->evtId }}" data-key="{{ $evento->evtId }}">
                            <td>
                                <img src="{{ asset('/img/event24.png') }}" alt="">
                            </td>
                            <td><a href="#" class="editable event-titulo" data-type="text" data-pk="{{ $evento->evtId }}" data-name="title" data-title="Editar título del evento">{{ $evento->evtTitle }}</a></td>
                            <td><a href="#" class="editable" data-type="date" data-pk="{{ $evento->evtId }}" data-name="begin" data-title="Editar el inicio del evento">{{ $evento->evtStartdate }}</a></td>
                            <td><a href="#" class="editable" data-type="date" data-pk="{{ $evento->evtId }}" data-name="end" data-title="Editar el final del evento">{{ $evento->evtEnddate }}</a></td>
                            <td><a href="#" class="editable-slc" data-type="select" data-pk="{{ $evento->evtId }}" data-name="duration" data-title="Editar duración" data-value="{{ $evento->evtAllday }}">{{ $evento->evtAllday ? 'SI' : 'NO' }}</a></td>
                            <td><a href="#" class="editable-slc" data-type="select" data-pk="{{ $evento->evtId }}" data-name="national" data-title="Alcance del evento" data-value="{{ $evento->evtNational }}">{{ $evento->evtNational ? 'SI' : 'NO' }}</a></td>
                            <td><a href="#" class="editable-slc" data-type="select" data-pk="{{ $evento->evtId }}" data-name="local" data-title="Alcance del evento" data-value="{{ $evento->evtLocal }}">{{ $evento->evtLocal ? 'SI' : 'NO' }}</a></td>
                            <td><a href="#" class="editable-ajx" data-type="select" data-pk="{{ $evento->evtId }}" data-name="tipoevento" data-title="Editar tipo de evento" data-value="{{ $evento->evtTipo }}">{{ $evento->tevDenom }}</a></td>
                            <td>
                                @if(\Storage::disk('public')->exists($evento->evtPathIcon))
                                    <a href="#" data-toggle="modal" data-target="#mdlAttachFile" class="btnAttachFile" title="Adjuntar ícono">
                                        <img src="{{ asset('/storage/' . $evento->evtPathIcon) }}" alt="" height="24" width="24">
                                    </a>
                                @else
                                    <a href="#" data-toggle="modal" data-target="#mdlAttachFile" class="btnAttachFile" title="Adjuntar ícono">
                                        <img src="{{ asset('/img/upload24.png') }}">
                                    </a>
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
    <div class="modal fade" id="mdlNewevent" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NUEVO EVENTO</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('evento/store') }}" id="frmNewevent">
                        <div class="form-group row">
                            <label for="txtTitle" class="col-sm-3 col-form-label lb-sm font-weight-bold">TÍTULO</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control form-control-sm" id="txtTitle" name="ntxtTitle" placeholder="Nombre del evento">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dteStart" class="col-sm-3 col-form-label lb-sm font-weight-bold">FECHA INICIO</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm" id="dteStart" name="ndteStart">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="dteEnd" class="col-sm-3 col-form-label lb-sm font-weight-bold">FECHA FINAL</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control form-control-sm" id="dteEnd" name="ndteEnd">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txtBirth" class="col-sm-3 col-form-label lb-sm font-weight-bold">TIPO DE EVENTO</label>
                            <div class="col-sm-9">
                                <select name="nslcTipoevt" id="slcTipoevt">
                                    <option value="NA">--Seleccione--</option>
                                    @foreach($tipoeventos as $i=>$tipo)
                                        <option value="{{ $tipo->tevId }}">{{ $tipo->tevDenom }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="chkAllday" name="nchkAllday">
                                    <label for="chkAllday" class="custom-control-label lb-sm font-weight-bold">DÍA COMPLETO</label>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="chkNational" name="nchkNivel" value="national">
                                    <label for="chkNational" class="custom-control-label lb-sm font-weight-bold">EVENTO NACIONAL</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" class="custom-control-input" id="chkLocal" name="nchkNivel" value="local">
                                    <label for="chkLocal" class="custom-control-label lb-sm font-weight-bold">EVENTO LOCAL</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fnStoreEvent($('#frmNewevent'))">Guardar</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="mdlAttachFile" tabindex="-1" role="dialog" aria-labelledby="attachModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    ADJUNTAR ÍCONO DEL EVENTO
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="frmAttachFile" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Evento: </label>
                            <textarea class="form-control-plaintext form-control-sm" id="atchEvt" name="natchEvt" readonly></textarea>
                            <input type="hidden" id="hatchEvt" name="hnatchEvt">
                        </div>
                        <div class="form-group">
                            <label>Seleccionar Archivo</label>
                            <input type="file" class="form-control-file" id="atchFile" name="natchFile" accept="image/*">
                            <progress class="form-control" value="0"></progress>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="adjuntarImagen($('#frmAttachFile')[0])">Subir documento</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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
            url: "{{ url('evento/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });

        $('.editable-slc').editable({
            disabled: true,
            source: [
                { value: 1, text: 'SI'},
                { value: 0, text: 'NO'}
            ],
            url: "{{ url('evento/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });

        $('.editable-ajx').editable({
            disabled: true,
            source: '../listTipoeventos',
            url: "{{ url('evento/update') }}",
            success: function(response, newValue){
                alert(response);
            }
        });

        $('#slcTipoevt').select2({
            width: '100%'
        });

        $('#mdlAttachFile').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var evtId = button.closest('tr').attr('data-key');
            var evtTit = button.closest('tr').find('a.event-titulo').text();
            var modal = $(this);

            modal.find('.modal-body #atchEvt').val(evtTit);
            modal.find('.modal-body #hatchEvt').val(evtId);
        });
    </script>
@endsection