@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">

        <!-- Portfolio Item Row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h5 class="card-header">
                        REPORTE LABORAL DE PERSONAS
                    </h5>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card border-dark p-2">
                    <form action="">
                        <div class="form-group row">
                            <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">DNI</label>
                            <div class="col-sm-9">
                                <input type="text" v-model='person.dni' class="form-control form-control-sm" v-on:keyup.13="listLaboral('dni')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">NOMBRES</label>
                            <div class="col-sm-9">
                                <input type="text" v-model='person.name' class="form-control form-control-sm"  v-on:click="listLaboral('name')">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div id="result">

                    </div>
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

        new Vue({
            el: 'vuePersonal',
            delimiters: ['${','}'],
            data: {
                laboral: [],
                person: {'dni': null, 'name': null}
            },
            methods: {
                listLaboral: function (by) {

                    let value;

                    if(by == 'dni'){
                        value = this.person.dni;
                    }
                    else{
                        value = this.person.name;
                    }

                    axios.get("{{ url('release') }}")
                        .then(response => {
                            this.release = response.data.publicaciones;
                        })
                        .catch(err => {
                            console.log(err);
                        });
                },

                addRelease: function (){
                    this.newRelease.relDesc = $('#txtContenido').val()
                    this.formData = new FormData();
                    this.formData.append('datapub', JSON.stringify(this.newRelease));
                    this.formData.append('file', this.newFile);
                    
                    axios.post("{{ url('release/store') }}", this.formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                        .then(response => {
                            this.getReleases();
                        })
                        .catch(err => {
                            console.log(err);
                        })
                }
            }

        });
       
    </script>

@endsection