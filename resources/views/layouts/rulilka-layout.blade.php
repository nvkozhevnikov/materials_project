<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    @include('blocks.css')
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Раздел администрирования сайта</title>
</head>
<body>
@yield('content')
@include('blocks.js')
</body>
</html>