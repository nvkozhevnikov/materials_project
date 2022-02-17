@extends('layouts.external')
@section('description', $description ?? 'Нет данных')
@section('title', $title ?? 'Нет данных')
@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div>
                    <div class="block bg-light rounded">
                        <article>
                            <h1>{{ $h1 ?? 'Нет данных' }}</h1>
                            <div class="container">
{{--                                <div class="row justify-content-start">--}}
{{--                                    <div class="col-md-12 col-lg-9 img-logo-sprav">--}}
{{--                                        <article class="card mb-3 article-set" style="background-image: url('/source/images/1-logo.jpeg');">--}}

{{--                                                <p class="title-img-logo"><a href="#jbwje" style="color: white;">Выбор материала в зависимости от эксплуатации--}}
{{--                                                        оборудоания в промышленных условиях своими руками</a></p>--}}

{{--                                                <div class="btn-logo mb-3 d-flex">--}}
{{--                                                    <svg viewBox="0 0 22 22" width="15" height="24" class="svg-icon">--}}
{{--                                                        <rect width="100" height="1"></rect>--}}
{{--                                                        <rect y="5" width="100" height="1"></rect>--}}
{{--                                                        <rect y="10" width="100" height="1"></rect>--}}
{{--                                                        <rect y="15" width="100" height="1"></rect>--}}
{{--                                                    </svg>--}}
{{--                                                    <a href="#jbwje" class="ms-2 btn-logo-a">Читать</a></div>--}}

{{--                                        </article>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12 col-lg-3 mb-3">--}}
{{--                                            <article class="card mb-3 sprav-header">--}}
{{--                                                <img src="/storage/thumb_logo_articles/ferrit.jpg" alt="">--}}
{{--                                                <header class="card-body">--}}
{{--                                                    <p><a href="/ru/spravochnik/materialovedenie/ferrit">Феррит</a></p>--}}
{{--                                                </header>--}}
{{--                                                <footer>--}}
{{--                                                    <div class="btn-read mb-3 d-flex">--}}
{{--                                                        <svg viewBox="0 0 22 22" width="15" height="24">--}}
{{--                                                            <rect width="100" height="1"></rect>--}}
{{--                                                            <rect y="5" width="100" height="1"></rect>--}}
{{--                                                            <rect y="10" width="100" height="1"></rect>--}}
{{--                                                            <rect y="15" width="100" height="1"></rect>--}}
{{--                                                        </svg>--}}
{{--                                                        <a href="/ru/spravochnik/materialovedenie/ferrit" class="ms-2">Читать</a></div>--}}

{{--                                                </footer>--}}
{{--                                            </article>--}}
{{--                                        </div>--}}
{{--                                </div>--}}
                                <div class="row justify-content-start">
                                @foreach($articles as $article)
                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4">
                                        <article class="card mb-3 sprav-header">
                                            <img src="{{ Storage::url($article->thumb_img_logo_article) }}" @if($loop->index > 7)loading="lazy"@endif>
                                            <header class="card-body">
                                                <p><a href="{{ route('article_spravochnik.show', ['slug_category' => $article->slug_category,
                                                'slug_article' => $article->slug]) }}">{{ $article->h1 }}</a></p>
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
                                                'slug_article' => $article->slug]) }}" class="ms-2">Читать</a></div>
                                            </footer>
                                        </article>
                                    </div>
                            @endforeach
                                </div>
                            {{ $articles->links('vendor.pagination.bootstrap-4') }}

