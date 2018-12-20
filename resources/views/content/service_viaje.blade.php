@extends('../app')
@section('main-content')
    <!-- Page Content -->
    <div class="container-fluid">
        <div class="row py-2">
            <div class="col-sm-2">
                <div class="card border border-success">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @isset($hojaviaje)
                                    <button type="button" class="btn btn-outline-primary btn-block" onclick="fnUpdateHojaviaje($('#frmTravelSheet'))">
                                        <img src="{{ asset('img/save32.png') }}" alt="">
                                        Guardar
                                    </button>
                                @else
                                    <button type="button" class="btn btn-outline-primary btn-block" onclick="fnStoreHojaviaje($('#frmTravelSheet'))">
                                        <img src="{{ asset('img/save32.png') }}" alt="">
                                        Guardar
                                    </button>
                                @endisset
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-outline-warning btn-block">
                                    <img src="{{ asset('img/clear48.png') }}" alt="" width="32">
                                    Limpiar
                                </button>
                            </div>
                        </div>
                        <div class="row pt-1">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-outline-danger btn-block" onclick="fnGotoUrl('{{ url('service/travelsheet') }}')">
                                    <img src="{{ asset('img/cancel48.png') }}" alt="" width="32">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-10 border border-success pr-2">
                <div class="row mt-4">
                    <div class="col-md-12" style="text-align: center">
                        <h4>
                            <u>AUTORIZACIÓN OFICIAL DE VIAJE</u>
                            @isset($hojaviaje)
                                : Nro - {{ $hojaviaje->viaId }}
                            @endisset
                        </h4>
                    </div>
                </div>
                <!-- Portfolio Item Row -->
                <div class="card border border-0">
                    <div class="card-body">
                        <form action="{{ isset($hojaviaje) ? url('travelsheet/update') . '/' . $hojaviaje->viaId : url('travelsheet/store') }}" id="frmTravelSheet">
                            <div class="form-group row">
                                <label for="slcTitular" class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">1.- NOMBRES Y APELLIDOS</label>
                                <div class="col-sm-10">
                                    <select name="nslcTitular" id="slcTitular" class="form-control form-control-sm">
                                        <option value="NA">-- Seleccione --</option>
                                        @isset($hojaviaje)
                                            @foreach($personas as $i => $per)
                                                <option value="{{ $per->perId }}" {{ $per->perId==$hojaviaje->viaTitular?'selected':'' }}>{{ $per->perFullName }}</option>
                                            @endforeach
                                        @else
                                            @foreach($personas as $i => $per)
                                                <option value="{{ $per->perId }}">{{ $per->perFullName }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slcDependencia" class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">2.- DEPENDENCIA</label>
                                <div class="col-sm-10">
                                    <select name="nslcDependencia" id="slcDependencia" class="form-control form-control-sm">
                                        <option value="NA">-- Seleccione --</option>
                                        @isset($hojaviaje)
                                            @foreach($dependencias as $i => $dep)
                                                <option value="{{ $dep->entId }}" {{ $dep->entId==$hojaviaje->viaEntity?'selected':'' }}>{{ $dep->entDenom }}</option>
                                            @endforeach
                                        @else
                                            @foreach($dependencias as $i => $dep)
                                                <option value="{{ $dep->entId }}">{{ $dep->entDenom }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slcUbigeo" class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">3.- LUGAR DE VISITA</label>
                                <div class="col-sm-10">
                                    <select name="nslcUbigeo[]" id="slcUbigeo" class="form-control form-control-sm" multiple>
                                        @isset($hojaviaje)
                                            @foreach($ubigeos as $i => $ubi)
                                                <option value="{{ $ubi->ubiId }}" {{ in_array($ubi->ubiId, $hojaviaje->destinos->pluck('dviUbigeo')->all()) ? 'selected' : '' }}>{{ $ubi->ubiDistrito . ' - ' . $ubi->ubiProvincia }}</option>
                                            @endforeach
                                        @else
                                            @foreach($ubigeos as $i => $ubi)
                                                <option value="{{ $ubi->ubiId }}">{{ $ubi->ubiDistrito . ' - ' . $ubi->ubiProvincia }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slcObra" class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">3.1.- Obra</label>
                                <div class="col-sm-10">
                                    <select name="nslcObra[]" id="slcObra" class="form-control form-control-sm" multiple>
                                        <option value="NA">-- Seleccione --</option>
                                        @isset($hojaviaje)
                                            @foreach($obras as $i => $obr)
                                                <option value="{{ $obr->obrId }}" {{ in_array($obr->obrId, $hojaviaje->obras->pluck('oviObra')->all()) ? 'selected' : ''}}>{{ $obr->obrName }}</option>
                                            @endforeach
                                        @else
                                            @foreach($obras as $i => $obr)
                                                <option value="{{ $obr->obrId }}">{{ $obr->obrName }}</option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="txtMotivo" class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">4.- MOTIVO</label>
                                <div class="col-sm-9">
                                    <textarea name="ntxtMotivo" id="txtMotivo" class="form-control form-control-sm" cols="30" rows="3">{{ isset($hojaviaje) ? $hojaviaje->viaMotivo : '' }}</textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">5.- CRONOGRAMA DE ACTIVIDADES</label>
                                <div class="col-sm-10">
                                    <table class="table table-sm">
                                        <thead class="thead-light">
                                        <tr>
                                            <th width="10%">DESDE (fecha)</th>
                                            <th width="10%">HASTA (fecha)</th>
                                            <th width="80%">ACTIVIDAD A REALIZAR</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @isset($hojaviaje)
                                            @foreach($hojaviaje->actividades as $act)
                                                <tr>
                                                    <td><input type="date" class="form-control form-control-sm" name="ndteStart[]" value="{{ $act->actStartdate }}"></td>
                                                    <td><input type="date" class="form-control form-control-sm" name="ndteEnd[]" value="{{ $act->actEnddate }}"></td>
                                                    <td><textarea name="ntxtActividad[]" cols="30" rows="3" class="form-control form-control-sm">{{ $act->actDescripcion }}</textarea></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td><input type="date" class="form-control form-control-sm" name="ndteStart[]"></td>
                                                <td><input type="date" class="form-control form-control-sm" name="ndteEnd[]"></td>
                                                <td><textarea name="ntxtActividad[]" cols="30" rows="3" class="form-control form-control-sm"></textarea></td>
                                            </tr>
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">6.- ESCALA DE VIÁTICOS</label>
                                <div class="col-sm-10">
                                    <table class="table table-sm">
                                        <thead class="thead-light">
                                        <tr>
                                            <th></th>
                                            <th>SALIDA</th>
                                            <th>RETORNO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @isset($hojaviaje)
                                            <tr>
                                                <td>FECHA</td>
                                                <td>
                                                    <input type="date" class="form-control form-control-sm" name="dteSalida" value="{{ $hojaviaje->viaStartdate }}">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control form-control-sm" name="dteRetorno" value="{{ $hojaviaje->viaReturndate }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HORA</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" name="tmeSalida" value="{{ $hojaviaje->viaStarttime }}">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" name="tmeRetorno" value="{{ $hojaviaje->viaReturntime }}">
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td>FECHA</td>
                                                <td>
                                                    <input type="date" class="form-control form-control-sm" name="dteSalida">
                                                </td>
                                                <td>
                                                    <input type="date" class="form-control form-control-sm" name="dteRetorno">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>HORA</td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" name="tmeSalida">
                                                </td>
                                                <td>
                                                    <input type="time" class="form-control form-control-sm" name="tmeRetorno">
                                                </td>
                                            </tr>
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">7.- ADELANTO DE VIÁTICOS</label>
                                <label class="col-sm-3 col-form-label-sm lb-sm font-weight-bold">COMPONENTE</label>
                                <label class="col-sm-3 col-form-label-sm lb-sm font-weight-bold">META</label>
                                <div class="col-sm-3">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">8.- PERSONAL QUE VIAJA</label>
                                <div class="col-sm-9">
                                    <table class="table table-sm" id="tblPassengers">
                                        <thead class="thead-light">
                                        <tr>
                                            <th width="60%">NOMBRES Y APELLIDOS</th>
                                            <th>DNI</th>
                                            <th width="20%">FIRMA</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr id="rowClone" style="display: none;">
                                            <td width="60%">
                                                <select name="nslcPasajero[]" class="form-control form-control-sm slcPasajero">
                                                    <option value="NA">-- Seleccione --</option>
                                                    @foreach($personas as $i => $per)
                                                        <option value="{{ $per->perId }}">{{ $per->perFullName }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" readonly class="form-control-plaintext form-control-sm txtDnipasajero"></td>
                                            <td width="20%"></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="fnDeleteRowTable(this.closest('tr'))">X</button>
                                            </td>
                                        </tr>
                                        @isset($hojaviaje)
                                            @foreach($hojaviaje->pasajeros as $psj)
                                                <tr>
                                                    <td width="60%">
                                                        <select name="nslcPasajero[]" class="form-control form-control-sm slcPasajero">
                                                            <option value="NA">-- Seleccione --</option>
                                                            @foreach($personas as $i => $per)
                                                                <option value="{{ $per->perId }}" {{ $per->perId == $psj->psjPersona ? 'selected' : '' }}>{{ $per->perFullName }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td><input type="text" readonly class="form-control-plaintext form-control-sm txtDnipasajero"></td>
                                                    <td width="20%"></td>
                                                    <td>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="fnDeleteRowTable(this.closest('tr'))">X</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endisset
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-sm-1">
                                    <button type="button" class="btn btn-outline-warning" onclick="fnCloneRowTable(document.getElementById('rowClone'), document.getElementById('tblPassengers'))"><img src="{{ asset('/img/newuser48.png') }}" alt=""></button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slcModotransporte" class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">9.- MEDIO DE TRANSPORTE UTILIZADO:</label>
                                <div class="col-sm-3">
                                    @isset($hojaviaje)
                                    <select name="nslcModotransporte" id="slcModotransporte" class="form-control form-control-sm slcOwnstyle">
                                        <option value="PARTICULAR" {{ $hojaviaje->viaModotransporte == 'PARTICULAR' ? 'selected' : '' }}>PARTICULAR</option>
                                        <option value="ALQUILADO" {{ $hojaviaje->viaModotransporte == 'ALQUILADO' ? 'selected' : '' }}>ALQUILADO</option>
                                        <option value="OFICIAL" {{ $hojaviaje->viaModotransporte == 'OFICIAL' ? 'selected' : '' }}>OFICIAL</option>
                                        <option value="OTROS" {{ $hojaviaje->viaModotransporte == 'OTROS' ? 'selected' : '' }}>OTROS</option>
                                    </select>
                                    @else
                                    <select name="nslcModotransporte" id="slcModotransporte" class="form-control form-control-sm slcOwnstyle">
                                        <option value="PARTICULAR">PARTICULAR</option>
                                        <option value="ALQUILADO">ALQUILADO</option>
                                        <option value="OFICIAL">OFICIAL</option>
                                        <option value="OTROS">OTROS</option>
                                    </select>
                                    @endisset
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label-sm lb-sm font-weight-bold">9.1.- Vehículo asignado:</label>
                                <div class="col-sm-10">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-sm">
                                        <thead class="thead-light">
                                        <tr>
                                            <th>CHOFER</th>
                                            <th>DNI</th>
                                            <th>MARCA</th>
                                            <th>PLACA</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <select name="nslcChofer" id="slcChofer" class="form-control form-control-sm">
                                                    <option value="NA">-- Seleccione --</option>
                                                    @isset($hojaviaje)
                                                        @foreach($choferes as $i => $chof)
                                                            <option value="{{ $chof->perId }}" {{ $chof->perId == $hojaviaje->viaChofer ? 'selected' : '' }}>{{ $chof->perFullName }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($choferes as $i => $chof)
                                                            <option value="{{ $chof->perId }}">{{ $chof->perFullName }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext" readonly id="txtDnichofer">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control-plaintext" readonly id="txtMovilidad">
                                            </td>
                                            <td>
                                                <select name="nslcPlaca" id="slcPlaca" class="form-control form-control-sm">
                                                    <option value="NA">-- Seleccione --</option>
                                                    @isset($hojaviaje)
                                                        @foreach($movilidades as $i => $mov)
                                                            <option value="{{ $mov->trnId }}" {{ $mov->trnId == $hojaviaje->viaMovilidad ? 'selected' : '' }}>{{ $mov->trnMarca }}</option>
                                                        @endforeach
                                                    @else
                                                        @foreach($movilidades as $i => $mov)
                                                            <option value="{{ $mov->trnId }}">{{ $mov->trnMarca }}</option>
                                                        @endforeach
                                                    @endisset
                                                </select>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
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
        $('#slcTitular,#slcDependencia,#slcUbigeo,#slcChofer,#slcObra,#slcPlaca').select2({
            width: '100%',
            dropdownCssClass: 'slcOwnstyle'
        });

        $('.slcPasajero').select2({
            width: '100%',
            dropdownCssClass: 'slcOwnstyle'
        });
    </script>
@endsection