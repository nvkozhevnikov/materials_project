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
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><a href="{{ route('one_material.show',
                                                          ['slug_category' => $slug_category, 'slug_sub_category' => $slug_sub_category,
                                                          'slug_material_name' => $item->slug]) }}">{{ $item->material_name }}</a></td>
                                            <td>{{ __('ГОСТ') }}</td>
                                            <td>{{ __('Россия') }}</td>
                                        </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </main>
</div>
@stop
