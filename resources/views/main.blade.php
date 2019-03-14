@extends('layout')
@section('main-content')

<!-- Portfolio Item Row -->
<div class="row">
    <div class="col-md-9 pr-0" id="vuePublicacion">
        <div>
            <section id="fancyTabWidget" class="tabs t-tabs">
                <ul class="nav nav-tabs fancyTabs" role="tablist">
                    <li class="nav-item fancyTab1">
                        <a class="nav-link fancyTab active" id="tab0" href="#tabBody0" role="tab" aria-controls="tabBody0" aria-selected="true" data-toggle="tab" tabindex="0">
                            <span class="fa fa-home"></span><span class="hidden-xs">INICIO</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                    
                    <li class="nav-item fancyTab1">
                        <a class="nav-link fancyTab" id="tab1" href="#tabBody1" role="tab" aria-controls="tabBody1" aria-selected="true" data-toggle="tab" tabindex="0">
                            <span class="fa fa-file"></span><span class="hidden-xs">ARCHIVOS</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                    
                    <li class="nav-item fancyTab1">
                        <a class="nav-link fancyTab" id="tab2" href="#tabBody2" role="tab" aria-controls="tabBody2" aria-selected="true" data-toggle="tab" tabindex="0">
                            <span class="fa fa-bicycle"></span><span class="hidden-xs">UTILITARIOS</span></a>
                        <div class="whiteBlock"></div>
                    </li>
                    
                    <li class="nav-item fancyTab1">
                        <a class="nav-link fancyTab" id="tab3" href="#tabBody3" role="tab" aria-controls="tabBody3" aria-selected="true" data-toggle="tab" tabindex="0">
                            <span class="fa fa-tasks"></span><span class="hidden-xs">SERVICIOS</span></a>
                        <div class="whiteBlock"></div>
                    </li> 
                </ul>
                <div id="myTabContent" class="tab-content fancyTabContent pt-1" aria-live="polite">
                    <div class="tab-pane fade show active" id="tabBody0" role="tabpanel" aria-labelledby="tab0" aria-hidden="false" tabindex="0">
                        <div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-deck">
                                        <div class="card bg-primary text-white text-center p-1">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img class="img-thumbnail" src="{{ asset('img/logismart.png') }}" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-0">
                                                        <blockquote class="blockquote mb-0">
                                                            <footer class="blockquote-footer text-white">
                                                                <small>
                                                                Sistema de Logística <cite title="Source Title">logiSmart</cite>
                                                                </small>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-warning text-white text-center p-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img class="img-thumbnail" src="{{ asset('img/correo.png') }}" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-0">
                                                        <blockquote class="blockquote mb-0">
                                                            <footer class="blockquote-footer text-white">
                                                                <small>
                                                                Correo Institucional <cite title="Source Title">IONOS</cite>
                                                                </small>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-success text-white text-center p-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img class="img-thumbnail" src="{{ asset('img/TAREOS.png') }}" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-0">
                                                        <blockquote class="blockquote mb-0">
                                                            <footer class="blockquote-footer text-white">
                                                                <small>
                                                                Tareos de Personal <cite title="Source Title">SIACAP</cite>
                                                                </small>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card bg-danger text-white text-center p-3">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    <img class="img-thumbnail" src="{{ asset('img/TAREOS.png') }}" alt="">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-0">
                                                        <blockquote class="blockquote mb-0">
                                                            <footer class="blockquote-footer text-white">
                                                                <small>
                                                                Tareos de Personal <cite title="Source Title">SIACAP</cite>
                                                                </small>
                                                            </footer>
                                                        </blockquote>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="net-box  mt-1">
                                        <div class="net-box-header" style="text-align: center;">
                                            <div class="net-box-title">
                                                PRÓXIMOS EVENTOS
                                            </div>
                                        </div>
                                    </div>
                                    <div class="net-box-body box-releases" id="scroll-style">
                                    </div>
                                </div>
                                <div class="col-md-8">
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
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody1" role="tabpanel" aria-labelledby="tab1" aria-hidden="true" tabindex="0">
                        <div class="row">
                                
                                <div class="col-md-12">
                                    <h2>This is the content of tab two.</h2>
                                    <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>
                                    
                                </div>
                            </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody2" role="tabpanel" aria-labelledby="tab2" aria-hidden="true" tabindex="0">
                        <div class="row">
                            <div class="col-md-12">
    
                                <h2>This is the content of tab six.</h2>
                                <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>
                                
                                
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="tab-pane  fade" id="tabBody3" role="tabpanel" aria-labelledby="tab3" aria-hidden="true" tabindex="0">
                    <div class="row">
                        <div class="col-md-12">
                                    <h2>This is the content of tab four.</h2>
                                    <p>This field is a rich HTML field with a content editor like others used in Sitefinity. It accepts images, video, tables, text, etc. Street art polaroid microdosing la croix taxidermy. Jean shorts kinfolk distillery lumbersexual pinterest XOXO semiotics. Tilde meggings asymmetrical literally pork belly, heirloom food truck YOLO. Meh echo park lyft typewriter. </p>
                                    
                                </div>
                            </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="col-md-3 pl-1" style="text-align: center;">
        <div class="row">
            <div class="col-md-12">
                <div class="net-box">
                    <div class="net-box-header">
                        <div class="net-box-title">FECHA Y HORA ACTUAL</div>
                    </div>
                    <div class="net-box-body">
                        <div class="card">
                            <div class="card-body">
                                <h2 class="card-title">
                                    <span id="liveclock"></span>
                                </h2>
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>
                        </div>
                    </div>
                    <div class="net-box-body">
                        <div id="calendar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
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
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <div class="net-box">
            <div id="blogCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#blogCarousel" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="http://ofi5.mef.gob.pe/sosem2/" target="_blank">
                                    <img src="{{ asset('/img/SSI.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="https://www.mef.gob.pe/es/aplicativos-invierte-pe?id=5455" target="_blank">
                                    <img src="{{ asset('/img/consulta_de_inversiones.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="http://portal.osce.gob.pe/osce/content/accesos-al-seace" target="_blank">
                                    <img src="{{ asset('/img/seace.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="http://www.sunat.gob.pe/cl-ti-itmrconsruc/FrameCriterioBusquedaMovil.jsp" target="_blank">
                                    <img src="{{ asset('/img/sunat.jpg') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-3">
                                <a href="https://www2.sbs.gob.pe/afiliados/paginas/consulta.aspx" target="_blank">
                                    <img src="{{ asset('/img/sbs.png') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="https://ofi5.mef.gob.pe/inviertePub/ConsultaPublica/ConsultaAvanzada" target="_blank">
                                    <img src="{{ asset('/img/banco_de_inversiones.jpg') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="https://municipioaldia.com/" target="_blank">
                                    <img src="{{ asset('/img/municipio-dia.png') }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="http://www.sisfoh.gob.pe/" target="_blank">
                                    <img src="{{ asset('/img/sisfoh.png') }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Prev</span>
                </a>
                <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
    </div>
</div>

<!-- /.row -->
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