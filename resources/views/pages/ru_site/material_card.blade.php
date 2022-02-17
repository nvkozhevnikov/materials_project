@extends('layouts.external')
@section('description', $material->description ?? 'Нет данных')
@section('title', $material->title)
@section('og_type', 'article')
@section('og_locale', 'ru_RU')
@section('og_title', $material->h1)
@section('og_description', $material->description)
@section('og_url_content', URL::to($current_url))
@section('og_src_image', URL::to('/source/images/stal.jpeg'))
@section('og_image_width', '900')
@section('og_image_height', '900')
@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="col-md-12">
                    <div class="block bg-light rounded">
                        <div class="material-card">
                            <article>
                                @include('blocks.ru_site.material_card.h1')
                                @include('blocks.ru_site.material_card.main_properties')
                                @include('blocks.ru_site.material_card.faq')
                                @include('blocks.ru_site.material_card.him_sostav')
                                @include('blocks.ru_site.material_card.meh_properties')
                                @include('blocks.ru_site.material_card.tverdost')
                                @include('blocks.ru_site.material_card.fiz_properties')
                                @include('blocks.ru_site.material_card.temps_kritich_tochek')
                                @include('blocks.ru_site.material_card.tehnolog_properties')
                                @include('blocks.ru_site.material_card.metallografy')
                                @include('blocks.ru_site.material_card.international_analogs')
                                @include('blocks.ru_site.material_card.vidy_postavki')
                                @include('blocks.ru_site.material_card.source_information')
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
