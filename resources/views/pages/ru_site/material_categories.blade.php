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
                            <div class="row">
                                <div class="col">
                                    <h2>{{ __('Черные металлы и сплавы') }}</h2>
                                    <ul class="list-group list-group-flush">
                                        @foreach($categories as $cat)
                                            @if($cat['metal_color'] == 2) @continue @endif
                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light"><a
                                                    href="{{ route('material_categories.show') }}/{{ $cat['slug'] }}">{{ $cat['category_name'] }}</a>
                                                <span class="badge bg-primary rounded-pill">{{ $count_materials[$cat['category_id']] }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col">
                                    <h2>{{ __('Цветные металлы и сплавы') }}</h2>
                                    <ul class="list-group list-group-flush">
                                        @foreach($categories as $cat)
                                            @if($cat['metal_color'] == 1) @continue @endif
                                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light"><a
                                                    href="{{ route('material_categories.show') }}/{{ $cat['slug'] }}">{{ $cat['category_name'] }}</a>
                                                <span class="badge bg-primary rounded-pill">{{ $count_materials[$cat['category_id']] }}</span></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
