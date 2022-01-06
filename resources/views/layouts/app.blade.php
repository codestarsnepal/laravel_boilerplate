<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicons -->
    <link href="{{ asset('frontend/img/wireless.png') }}" rel="icon">
    <link href="{{ asset('frontend/img/wireless.png.png') }}" rel="apple-touch-icon">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
    @yield('style')
    <style>
        .dataTables_wrapper .dataTables_length select {
            width: 70px;
        }

        .alert {
            position: absolute;
            padding: 5px 20px;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            z-index: 5544;
            top: 88px;
            right: 2px;
        }

    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @auth
            @if (auth()->user()->isAdmin())
                @include('layouts.admin.admin-navigation')
            @elseif (auth()->user()->isSuperAdmin())
                @include('layouts.super_admin.super-admin-navigation')
            @elseif (auth()->user()->isStaff())
                @include('layouts.staff.staff-navigation')

            @endif
        @else
            @include('layouts.navigation')
        @endauth
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @elseif (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/ckeditor.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable();
        $('[data-toggle="tooltip"]').tooltip()
        $(".alert").delay(2000).slideUp(1000);
    });
</script>
@yield('script')

</html>
