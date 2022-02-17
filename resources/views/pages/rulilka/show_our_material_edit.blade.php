@extends('layouts.internal')
@section('title', $title)
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('select-edit-material', $material_name, $id) }}
    </nav>
<div class="container">
    <h1 class="h2">{{ $title }}</h1>
    <p class="badge bg-info">Редактор: {{ Auth::user()->name }}</p>
    <p class="badge bg-info">Последнее редактирование: {{ $last_redactor }}</p>

    @include('blocks.errors')

    <form action="{{ route('edit-made-material') }}" method="POST">
        @csrf
        <div class="py-2">
            <label for="name"><strong>Наименование материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="material_name" value="{{ $material_name ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>URL (slug) страницы:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="slug" value="{{ $slug ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Группа материала:</strong></label><br>
            <p>
                <select name="sub_category">
                    <option disabled selected>Выберите категорию...</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{ $sub_category->id }}" @if($sub_category->id == $material_sub_category_id) selected @endif>{{ $sub_category->sub_category_name }}</option>
                    @endforeach
                </select>
            </p>
        </div>
        <div class="py-2">
            <label for="name"><strong>Основные данные:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="main_properties">{{ $main_properties ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Виды поставки:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="vidy_postavki">{{ $vidy_postavki ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Химический состав:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="him_sostav">{{ $him_sostav ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Технологические свойства:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="tehnolog_properties">{{ $tehnolog_properties ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Механические свойства:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="meh_properties">{{ $meh_properties ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Твердость:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="tverdost">{{ $tverdost ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Физические свойства:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="fiz_properties">{{ $fiz_properties ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Температуры критических точек:</strong></label><br>
            <textarea class="form-control" cols="10" rows="5" name="temps_kritich_tochek">{{ $temps_kritich_tochek ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Зарубежные аналоги:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="international_analogs">{{ $international_analogs ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>FAQ (часто задаваемые вопросы):</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="faq">{{ $faq ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Источники информации и нормативная документация:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="sources_information">{{ $sources_information ?? '' }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Title материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="title" value="{{ $title_material ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Н1 материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="h1" value="{{ $h1 ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Description материала:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="description" value="{{ $desc ?? '' }}">
        </div>
        <div class="text-center d-grid gap-2 col-2 mx-auto my-2">¨
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="redactor_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary text">Перезаписать</button>
        </div>
        @include('blocks.tinymce_config')
    </form>
</div>

@stop
