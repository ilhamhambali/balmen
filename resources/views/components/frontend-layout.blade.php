<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Balmen - {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=montserrat:700|poppins:400,500,600&display=swap" rel="stylesheet" />

    <!-- CSS dari Template -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />

    <!-- PERUBAHAN: Memuat file tema baru -->
    <link rel="stylesheet" href="{{ asset('assets/css/balmen-theme.css') }}" type="text/css" />
</head>

<body>
    @include('layouts.partials.frontend-header')

    <main>
        {{ $slot }}
    </main>

    @include('layouts.partials.frontend-footer')

    <!-- JavaScript dari Template -->
    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>

    @stack('scripts')
</body>

</html>
