@extends('layouts.external')
@section('description', $page->description ?? 'Нет данных')
@section('title', $page->title)
@section('content')
    <div class="container">
        <main>
            <div class="material-content row mb-3">
                <div class="col-md-12">
                    <div class="block bg-light rounded">
                        <div class="material-card">
                            <article>
                                <h1>{{ $page->h1 }}</h1>
                                <div class="row">
                                    <div class="col mx-4">
                                        {!! $page->text !!}
                                    </div>
                                    @if(\Request::is(substr(route('about.show', ['contacts'], false), 1)) ||
                                        \Request::is(substr(route('about.show', ['bug-report'], false), 1)) ||
                                        \Request::is(substr(route('about.show', ['ads'], false), 1)))
                                        <div class="col-md-5 me-3 mb-3">
                                            <div class="border p-3 rounded">

                                                @include('blocks.errors')

                                                @if(session('successful_sent'))
                                                    <div class="alert alert-success">{{ session('successful_sent') }}</div>
                                                @endif

                                                <form method="POST" action="{{ route('mail.send') }}">
                                                @csrf
                                                <!-- Name input -->
                                                    <div class="form-floating mb-3">
                                                        <input type="text" id="formName" name="name" class="form-control" placeholder="Иван Петров">
                                                        <label class="text-secondary required" for="formName">Имя</label>
                                                    </div>

                                                    <!-- Email input -->
                                                    <div class="form-floating mb-2">
                                                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                                                        <label for="floatingInput" class="text-secondary required">Email</label>
                                                    </div>

                                                    <!-- Subject -->
                                                    <div class="form-floating mb-2">
                                                        <select class="form-select" name="subject" id="floatingSelect" aria-label="Выберите тему письма">
                                                            @if(\Request::is(substr(route('about.show', ['ads'], false), 1))))
                                                                <option value="Ошибка на сайте">Ошибка на сайте</option>
                                                                <option value="Запрос на размещение рекламы" selected>Запрос на размещение рекламы</option>
                                                                <option value="Сказать Спасибо или оставить совет">Сказать "Спасибо" или оставить совет</option>
                                                                <option value="Другое">Другое</option>
                                                            @elseif(\Request::is(substr(route('about.show', ['bug-report'], false), 1)))
                                                                <option value="Ошибка на сайте" selected>Ошибка на сайте</option>
                                                                <option value="Запрос на размещение рекламы">Запрос на размещение рекламы</option>
                                                                <option value="Сказать Спасибо или оставить совет">Сказать "Спасибо" или оставить совет</option>
                                                                <option value="Другое">Другое</option>
                                                            @else
                                                                <option value="Ошибка на сайте">Ошибка на сайте</option>
                                                                <option value="Запрос на размещение рекламы">Запрос на размещение рекламы</option>
                                                                <option value="Сказать Спасибо или оставить совет" selected>Сказать "Спасибо" или оставить совет</option>
                                                                <option value="Другое">Другое</option>
                                                            @endif
                                                        </select>
                                                        <label for="floatingSelect" class="required">Выберите тему письма</label>
                                                    </div>

                                                    <!-- Message input -->
                                                    <div class="form-floating mb-3">
                                                        <textarea class="form-control" name="message" id="formText" placeholder="Введите сообщение..." style="height: 150px;"></textarea>
                                                        <label for="formText" class="form-label text-secondary required">Сообщение</label>
                                                    </div>

                                                    <!-- Submit button -->
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                </div>


                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@stop
