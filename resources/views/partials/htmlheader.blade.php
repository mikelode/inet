<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Symva') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('/plugins/slick181/slick/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/plugins/slick181/slick/slick-theme.css') }}" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/plugins/fullcalendar-3.9.0/fullcalendar.min.css') }}" type="text/css">

    <link rel="stylesheet" href="{{ asset('plugins/bootstrap-4.1.0/dist/css/bootstrap.min.css') }}" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/portfolio-item.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-5.0.7/css/fontawesome-all.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/plugins/select2/select2.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('/plugins/jquery-ui/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/plugins/jqueryui-editable/css/jqueryui-editable.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/plugins/summernote/dist/summernote-bs4.css') }}" type="text/css">


    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>