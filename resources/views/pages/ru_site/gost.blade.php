@extends('layouts.external')
@section('description', $data[0]->standard_title. '. '.$h1  ?? 'Нет данных')
@section('title', $h1. ' - '. $data[0]->standard_title ?? 'Нет данных')

@section('og_type', 'article')
@section('og_locale', 'ru_RU')
@section('og_title', $h1. ' - '. $data[0]->standard_title)
@section('og_description', $data[0]->standard_title. '. '.$h1)
@section('og_url_content', URL::to($current_url))
@section('og_src_image', URL::to('/source/images/gost.jpeg'))
@section('og_image_width', '900')
@section('og_image_height', '900')

@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="col-md-12">
                    <div class="block bg-light rounded">
                        <article>
                            <h1>{{ $h1 }}</h1>
                                <p>{{ $h1 }} - {{ $data[0]->standard_title }}</p>
                                <p><a href="{{ route('main-page') }}/source/gosts/{{ $data[0]->standard_number }}.pdf">Скачать стандарт</a></p>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
