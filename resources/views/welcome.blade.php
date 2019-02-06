@extends('app') 
@section('main-content')


<!-- Page Content -->
<div class="">
    <!-- Portfolio Item Row -->
    <div class="row">
        <div class="col-md-3">
            <div class="row mb-0">
                <div class="col-md-12">
                    <div class="net-box mt-1">
                        <div class="net-box-header" style="text-align: center;">
                            <div class="net-box-title">
                                PORTAFOLIO DE SISTEMAS
                            </div>
                        </div>
                        <div class="net-box-body">
                            <div class="row my-2">
                                <div class="col-md-6" style="text-align: center;">
									<a href="http://192.168.0.2:8081/slam/public" target="_blank">
										<img src="{{ asset('img/logismart.png') }}" alt="" width='140px' height='120px'>
									</a>
                                </div>
                                <div class="col-md-6" style="text-align: center;">
                                    <img src="{{ asset('img/TAREOS.png') }}" alt="" width='140px' height='120px'>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6" style="text-align: center;">
                                    <img src="{{ asset('img/correo.png') }}" alt="" width='140px' height='120px'>
                                </div>
                                <div class="col-md-6" style="text-align: center;">
                                    <img src="{{ asset('img/correo.png') }}" alt="" width='140px' height='120px'>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-0">
                <div class="col-md-12">
                    <div class="net-box mt-2">
                        <div class="net-box-header" style="text-align: center;">
                            <div class="net-box-title">RECURSOS</div>
                        </div>
                        <div class="net-box-body">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header py-0" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <i class="fa" aria-hidden="true"></i>
                                                FORMATOS Y/O DIRECTIVAS
                                            </button>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('img/newx32.png') }}" alt="">
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
											<ul>
												<li>
												<a href="{{ asset('docs/solicitud_creacion_usuario_logistica.pdf') }}" target='_blank'>
													Formato creación usuario logística
												</a>
												</li>
											</ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header py-0" id="headingTwo">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <i class="fa" aria-hidden="true"></i>
                                                DRIVERS - PROGRAMAS
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            Contenido B
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header py-0" id="headingThree">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <i class="fa" aria-hidden="true"></i>
                                                MANUALES
                                            </button>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('img/newx32.png') }}" alt="">
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            Contenido C
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header py-0" id="headingFour">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <i class="fa" aria-hidden="true"></i>
                                                RESOLUCIONES
                                            </button>
                                            <a href="javascript:void(0)">
                                                <img src="{{ asset('img/newx32.png') }}" alt="">
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
                                        <div class="card-body">
                                            Contenido D
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 px-0" id="vuePublicacion">
            <div class="net-box mt-1">
                <div class="net-box-header" style="text-align: center;">
                    <div class="net-box-title">
                        COMUNICADOS Y/O PUBLICACIONES
                    </div>
                    <div class="float-right">
                        @auth
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mdlNuevaPub">Agregar publicación</button>
                        @endauth
                    </div>
                </div>
                <div class="net-box-body box-releases" id="scroll-style">
                    <div class="card border-info mb-2" v-for="rel in release">
                        <div class="card-header py-1">
                            <h6 class="card-title mb-1">
                                ${ rel.pubTitulo }
                                @auth
                                <a href="javascript:void(0)" v-on:click="getRelease(rel.pubId)"><img class="edit" alt=""></a>
                                <a href="javascript:void(0)" v-on:click="delRelease(rel.pubId)"><img src="{{ asset('/img/delete24.png') }}" alt=""></a>
                                @endauth
                            </h6>
                            <h7 class="card-subtitle mb-2 text-muted">${ rel.pubFecha }</h7>
                            <div class="float-right" v-show="rel.pubPathfile">
                                <a v-bind:href="'{{ asset('/storage/') }}' + '/' + rel.pubPathfile" target="_blank">
                                    <i class="fa fa-paperclip"></i>
                                    Archivo adjunto
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-text" v-html="rel.pubDescripcion">

                            </p>
                        </div>
                        <div class="card-footer bg-transpa1rent py-1">
                            COMENTARIOS
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" v-for="com in rel.comentarios">
                                <small class="text-muted">
                                    ${ com.comDescripcion }
                                </small>
                            </li>
                            <li class="list-group-item">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Escribe tu comentario..." v-model.trim="comments[rel.pubId]">
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-outline-success" @click="addComment(rel.pubId)">Enviar</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="mdlNuevaPub" tabindex="-1" role="dialog" aria-labelledby="mdlNuevaPub" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">AVISOS Y COMUNICADOS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form v-on:submit.prevent='addRelease' accept-charset="UTF-8">
                            <div class="modal-body">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#newRelease" role="tab" aria-selected="true" id="btnNewRelease">Nueva Publicación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#chooseRelease" role="tab" aria-selected="false" id="btnChooseRelease">Seleccionar</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="newRelease" class="tab-pane fade show active" role="tabpanel">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm mt-2" name="title_release" placeholder="TITULO PARA SU PUBLICACION" v-model="newRelease.relTitle">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="txtContenido" name="desc_release" class="form-control" style="height: 350px" v-model='newRelease.relDesc'></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="chkVisible" v-model='newRelease.relShow'>
                                                <label for="chkVisible" class="custom-control-label">Mostrar / Ocultar</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" @change='onFileChange' />
                                            </div>
                                        </div>
                                        <div class="text-center pt-2">
                                            <input class="btn btn-success" type="submit" id="btnPublish" data-task="add" value="PUBLICAR">
                                        </div>
                                    </div>
                                    <div id="chooseRelease" class="tab-pane fade" role="tabpanel">
                                        <div class="modalSection" id="listReleases">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">SALIR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="mdlEditPub" tabindex="-1" role="dialog" aria-labelledby="mdlEditPub" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">EDITAR SEGMENTO DE AVISOS Y COMUNICADOS</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form accept-charset="UTF-8" enctype="multipart/form-data" v-on:submit.prevent='updtRelease'>
                            <div class="modal-body">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="pill" href="#newRelease" role="tab" aria-selected="true" id="btnNewRelease">Nueva Publicación</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="pill" href="#chooseRelease" role="tab" aria-selected="false" id="btnChooseRelease">Seleccionar</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="newRelease" class="tab-pane fade show active" role="tabpanel">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-sm mt-2" name="title_release" placeholder="TITULO PARA SU PUBLICACION" v-model="currentRelease.pubTitulo">
                                        </div>
                                        <div class="form-group">
                                            <textarea id="txtContenidoEdit" class="form-control" style="height: 350px" v-model='currentRelease.pubDescripcion'></textarea>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="chkVisible" v-model='currentRelease.pubVisible'>
                                                <label for="chkVisible" class="custom-control-label">Mostrar / Ocultar</label>
                                            </div>
                                        </div>
                                        <div class="form-group custom-file">
                                            <p v-show="currentRelease.pubPathfile">
                                                Archivo actual:
                                                <a v-bind:href="'{{ asset('/storage/') }}' + '/' + currentRelease.pubPathfile" target="_blank">
                                                    ${ currentRelease.pubPathfile }
                                                </a>
                                            </p>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" @change='onFileChange' />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center pt-2">
                                            <input class="btn btn-success" type="submit" id="btnPublish" data-task="add" value="PUBLICAR">
                                        </div>
                                    </div>
                                    <div id="chooseRelease" class="tab-pane fade" role="tabpanel">
                                        <div class="modalSection" id="listReleases">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-danger" type="button" data-dismiss="modal">SALIR</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3" style="text-align: center;">
            <div class="net-box mt-1">
                <div class="net-box-header">
                    <div class="net-box-title">EVENTOS</div>
                </div>
                <div class="net-box-body">
                    <div id="calendar">

                    </div>
                </div>
            </div>

        </div>



    </div>
    <!-- /.row -->

    <div class="row mx-0">
        <div class="net-box mb-0" style="border: hidden">
            <div class="net-box-header">
                <div class="net-box-title">
                    SITIOS DE INTERÉS
                </div>
            </div>
            <div class="net-box-body">
                <div class="net-carousel">
                    <div>
                        <a href="http://ofi5.mef.gob.pe/sosem2/" target="_blank">
                            <img src="{{ asset('/img/SSI.jpg') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="https://www.mef.gob.pe/es/aplicativos-invierte-pe?id=5455" target="_blank">
                            <img src="{{ asset('/img/consulta_de_inversiones.jpg') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="http://portal.osce.gob.pe/osce/content/accesos-al-seace" target="_blank">
                            <img src="{{ asset('/img/seace.jpg') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="http://www.sunat.gob.pe/cl-ti-itmrconsruc/FrameCriterioBusquedaMovil.jsp" target="_blank">
                            <img src="{{ asset('/img/sunat.jpg') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="https://www2.sbs.gob.pe/afiliados/paginas/consulta.aspx" target="_blank">
                            <img src="{{ asset('/img/sbs.png') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="https://ofi5.mef.gob.pe/inviertePub/ConsultaPublica/ConsultaAvanzada" target="_blank">
                            <img src="{{ asset('/img/banco_de_inversiones.jpg') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="https://municipioaldia.com/" target="_blank">
                            <img src="{{ asset('/img/municipio-dia.png') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="http://www.sisfoh.gob.pe/" target="_blank">
                            <img src="{{ asset('/img/sisfoh.png') }}" alt="">
                        </a>
                    </div>
                    <div>
                        <a href="https://www.gob.pe/mtpe" target="_blank">
                            <img src="{{ asset('/img/mintra.png') }}" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container -->
