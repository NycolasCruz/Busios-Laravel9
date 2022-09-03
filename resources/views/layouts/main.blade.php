<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Busios - Gerência de Lojas</title>

        {{-- bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

        {{-- favicon --}}
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

        {{-- fontawesome --}}
        <script src="https://kit.fontawesome.com/36eec2ffe7.js" crossorigin="anonymous"></script>

        {{-- css --}}
        <link rel="stylesheet" href="/css/styles.css">
    </head>
    <body>
        @yield('dashboard')
        @yield('confirm-password')
        @yield('forgot-password')
        @yield('login')
        @yield('register')
        @yield('reset-password')
        @yield('verify-email')

        {{-- bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>