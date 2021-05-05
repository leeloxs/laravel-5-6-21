<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Donation') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('backend') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('backend') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('backend') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- MultiSelect -->
        <link rel="stylesheet" href="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006288/BBBootstrap/choices.min.css?version=7.0.0">
        @stack('css')
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('backend') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <!-- DataTable -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap5.min.css"/>
        <!-- Default styling for DataTable -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTable.css') }}">

    </head>
    <body class="{{ $class ?? '' }}">
{{--        @auth()--}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
{{--            @can('management')--}}
               @include('admin.layouts.navbars.sidebar')
{{--            @endcan--}}
{{--        @endauth--}}

        <div class="main-content">
{{--            @auth--}}
                @include('admin.layouts.navbars.navbar')
{{--            @endauth--}}
            @yield('content')
        </div>


        <script src="{{ asset('backend') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('backend') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <!-- MultiSelect -->
        <script src="https://res.cloudinary.com/dxfq3iotg/raw/upload/v1569006273/BBBootstrap/choices.min.js?version=7.0.0"></script>

        </script>
        @stack('js')
        <!-- Argon JS -->
        <script src="{{ asset('backend') }}/js/argon.js?v=1.0.0"></script>
        <!-- DataTable -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

        <!-- Default settings for DataTable -->
        <script src="{{ asset('js/dataTable.js') }}"></script>
    </body>
</html>
