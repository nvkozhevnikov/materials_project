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
                                @include('blocks.errors')
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>{{ __('№') }}</th>
                                        <th>{{ __('Стандарт') }}</th>
                                        <th>{{ __('Наименование') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $i=0 @endphp
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td><a href="{{ route('gost.show', ['slug_razdela' => $slug_razdela,
                                                'slug_gruppy' => $slug_gruppy, 'slug_gost' => $item->standard_slug]) }}">
                                                    {{ $item->standard }} {{ $item->standard_number }}</a></td>
                                            <td>{{ $item->standard_title }}</td>
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
