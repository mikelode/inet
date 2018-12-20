<!-- REQUIRED JS SCRIPTS -->
<script src="{{ asset('/plugins/fullcalendar-3.9.0/lib/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jquery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/fullcalendar-3.9.0/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/fullcalendar-3.9.0/locale/es-us.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/summernote/dist/popper.min.js') }}"></script>
<script src="{{ asset('/plugins/bootstrap-4.1.0/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/DataTables-1.10.16/js/jquery.dataTables.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/datatables/Buttons-1.5.1/js/dataTables.buttons.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/select2/select2.full.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/jquery-ui/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/jqueryui-editable/js/jqueryui-editable.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/summernote/dist/summernote-bs4.js') }}" type="text/javascript"></script>
<script src="{{ asset('/plugins/summernote/lang/summernote-es-ES.js') }}" type="text/javascript"></script>

<script src="{{ asset('/plugins/slick181/slick/slick.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/vue.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/js/axios.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('/js/inet.js') }}" type="text/javascript"></script>

<script type="text/javascript">
	$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var screen = $('#loading-screen');
	configureLoadingScreen(screen);

	function configureLoadingScreen(screen){
		$(document)
			.ajaxStart(function() {
				screen.fadeIn();
			})
			.ajaxStop(function() {
				screen.fadeOut();
			});
	}

</script>