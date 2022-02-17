@extends('layouts.internal')
@section('title', $title)
@section('content')
    @if(isset($route) && isset($id) && isset($material_name))
        <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render($route, $material_name, $id) }}
        </nav>
        <div class="container">
            <div class="alert alert-success h2 my-5">{{ $title }}</div>
        </div>
    @elseif(isset($route) && isset($id))
        <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render($route, $id) }}
        </nav>
        <div class="container">
            <div class="alert alert-success h2 my-5">{{ $title }}</div>
        </div>
    @elseif(isset($second_path) && isset($route))
        <div class="container">
            <div class="alert alert-success h2 my-5">{{ $title }}</div>
        </div>
    @elseif(isset($route))
        <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render($route) }}
        </nav>
        <div class="container">
            <div class="alert alert-success h2 my-5">{{ $title }}</div>
        </div>
    @elseif(isset($material_check))
        <div class="container">
            <div class="mb-4 link-primary"><a href="{{ route('article.add') }}">Создать новую статью</a></div>
            <div class="alert alert-success h2 my-5">{{ $title }}</div>
        </div>
    @else
        <div class="container">
            <div class="alert alert-success h2 my-5">Неизвестная ошибка! Обязательно сообщите о ней администратору</div>
        </div>
    @endif

@stop