{{--                                <div class="row justify-content-start">--}}
{{--                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4">--}}
{{--                                        <article class="card mb-3 sprav-header">--}}
{{--                                            <img src="/source/images/1.jpeg" alt="">--}}
{{--                                            <header class="card-body">--}}
{{--                                                <p><a href="#jbwje">Выбор материала в зависимости от эксплуатации--}}
{{--                                                        оборудоания в промышленных условиях своими руками</a></p>--}}
{{--                                            </header>--}}
{{--                                            <footer>--}}
{{--                                                <div class="btn-read mb-3 d-flex">--}}
{{--                                                    <svg viewBox="0 0 22 22" width="15" height="24">--}}
{{--                                                        <rect width="100" height="1"></rect>--}}
{{--                                                        <rect y="5" width="100" height="1"></rect>--}}
{{--                                                        <rect y="10" width="100" height="1"></rect>--}}
{{--                                                        <rect y="15" width="100" height="1"></rect>--}}
{{--                                                    </svg>--}}
{{--                                                    <a href="#jbwje" class="ms-2">Читать</a></div>--}}

{{--                                            </footer>--}}
{{--                                        </article>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4">--}}
{{--                                        <article class="card mb-3 sprav-header">--}}
{{--                                            <img src="/source/images/2.jpeg" alt="">--}}
{{--                                            <header class="card-body">--}}
{{--                                                <p><a href="#jbwje">Нанотрубки в дикой природе</a></p>--}}
{{--                                            </header>--}}
{{--                                            <footer>--}}
{{--                                                <div class="btn-read mb-3 d-flex">--}}
{{--                                                    <svg viewBox="0 0 22 22" width="15" height="24">--}}
{{--                                                        <rect width="100" height="1"></rect>--}}
{{--                                                        <rect y="5" width="100" height="1"></rect>--}}
{{--                                                        <rect y="10" width="100" height="1"></rect>--}}
{{--                                                        <rect y="15" width="100" height="1"></rect>--}}
{{--                                                    </svg>--}}
{{--                                                    <a href="#jbwje" class="ms-2">Читать</a></div>--}}

{{--                                            </footer>--}}
{{--                                        </article>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4">--}}
{{--                                        <article class="card mb-3 sprav-header">--}}
{{--                                            <img src="/source/images/3.png" alt="">--}}
{{--                                            <header class="card-body">--}}
{{--                                                <p><a href="#jbwje">Выбор материала в зависимости от эксплуатации--}}
{{--                                                        оборудоания в промышленных условиях своими руками с дрелью и--}}
{{--                                                        болгаркой</a></p>--}}
{{--                                            </header>--}}
{{--                                            <footer>--}}
{{--                                                <div class="btn-read mb-3 d-flex">--}}
{{--                                                    <svg viewBox="0 0 22 22" width="15" height="24">--}}
{{--                                                        <rect width="100" height="1"></rect>--}}
{{--                                                        <rect y="5" width="100" height="1"></rect>--}}
{{--                                                        <rect y="10" width="100" height="1"></rect>--}}
{{--                                                        <rect y="15" width="100" height="1"></rect>--}}
{{--                                                    </svg>--}}
{{--                                                    <a href="#jbwje" class="ms-2">Читать</a></div>--}}

{{--                                            </footer>--}}
{{--                                        </article>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-12 mb-4">--}}
{{--                                        <div class="card">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <h5 class="card-title">Special title treatment</h5>--}}
{{--                                                <p class="card-text">With supporting text below as a natural lead-in to--}}
{{--                                                    additional content.</p>--}}
{{--                                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="card mb-4">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <h5 class="card-title">Special title treatment</h5>--}}
{{--                                                <p class="card-text">With supporting text below as a natural lead-in to--}}
{{--                                                    additional content.</p>--}}
{{--                                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-12">--}}
{{--                                        <div class="card mb-4">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <h5 class="card-title">Special title treatment</h5>--}}
{{--                                                <p class="card-text">With supporting text below as a natural lead-in to--}}
{{--                                                    additional content.</p>--}}
{{--                                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-4">--}}
{{--                                        <div class="card mb-4">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <h5 class="card-title">Special title treatment</h5>--}}
{{--                                                <p class="card-text">With supporting text below as a natural lead-in to--}}
{{--                                                    additional content.</p>--}}
{{--                                                <a href="#" class="btn btn-primary">Go somewhere</a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
