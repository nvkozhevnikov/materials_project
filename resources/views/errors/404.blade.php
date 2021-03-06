@extends('layouts.errors')
@section('description', 'Ошибка 404 - Страница не найдена.')
@section('title', 'Ошибка 404')
@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="col-md-12">
                    <div class="block bg-light rounded">
                        <div class="material-card m-4">
                           <p class="font-wight-700 h1 text-center">404</p>
                            <p class="h3 text-center">Запрашиваемая вами страница не найдена :(</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
