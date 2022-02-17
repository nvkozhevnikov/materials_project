@extends('layouts.internal')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('compilation-new-material') }}
    </nav>
    <h1 class="h2">{{ $header_h1 ?? ''}}</h1>
    <p class="badge bg-info">Редактор: {{ Auth::user()->name }}</p>

    @include('blocks.errors')

    <form action="{{ route('create-new-material') }}" method="POST">
        @csrf
        <div class="py-2">
            <label for="name"><strong>Наименование материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="material_name" value="{{ old('material_name') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>URL страницы:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="slug" value="{{ old('slug') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Группа материала:</strong></label><br>
            <p>
                <select name="sub_category">
                    @if(old('sub_category'))
                        <option disabled>Выберите категорию...</option>
                        @foreach($sub_categories as $sub_category)
                            @if($sub_category->id == old('sub_category'))
                                <option value="{{ $sub_category->id }}" selected>{{ $sub_category->sub_category_name }}</option>
                            @else
                                <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                            @endif
                        @endforeach
                    @else
                        <option disabled selected>Выберите категорию...</option>
                        @foreach($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}">{{ $sub_category->sub_category_name }}</option>
                        @endforeach
                    @endif
                </select>
            </p>
        </div>
        <div class="py-2">
            <label for="name"><strong>Основные данные:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="main_properties">{{ old('main_properties') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Виды поставки:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="vidy_postavki">{{ old('vidy_postavki') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Химический состав:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="him_sostav">{{ old('him_sostav') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Технологические свойства:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="tehnolog_properties">{{ old('tehnolog_properties') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Механические свойства:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="meh_properties">{{ old('meh_properties') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Твердость:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="tverdost">{{ old('tverdost') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Физические свойства:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="fiz_properties">{{ old('fiz_properties') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Температуры критических точек:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="temps_kritich_tochek">{{ old('temps_kritich_tochek') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Зарубежные аналоги:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="international_analogs">{{ old('international_analogs') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>FAQ (часто задаваемые вопросы):</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="faq">{{ old('faq') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Источники информации и нормативная документация:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="sources_information">{{ old('sources_information') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Title материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="title" value="{{ old('title') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Н1 материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="h1" value="{{ old('h1') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Description материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="description" value="{{ old('description') }}">
        </div>
        <div class="text-center d-grid gap-2 col-2 mx-auto my-2">
            <input type="hidden" name="redactor_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary text">Создать</button>
        </div>
        @include('blocks.tinymce_config')
    </form>
@stop
