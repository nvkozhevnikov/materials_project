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
                            @include('blocks.errors')
                            <p class="fs-3 fw-bold mb-2">Группы стандартов</p>
                            <ol class="col-lg-6 col-md-12 fs-6 list-group list-group-numbered">
                                @foreach($razdely as $key => $nav_razdel)
                                    <li class="list-group-item"><a href="#stdrd-{{ $key }}">{{ $nav_razdel[2] }}</a></li>
                                @endforeach
                            </ol>
                            @foreach($razdely as $key => $razdel)

                                <h2 id="stdrd-{{ $key }}">{{ $razdel[3] }} - {{ $razdel[2] }} <a href="{{ route('gost_razdel.show', ['slug_razdela' => $razdel[1]]) }}"><i class="icon-link-ext"></i></a></h2>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>{{ __('№') }}</th>
                                            <th>{{ __('Группа') }}</th>
                                            <th>{{ __('Наименование') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php $i=0 @endphp
                                        @foreach($data as $item)
                                            @if($razdel[0] == $item->link_id_razdela)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td><a href="{{ route('gost_gruppa.show', ['slug_razdela' => $razdel[1],
                                                        'slug_gruppy' => $item->slug_gruppy]) }}">{{ $item->gruppa }}</a></td>
                                                    <td><a href="{{ route('gost_gruppa.show', ['slug_razdela' => $razdel[1],
                                                        'slug_gruppy' => $item->slug_gruppy]) }}">{{ $item->name_gruppy }}</td>
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
