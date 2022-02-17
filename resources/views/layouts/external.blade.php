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
    @if(Request::route()->getName() != 'main-page')
        @hasSection('og_type')
            @include('blocks.open-graph')
        @endif
    @endif
</head>
<body>
@include('blocks.counters-body-top')
@include('blocks.ru_site.header')
@if(Request::route()->getName() != 'main-page')
    @include('blocks.ru_site.breadcrumb')
@endif
@yield('content')
@if(Request::route()->getName() != 'main-page')
    @include('blocks.ru_site.share')
@endif
@include('blocks.ru_site.subscribe')
@include('blocks.ru_site.footer')
@include('blocks.js')

</body>
</html>
