@extends('layouts.external')
@section('description', $description ?? 'Нет данных')
@section('title', $title ?? 'Нет данных')
@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="col-md-12">
                    <div class="block bg-light rounded">
                        <article>
                            <h1>{{ $h1 ?? 'Нет данных'}}</h1>
                            <div class="row">
                                <div class="col">
                                    @include('blocks.errors')
                                    @if(isset($search_result))
                                        <div class="alert alert-secondary d-flex align-items-center" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div class="pt-3">
                                                <p>{{ __('Результаты поиска по запросу') }}: "{{ $search_keyword }}
                                                    ". {{ __('Совпадений') }}: <b>{{ $find_items }} {{ __('шт') }}.</b>
                                                </p>
                                            </div>
                                        </div>
                                        @if($razdel == 'marochnik')
                                            <dl class="ms-4">
                                                @foreach($search_result as $item)
                                                    <dt><a href="{{ route('one_material.show',
                                                          ['slug_category' => $item->mc_slug, 'slug_sub_category' => $item->msc_slug,
                                                          'slug_material_name' => $item->m_slug]) }}">{{ $item->material_name }}</a>
                                                    </dt>
                                                    <dd>{{ $item->h1 }}</dd>
                                                @endforeach
                                            </dl>
                                        @elseif($razdel == 'gost')
                                            <dl class="ms-4">
                                                @foreach($search_result as $item)
                                                    <dt><a href="{{ route('gost.show',
                                                          ['slug_razdela' => $item->slug_razdela, 'slug_gruppy' => $item->slug_gruppy,
                                                          'slug_gost' => $item->slug_gost]) }}">{{ $item->standard }} - {{ $item->standard_number }}</a>
                                                    </dt>
                                                    <dd>{{ $item->standard }} {{ $item->standard_number }} - {{ $item->standard_title }}</dd>
                                                @endforeach
                                            </dl>


                                        @elseif($razdel == 'spravochnik')


                                            <dl class="ms-4">
                                                @foreach($search_result as $item)
                                                    <dt><a href="{{ route('article_spravochnik.show',
                                                          ['slug_category' => $item->slug_category, 'slug_article' => $item->slug
                                                          ]) }}">{{ $item->h1 }}</a>
                                                    </dt>
                                                    <dd>{{ $item->description }}</dd>
                                                @endforeach
                                            </dl>


                                        @endif
                                        {{ $search_result->withQueryString()->links('vendor.pagination.bootstrap-4') }}
                                    @else
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                 fill="currentColor"
                                                 class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                                                 viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                                <path
                                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                            </svg>
                                            <div class="pt-3">
                                                <p>{{ $message }}</p>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