@endsection
 
@section('custom-scripts')

<script type="text/javascript">
    new Vue({
        el: '#vuePublicacion',
        delimiters: ['${','}'],
        data: {
            release: [],
            currentRelease: {},
            formData: {},
            newFile: '',
            newRelease: {'relTitle':null, 'relDesc': null, 'relDate': null, 'relFile': '', 'relShow': true, 'relAuth': null},
            comments: []
        },
        mounted: function () {
            this.getReleases();
        },
        methods: {
            getReleases: function () {
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
                        $('#mdlNuevaPub').modal('hide');
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },

            getRelease: function (id){
                let url = 'release/' + id + '/edit';
                axios.get(url)
                    .then(response => {
                        this.currentRelease = response.data.publicacion;
                        $('#mdlEditPub').modal('show');
                        $('#txtContenidoEdit').summernote('code',this.currentRelease.pubDescripcion);
                    })
                    .catch(err => {
                        console.log(err);
                    });
                
            },

            updtRelease: function(){

                this.currentRelease.pubDescripcion = $('#txtContenidoEdit').val()
                this.formData = new FormData();
                this.formData.append('datapub', JSON.stringify(this.currentRelease));
                this.formData.append('file', this.newFile);

                let url = 'release/' + this.currentRelease.pubId + '/update';
                axios.post(url, this.formData, { headers: { 'Content-Type': 'multipart/form-data' } })
                    .then(response => {
                        this.getReleases();
                        $('#mdlEditPub').modal('hide');
                        alert(response.data.msg);
                    })
                    .catch(err => {
                        console.log(err);
                    });
            },

            delRelease: function(id){   
                const ok = confirm('¿Está seguro de eliminar?');
                if(!ok)
                    return;

                let url = 'release/' + id + '/remove';
                axios.delete(url)
                    .then(response => {
                        this.getReleases();
                    })
                    .catch(err => {
                        console.log(err);
                    });

            },

            addComment: function(id){
                console.log(id);
                console.log(this.comments[id]);
                let url = 'comment/' + id + '/add';
                axios.post(url, {'msg': this.comments[id]})
                    .then(response => {
                        this.getReleases();
                        this.comments[id] = '';
                    })
                    .catch(err => {
                        console.log(err);
                    })
            },

            onFileChange(e){
                let file = e.target.files || e.dataTransfer.files;
                if(!file.length)
                    return;
                this.newFile = file[0];
            }
        }

    });


    $('#calendar').fullCalendar({
        theme: 'bootstrap4',
        editable: true,
        /*eventRender: function(event, element, view) {
            if(event.isLast=='false')
                return $('<div style="border-bottom:1px dotted">' + event.title + '</div>');
            else
                return $('<div style="border-bottom:2px solid">' + event.title + '</div>');
        },*/
        eventRender: function(event, element, view){
            if(event.hnat){
                element.addClass('fc-national-holiday');
            }
            else if(event.type === 3){
                element.addClass('fc-birthday');
            }

            if(event.imageurl){
                element.find('div.fc-content').prepend("<img src='" + event.imageurl +"' width='32' height='32'>");
            }
        },
        eventSources: [
            {
                url: 'load/eventos'
            }
        ],
        selectable: true,
        selectHelper: true
    });

    $('#txtContenido').summernote({
        placeholder: 'Descripción de la publicación',
        tabsize: 2,
        height: 200,
        lang: 'es-ES'
    })

    $('#txtContenidoEdit').summernote({
        placeholder: 'Descripción de la publicación',
        tabsize: 2,
        height: 200,
        lang: 'es-ES'
    })

    $('.net-carousel').slick({ 
        slidesToShow: 6, 
        slidesToScroll: 1, 
        autoplay: true, 
        autoplaySpeed: 2000 
    });

</script>
@endsection