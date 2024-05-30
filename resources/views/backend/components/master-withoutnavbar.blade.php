<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title>@stack('title') | ABU - Yönetim Sistemleri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Mpanel - Yönetim Sistemleri" name="description" />
    <meta content="murattemizel" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/my-image/favicon.png')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('backend.components._partials._head-css')
</head>

<body>
    @yield('content')

    @include('backend.components._partials._vendor-scripts')
</body>
</html>
