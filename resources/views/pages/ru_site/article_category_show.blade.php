@extends('layouts.external')
@section('description', $description ?? 'Нет данных')
@section('title', $title ?? 'Нет данных')
@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="">
                    <div class="block bg-light rounded">
                        <article>
                            <h1>{{ $h1 ?? 'Нет данных' }}</h1>
                            <div class="container">
                                <div class="row justify-content-start">
                                    @foreach($category_articles as $article)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4">
                                        <article class="card mb-3 sprav-header">
                                            <img src="{{ Storage::url($article->thumb_img_logo_article) }}">
                                            <header class="card-body">
                                                <p><a href="{{ route('article_spravochnik.show', ['slug_category' => $article->slug_category,
                                                'slug_article' => $article->slug_article]) }}">{{ $article->h1_article }}</a></p>
                                            </header>
                                            <footer>
                                                <div class="btn-read mb-3 d-flex">
                                                    <svg viewBox="0 0 22 22" width="15" height="24">
                                                        <rect width="100" height="1"></rect>
                                                        <rect y="5" width="100" height="1"></rect>
                                                        <rect y="10" width="100" height="1"></rect>
                                                        <rect y="15" width="100" height="1"></rect>
                                                    </svg>
                                                    <a href="{{ route('article_spravochnik.show', ['slug_category' => $article->slug_category,
                                                'slug_article' => $article->slug_article]) }}" class="ms-2">Читать</a></div>
                                            </footer>
                                        </article>
                                    </div>
                                    @endforeach
                                </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
