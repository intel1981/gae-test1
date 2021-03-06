<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.4.3.1.css') }}">
    <!-- Font Awesome CSS 5.7.2 -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome/css/all.css') }}">
    <!-- Sweetalert2 -->
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">

    <title>Gestion y Administración de Escuelas :: G.A.E</title>

    <style type="text/css">
        body {
            padding-top: 4rem;
        }

        .bg-dark {
            background-color: #1565C0 !important;
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #ffffff;
        }
        .dataTables_info { font-size: 12px; font-weight: bold;}
        .dataTables_length { font-size: 12px;  }
        .dataTables_filter { font-size: 12px; }
        .pagination { font-size: 13px; }
    </style>

</head>
<body class="bg-light">

@include('layouts.navigation-bar')

<main role="main" class="container">
    @yield('content')
</main>

<!-- jQuery.js -->
<script src="{{ asset('js/jquery-3.3.1.js') }}" ></script>
<!-- Popper.js -->
<script src="{{ asset('js/popper-1.14.7.js') }}" ></script>
<!-- Bootstrap.js -->
<script src="{{ asset('js/bootstrap-4.3.1.js') }}" ></script>
<!-- DataTables -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}" ></script>
<!-- Sweetalert2.js -->
<script src="{{ asset('js/sweetalert-v8.3.0.js') }}"></script>

@yield('module_javascript')
</body>
</html>

