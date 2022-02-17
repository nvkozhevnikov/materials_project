@extends('layouts.external')
@section('description', $article[0]->description ?? 'Нет данных')
@section('title', $article[0]->title ?? 'Нет данных')

@section('og_type', 'article')
@section('og_locale', 'ru_RU')
@section('og_title', $article[0]->title)
@section('og_description', $article[0]->description)
@if ($article[0]->created_at)
    @section('og_article_published_time', date(DATE_ISO8601, strtotime($article[0]->created_at)))
@endif
@if ($article[0]->updated_at)
    @section('og_article_modified_time', date(DATE_ISO8601, strtotime($article[0]->updated_at)))
@endif
@section('og_url_content', URL::to($current_url))
@section('og_src_image', URL::to('/source/images/stali-1200-627.jpeg'))
@section('og_image_width', '1200')
@section('og_image_height', '627')

@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="col-md-12">
                    <div class="block bg-light rounded">
                        <div class="material-card">
                            <article>
                                <div class="article">
                                    <h1>{{ $article[0]->h1 }}</h1>
                                    <p>{!! $article[0]->post_description !!}</p>
                                    @include('blocks.ru_site.contents_of_article')
                                    <div class="article-tags"><span class="tag-title">Тэги:</span> <span class="tag-item"><a href="{{ route('tag_article.show', [$article[0]->slug_tag]) }}">{{ $article[0]->tag_name }}</a></span></div>
                                    <p>{!! $article_text !!}</p>
                                </div>
                            </article>
                            @if($related_articles)
                            <nav>
                                <div class="related-articles">
                                    <h3>Похожие публикации</h3>
                                    <div class="row">
                                        @foreach($related_articles as $rel_article)
                                        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-3">
                                            <article class="card mb-3 sprav-header">
                                                <img src="{{ Storage::url($rel_article->thumb_img_logo_article) }}" class="card-img-top" loading="lazy">
                                                    <header class="card-body">
                                                        <p><a href="{{ route('article_spravochnik.show', ['slug_category' => $rel_article->slug_category,
                                                'slug_article' => $rel_article->slug]) }}">{{ $rel_article->h1 }}</a></p>
                                                    </header>
                                                    <footer>
                                                        <div class="btn-read mb-3 d-flex">
                                                            <svg viewBox="0 0 22 22" width="15" height="24">
                                                                <rect width="100" height="1"></rect>
                                                                <rect y="5" width="100" height="1"></rect>
                                                                <rect y="10" width="100" height="1"></rect>
                                                                <rect y="15" width="100" height="1"></rect>
                                                            </svg>
                                                            <a href="{{ route('article_spravochnik.show', ['slug_category' => $rel_article->slug_category,
                                                'slug_article' => $rel_article->slug]) }}" class="ms-2">Читать</a></div>
                                                    </footer>
                                            </article>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </nav>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
