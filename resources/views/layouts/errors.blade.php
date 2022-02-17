<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">
    @include('blocks.css')
    <link rel="icon" href="{{ route('main-page') }}/img/favicon.ico" type="image/x-icon">
    <title>@yield('title')</title>
    @include('blocks.counters-head')
</head>
<body>
@include('blocks.counters-body-top')
@include('blocks.ru_site.header')
@include('blocks.ru_site.breadcrumb')
@yield('content')
@include('blocks.ru_site.footer')
</body>
</html>
