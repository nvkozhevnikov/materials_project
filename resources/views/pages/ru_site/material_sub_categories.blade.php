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
                            <h1>{{ $h1 }}</h1>
                            <p class="fs-3 fw-bold mb-2">Группы материалов</p>
                            <ol class="col-lg-6 col-md-12 fs-6 list-group list-group-numbered">
                            @foreach($unique_sub_categories as $key => $nav_link)
                                    <li class="list-group-item"><a href="#cat-{{ $key }}">{{ $nav_link[0] }}</a></li>
                            @endforeach
                            </ol>

                            @foreach($unique_sub_categories as $key => $cat)

                                <h2 id="cat-{{ $key }}">{{ $cat[0] }} <a href="{{ route('materials_one_sub_category.show', ['slug_category' => $slug_category,
                                                    'slug_sub_category' => $cat[1]]) }}"><i class="icon-link-ext"></i></a></h2>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{ __('№') }}</th>
                                            <th>{{ __('Материал') }}</th>
                                            <th>{{ __('Стандарт') }}</th>
                                            <th>{{ __('Страна') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=0 @endphp
                                        @foreach($data as $item)
                                            @if($cat[0] == $item->sub_category_name)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td><a href="{{ route('one_material.show',
                                                          ['slug_category' => $slug_category, 'slug_sub_category' => $cat[1],
                                                          'slug_material_name' => $item->slug]) }}">{{ $item->material_name }}</a></td>
                                                    <td>{{ __('ГОСТ') }}</td>
                                                    <td>{{ __('Россия') }}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endforeach
                        </article>

                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
