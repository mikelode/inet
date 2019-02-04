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
                <div class="card border-dark p-2" id="vuePersonal">
                    <form action="">
                        <div class="form-group row">
                            <label for="slcPerson" class="col-sm-3 col-form-label lb-sm font-weight-bold">DNI</label>
                            <div class="col-sm-9">
                                <input type="text" v-model='person.dni' class="form-control form-control-sm" v-on:keyup.enter="listLaboral('dni')">
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

@endsection
@section('custom-scripts')

    <script type="text/javascript">

        new Vue({
            el: '#vuePersonal',
            delimiters: ['${','}'],
            data: {
                laboral: [],
                person: {'dni': null, 'name': null}
            },
            methods: {
                listLaboral: function (by) {

                    let value;
                    let url = 'personal/show/' + this.person.dni;

                    axios.get(url)
                        .then(response => {
                            console.log(response.data);
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