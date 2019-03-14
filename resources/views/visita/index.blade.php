@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>REPORTE DE VISITAS</h5>
            </div>
            <div class="card-body h-100">
                <div class="row" id="vueVisita">
                    <div class="col-md-3">
                        <fieldset>
                            <legend>Datos del Visitante</legend>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">DNI</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model='visitante.dni' class="form-control form-control-sm" v-on:keyup.enter="showVisitante()">
                                    <small v-html='msgBusqueda'></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">NOMBRES</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model='visitante.name' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">AP.PATERNO</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model='visitante.paterno' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">AP.MATERNO</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model='visitante.materno' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">PROCEDENCIA</label>
                                <div class="col-sm-8">
                                    <v-select id="slcProcedencia" v-model="visitante.procedencia" label="sctSector" :options="{{ $sectores->toJson() }}" placeholder="Seleccione sector">
                                    </v-select>
{{--                                     <select class="form-control form-control-sm" v-model='visitante.procedencia'>
                                        <option value="NA"> -- SELECCIONE -- </option>
                                        @foreach ($sectores as $sector)
                                        <option value="{{ $sector->sctId }}"> {{ $sector->sctSector . ' - ' . $sector->sctDistrito }} </option>
                                        @endforeach
                                    </select> --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">OCUPACION</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model='visitante.ocupacion' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label lb-sm font-weight-bold">TELÉFONO</label>
                                <div class="col-sm-8">
                                    <input type="text" v-model='visitante.fono' class="form-control form-control-sm">
                                </div>
                            </div>
                            <div v-if="msgId" class="form-group row" style="max-height: 300px; overflow:auto;" id="scroll-style">
                                <div class="col-sm-6 text-center">
                                    <button class="btn btn-warning">GUARDAR CAMBIOS</button>
                                </div>
                                <div class="col-sm-6 text-center">
                                    <button class="btn btn-success" v-on:click="showReporte()">VER REPORTE</button>
                                </div>
                            </div>
                            <div v-else class="form-group row" style="max-height: 300px; overflow:auto;" id="scroll-style">
                                <div class="col-sm-12 text-center">
                                    <button class="btn btn-info" v-on:click="addVisitante()">REGISTRAR</button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <h3 class="loading" v-if="loading===true">Cargando&#8230;</h3>
                            <div v-if="flagResult" id="result">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="text-center" v-html="visitas.persona.perFullName"></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" v-on:click="toggleRow('s')">AGREGAR ACUERDO</button>
                                    </div>
                                </div>
                                <table class="table table-striped table-inverse" style="table-layout: fixed;" width="100%">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th width="4%">N°</th>
                                            <th width="12%">Fecha</th>
                                            <th width="60%">Descripción</th>
                                            <th width="16%">Nota</th>
                                            <th width="4%"></th>
                                            <th width="4%"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="table-info" v-if="flagNuevo">
                                                <td>
                                                    <a href="#" v-on:click="toggleRow('h')">
                                                        <img src="{{ asset('img/cancel24.png') }}" alt="">
                                                    </a>
                                                </td>
                                                <td class="field-fecha">
                                                    <input type="date" v-model="newVisita.nvsDate" class="form-control form-control-sm no-spin">
                                                </td>
                                                <td>
                                                    <textarea v-model="newVisita.nvsDesc" class="form-control form-control-sm"></textarea>
                                                </td>
                                                <td>
                                                    <textarea v-model="newVisita.nvsNota" class="form-control form-control-sm"></textarea>
                                                </td>
                                                <td colspan="2" class="p-1">
                                                    <a class="btn btn-outline-light" href="javascript:void(0)" v-on:click="addDetallevisita()">
                                                        <img src=" {{ asset('img/save48.png') }} " alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr v-for="detalle, i in visitas.visita.detalle">
                                                <td scope="row">${ i + 1 }</td>
                                                <td class="field-fecha">
                                                    ${ detalle.dvtFecha }
                                                </td>
                                                <td>${ detalle.dvtDesc }</td>
                                                <td>${ detalle.dvtNota }</td>
                                                <td>
                                                    <a href="javascript:void(0)" v-on:click = "getDetalle(detalle.dvtId)">
                                                        <img src=" {{ asset('img/edit24.png') }} " alt="">
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="javascript:void(0)" v-on:click = "deleteDetalle(detalle.dvtId)">
                                                        <img src=" {{ asset('img/delete24.png') }} " alt="">
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="mdlEditardetalle" tabindex="-1" role="dialog" aria-labelledby="mdlEditardetalle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="mdlEditarcronolabel">EDITAR DETALLE DE REUNION</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"></span>
                                    </button>
                                </div>
                                <form v-on:submit.prevent="updtDetalle">
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <fieldset>
                                                    <legend>
                                                        Datos de la Reunión 92912
                                                    </legend>
                                                    <div class="row">
                                                        <label for="" class="col-sm-2 col-form-label-sm pb-1">Fecha de inicio</label>
                                                        <div class="col-sm-3">
                                                            <input type="date" class="form-control form-control-sm" v-model="currentDetalle.dvtFecha">
                                                        </div>
                                                        <div class="col-sm-7">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="" class="col-sm-2 col-form-label-sm pb-1">Descripción</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control form-control-sm" v-model="currentDetalle.dvtDesc"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <label for="" class="col-sm-2 col-form-label-sm pb-1">Nota</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control form-control-sm" v-model="currentDetalle.dvtNota"></textarea>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
                                        <button type="submit" class="btn btn-primary">GUARDAR CAMBIOS</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Portfolio Item Row -->

        <!-- /.row -->

    </div>

@endsection
@section('custom-scripts')

    <script type="text/javascript">

        new Vue({
            el: '#vueVisita',
            delimiters: ['${','}'],
            data: {
                loading: false,
                laboral: [],
                flagResult: false,
                flagNuevo: false,
                newVisita: {'nvsDate':null, 'nvsDesc':null, 'nvsNota':null},
                visitas: {},
                visitante: {'dni': null, 'name': null, 'paterno': null, 'materno': null, 'procedencia':null, 'ocupacion':null, 'fono':null, 'key': null},
                msgBusqueda: '',
                msgId: false,
                currentDetalle: {}
            },
            methods: {
                showVisitante: function () {
                    this.loading = true;
                    this.flagResult = false;
                    let url = '../visitante/show/' + this.visitante.dni;
                    axios.get(url)
                        .then(response => {
                            console.log(response);
                            this.loading = false;
                            this.msgBusqueda = response.data.msg;

                            if(response.data.msgId == 500){
                                if(response.data.persona.length == 0){
                                    this.visitante.name = null;
                                    this.visitante.paterno = null;
                                    this.visitante.materno = null;
                                }
                                else{
                                    this.visitante.name = response.data.persona[0].perNombre;
                                    this.visitante.paterno = response.data.persona[0].perPaterno;
                                    this.visitante.materno = response.data.persona[0].perMaterno;
                                }
                                this.msgId = false;
                            }
                            else{
                                this.visitante.id = response.data.visitante[0].visId;
                                this.visitante.name = response.data.persona[0].perNombre;
                                this.visitante.paterno = response.data.persona[0].perPaterno;
                                this.visitante.materno = response.data.persona[0].perMaterno;
                                this.visitante.procedencia ={ 'sctId':response.data.visitante[0].visSector, 'sctSector':response.data.visitante[0].sctSector };
                                this.visitante.ocupacion = response.data.visitante[0].visOcupacion;
                                this.visitante.fono = response.data.visitante[0].visFono;
                                this.msgId = true;
                            }
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                },

                addVisitante: function (){
                    this.loading = true;
                    axios.post("{{ url('visitante/store') }}", {'visitante': this.visitante})
                        .then(response => {
                            console.log(response);
                            alert(response.data.msg);
                            this.loading = false;
                            this.showVisitante();
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        })
                },

                showReporte: function(){
                    this.loading = true;

                    let url = '../visitante/reporte/' + this.visitante.id;

                    axios.get(url)
                        .then(response => {
                            this.loading = false;
                            this.flagResult = true;
                            this.visitas = response.data;
                            //this.vwresult = response.data;
                        })
                        .catch(err => {
                            this.loading = false;
                        });

                },

                toggleRow: function(opt){
                    if(opt == 's'){
                        this.flagNuevo = true;
                    }
                    else{
                        this.flagNuevo = false;
                    }
                },

                addDetallevisita: function(){
                    this.loading = true;

                    axios.post("{{ url('detalle/store') }}", {'detalle': this.newVisita, 'visitas': this.visitas})
                        .then(response => {
                            this.loading = false;
                            console.log(response);
                            if(response.data.msgId == 500){
                                alert(response.data.msg);
                            }
                            else{
                                this.flagNuevo = false;
                                this.newVisita.nvsDate = null;
                                this.newVisita.nvsDesc = null;
                                this.newVisita.nvsNota = null;
                                this.showReporte();
                            }
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                },

                getDetalle: function (id) {
                    this.loading = true;
                    let url = "{{ url('detalle/show/0') }}".replace(0,id);
                    axios.get(url)
                        .then(response => {
                            this.loading = false;
                            if(response.data.msgId == 500){
                                alert(response.data.msg);
                            }
                            else{
                                this.currentDetalle = response.data.detalle;
                                $('#mdlEditardetalle').modal('show');
                            }
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                },

                updtDetalle: function(){
                    this.loading = true;
                    let url = "{{ url('detalle/update/0') }}".replace(0,this.currentDetalle.dvtId);
                    axios.post(url, {'detalle': this.currentDetalle})
                        .then(response => {
                            this.loading = false;
                            alert(response.data.msg);
                            this.showReporte();
                            $('#mdlEditardetalle').modal('hide');
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                },

                deleteDetalle: function(id){

                    let ok = confirm("¿Está seguro de eliminar el registro seleccionado?");
                    if(!ok) return;

                    this.loading = true;
                    let url = "{{ url('detalle/delete/0') }}".replace(0,id);
                    axios.get(url)
                        .then(response => {
                            this.loading = false;
                            alert(response.data.msg);
                            this.showReporte();
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                }
            }

        });
       
    </script>

@endsection