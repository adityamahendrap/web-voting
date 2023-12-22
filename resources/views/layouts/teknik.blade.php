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
    <div id="app" class="position-relative w-100 d-flex align-items-center justify-content-center" style="min-height: 100vh;overflow-x:hidden; background: black; padding:100px 0 60px 0px;">
        <main class="text-white glassmorph main-container">
            @yield('content')
        </main>

        <a href="/" class="" style="position:fixed;left:50%; transform:translateX(-50%);top: 20px; z-index:9999;">
            <img width="120" src="img/logo-musma.png" alt="Ukiran">
        </a>

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


<style>
.glassmorph {
    background: rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.125);
    border-radius: 0.5rem;
}

.main-container {
    padding: 3rem 2rem; border: #C90000 2px solid;max-height:max-content;position:relative;z-index:6;
}

@media screen and (max-width: 516px) {
    .main-container {
        border:none;
    }
}
</style>
