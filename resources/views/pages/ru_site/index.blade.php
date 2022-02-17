@extends('layouts.external')
@section('description', $description ?? 'Нет данных')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="material-content row mb-3">
            <div class="col-md-12">
                <div class="block bg-light rounded">
                    <main>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Сборник материалов и сплавов</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Черные и цветные металлы</h6>
                                        <p class="card-text">Более 3000 материалов, поиск заменителей, иностранных
                                            аналогов.</p>
                                        <a href="{{ route('material_categories.show') }}" class="card-link link-div">Марочник</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Государственные стандарты РФ</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">ГОСТы</h6>
                                        <p class="card-text">База данных государственных стандартов и нормативной
                                            документации материалов.</p>
                                        <a href="{{ route('gost_index.show') }}" class="card-link link-div">Стандарты</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Информационные публикации</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Статьи, аналитика</h6>
                                        <p class="card-text">Подборка публикаций о технологиях и способах
                                            металлообработки.</p>
                                        <a href="{{ route('spravochnik_index.show') }}" class="card-link">Справочник</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12"><h1 class="my-3">Технологии, материалы, оборудование</h1></div>
                        <div class="row">
                            <div class="col">
                                <div class="table-responsive">
                                    <table class="table">
                                        <caption>Цены на металлы по состоянию
                                            на: {{ date('d.m.Y H:i', strtotime($material_prices[0]->date)) }}.
                                            Курс доллара ЦБ РФ на сегодня {{ str_replace('.', ',', $usd_price[0]->price) }} руб.</caption>
                                        <thead>
                                        <tr>
                                            <th>Металл</th>
                                            <th>Цена, USD</th>
                                            <th>%</th>
                                            <th>+/-</th>
                                            <th>Ед. измерения</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($material_prices as $material)
                                            <tr>
                                                <th>{{ $material->metal_name }}</th>
                                                <td>{{ str_replace('.', ',', $material->price) }}</td>
                                                <td>{{ str_replace('.', ',', $material->chng_percents) }}</td>
                                                <td>{{ str_replace('.', ',', $material->chng_absolut) }}</td>
                                                <td>{{ $material->unit }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="col-12"><h2 class="my-3">Новости компаний</h2></div>
                        <div class="row">
                            <div class="col">
                                    <ul class="news">
                                        @foreach($news as $item)
                                        <li class="mb-2"><a class="news-a" href="{{ $item['url'] }}" target="_blank" rel="noopener">
                                                <div class="news-icon" style="background-image:url({{ Storage::url('/company-favicons/' . $item['source'] .'.png') }})"></div>
                                                <span>{{ $item['title'] }}</span></a></li>
                                        @endforeach
                                    </ul>
                            </div>
                        </div>









                        {{--                    <div class="row justify-content-start">--}}
                        {{--                        <div class="col-md-12 col-lg-9 img-logo-sprav">--}}
                        {{--                            <article class="card mb-3 article-set"--}}
                        {{--                                     style="background-image: url('/source/images/1-logo.jpeg');">--}}

                        {{--                                <p class="title-img-logo"><a href="#jbwje" style="color: white;">Выбор материала в--}}
                        {{--                                        зависимости от эксплуатации--}}
                        {{--                                        оборудоания в промышленных условиях своими руками</a></p>--}}

                        {{--                                <div class="btn-logo mb-3 d-flex">--}}
                        {{--                                    <svg viewBox="0 0 22 22" width="15" height="24" class="svg-icon">--}}
                        {{--                                        <rect width="100" height="1"></rect>--}}
                        {{--                                        <rect y="5" width="100" height="1"></rect>--}}
                        {{--                                        <rect y="10" width="100" height="1"></rect>--}}
                        {{--                                        <rect y="15" width="100" height="1"></rect>--}}
                        {{--                                    </svg>--}}
                        {{--                                    <a href="#jbwje" class="ms-2 btn-logo-a">Читать</a></div>--}}

                        {{--                            </article>--}}
                        {{--                        </div>--}}
                        {{--                        <div class="col-md-12 col-lg-3 mb-3">--}}
                        {{--                            <article class="card mb-3 sprav-header">--}}
                        {{--                                <img src="/source/images/1.jpeg" alt="">--}}
                        {{--                                <header class="card-body">--}}
                        {{--                                    <p><a href="#jbwje">Выбор материала в зависимости от эксплуатации--}}
                        {{--                                            оборудоания в промышленных условиях своими руками</a></p>--}}
                        {{--                                </header>--}}
                        {{--                                <footer>--}}
                        {{--                                    <div class="btn-read mb-3 d-flex">--}}
                        {{--                                        <svg viewBox="0 0 22 22" width="15" height="24">--}}
                        {{--                                            <rect width="100" height="1"></rect>--}}
                        {{--                                            <rect y="5" width="100" height="1"></rect>--}}
                        {{--                                            <rect y="10" width="100" height="1"></rect>--}}
                        {{--                                            <rect y="15" width="100" height="1"></rect>--}}
                        {{--                                        </svg>--}}
                        {{--                                        <a href="#jbwje" class="ms-2">Читать</a></div>--}}

                        {{--                                </footer>--}}
                        {{--                            </article>--}}
                        {{--                        </div>--}}
                        {{--                    </div>--}}
                        <div class="col-12">
                            <h2>Последние публикации из справочника</h2>
                        </div>
                        <div class="row justify-content-start">
                            @foreach($last_articles as $article)
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3 mb-4">
                                    <article class="card mb-3 sprav-header">
                                        <img src="{{ Storage::url($article->thumb_img_logo_article) }}">
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
                                <div class="text-end"><a href="{{ route('spravochnik_index.show') }}">Все материалы</a></div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>
@stop
