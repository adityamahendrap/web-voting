<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="position-relative w-100 d-flex align-items-center justify-content-center" style="height: 100vh; overflow:hidden; background: black">
        <main class="text-white" style="background: #2C0101; padding: 3rem; border: #C90000 3px solid">
            @yield('content')
        </main>

        <div class="fixed-top" style="left: 200px; top: 20px">
            <img width="150" src="img/logo-musma.png" alt="Ukiran">
        </div>

        <div class="position-absolute" style="rotate:45deg; left:-55px; bottom:-18px">
            <img width="200" src="img/ukiran.png" alt="Ukiran">
        </div>
        <div class="position-absolute" style="rotate:-45deg; right:-55px; bottom:-18px">
            <img width="200" src="img/ukiran.png" alt="Ukiran">
        </div>
        <div class="position-absolute" style="rotate:135deg; left:-55px; top:-18px">
            <img width="200" src="img/ukiran.png" alt="Ukiran">
        </div>
        <div class="position-absolute" style="rotate:-135deg; right:-55px; top:-18px">
            <img width="200" src="img/ukiran.png" alt="Ukiran">
        </div>
    </div>


    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/jquery.appear/jquery.appear.min.js"></script>
    <script src="/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="/vendor/jquery.cookie/jquery.cookie.min.js"></script>
    <script>

    </script>
</body>

</html>
