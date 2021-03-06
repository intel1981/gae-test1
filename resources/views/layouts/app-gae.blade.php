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

    <title>Gestion y Administración de Escuelas :: G.A.E</title>
</head>
<body>

<main class="mt-4">
    @yield('content')
</main>

<!-- jQuery.js -->
<script src="{{ asset('js/jquery-3.3.1.js') }}" ></script>
<!-- Popper.js -->
<script src="{{ asset('js/popper-1.14.7.js') }}" ></script>
<!-- Bootstrap.js -->
<script src="{{ asset('js/bootstrap-4.3.1.js') }}" ></script>
</body>
</html>
