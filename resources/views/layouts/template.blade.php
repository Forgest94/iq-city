<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Умный город</title>

    <!-- Styles -->
    <link rel="stylesheet" href="/css/selectric.css">
    <link rel="stylesheet" href="/css/style.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,500;0,600;1,500&display=swap"
          rel="stylesheet">

</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>

<script src="/js/jquery-3.5.1.min.js"></script>
<script src="/js/jquery.selectric.js"></script>
<script src="/js/script.js"></script>

</html>
