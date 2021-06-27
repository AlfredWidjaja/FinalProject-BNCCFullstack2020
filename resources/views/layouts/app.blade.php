<!-- Template for page using footer -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Testing For Now</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link rel="stylesheet" href="{{asset('/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('/css/style.css')}}">

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Source+Serif+Pro&display=swap" rel="stylesheet">

    </head>
    <body>
        <div id="app">

            <!-- Navbar -->
            @include('layouts.component.navibar')

            <main class="py-4 bg1">
                @yield('content')
            </main>

            <!-- Footer -->
            @include('layouts.component.footer')

        </div>
    </body>
</html>
