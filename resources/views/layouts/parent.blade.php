<!-- Template for page not use footer -->
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
    <body class="bg1">
        <div id="app">
            <!-- Navbar -->
            @include('layouts.component.navibar')
            <main class="py-4 bg1">
                <div class="container-fluid">
                    <div class="row justify-content-around mt-3">
                        <table class="bg4 tx1 rounded sans">
                            <tr>
                                <th class="tab text-center border-bottom"><h4>Navigation</h4></th>
                            </tr>
                            <tr>
                                <td class="tab text-center"><a href="/" class="tx1 change">Homepage</a></td>
                            </tr>
                            <tr>
                                <td class="tab text-center"><a href="/threadList" class="tx1 change">Thread List</a></td>
                            </tr>
                            <tr>
                                <td class="tab text-center"><a href="/showUser" class="tx1 change">Show User</a></td>
                            </tr>
                        </table>
                    @yield('content')
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
