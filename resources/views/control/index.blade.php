@extends('../app')
@section('main-content')

    <!-- Page Content -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>REPORTE LABORAL DE PERSONAS</h5>
            </div>
            <div class="card-body h-100">
                <div class="row" id="vuePersonal">
                    <div class="col-md-3">
                        <fieldset>
                            <legend>Datos de la Persona</legend>
                            <div class="form-group row">
                                <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">DNI</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model='person.dni' class="form-control form-control-sm" v-on:keyup.enter="listLaboral('')">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">AÑO</label>
                                <div class="col-sm-9">
                                    <select v-model='person.anio' class="form-control form-control-sm">
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                        <option value="2017">2017</option>
                                        <option value="2016">2016</option>
                                        <option value="2015">2015</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">NOMBRES</label>
                                <div class="col-sm-9">
                                    <input type="text" v-model='person.name' class="form-control form-control-sm"  v-on:keyup.enter="listPersonas('name')">
                                </div>
                            </div>
                            <div class="form-group row" style="max-height: 300px; overflow:auto;" id="scroll-style">
                                <table class="table table-sm mx-3">
                                    <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>DNI</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="persona in personas">
                                        <td>
                                            ${persona.fullname}
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" v-on:click="listLaboral(persona.dni)">
                                                ${persona.dni}
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-9">
                        <div class="card">
                            <h3 class="loading" v-if="loading===true">Cargando&#8230;</h3>
                            <div id="result" v-html="result">
                                
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
            el: '#vuePersonal',
            delimiters: ['${','}'],
            data: {
                loading: false,
                laboral: [],
                result: '',
                person: {'dni': null, 'name': null, 'anio':2018},
                personas: []
            },
            methods: {
                listLaboral: function (by) {
                    this.loading = true;
                    if(by != ''){
                        this.person.dni = by;
                    }

                    let url = 'personal/show/' + this.person.dni + '/' + this.person.anio;

                    axios.get(url)
                        .then(response => {
                            this.loading = false;
                            this.result = response.data;
                        })
                        .catch(err => {
                            this.loading = false;
                            console.log(err);
                        });
                },

                listPersonas: function(by){
                    this.loading = true;
                    let url = 'personal/list/' + this.person.name + '/' + this.person.anio;

                    axios.get(url)
                    .then(response => {
                        this.loading = false;
                        this.personas = response.data.personas;
                    })
                    .catch(err => {
                        console.log(err);
                    })
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