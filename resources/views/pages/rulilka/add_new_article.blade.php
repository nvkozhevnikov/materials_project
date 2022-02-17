@extends('layouts.internal')
@section('content')
    <h1 class="h2">{{ $header_h1 ?? 'Создание новой статьи'}}</h1>
    <p class="badge bg-info">Редактор: {{ Auth::user()->name }}</p>

    @include('blocks.errors')

    <form action="{{ route('article.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="py-2">
            <label for="name"><strong>Наименование материала (H1):</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="h1" value="{{ old('h1') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>URL страницы:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="slug" value="{{ old('slug') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Title:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="title" value="{{ old('title') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Description:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="description" value="{{ old('description') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Группа статьи:</strong></label><br>
            <p>
                <select name="sub_category">
                        <option disabled selected>Выберите категорию...</option>
                        @foreach($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id }}">{{ $sub_category->category_name }}</option>
                        @endforeach
                </select>
            </p>
        </div>
        <div class="py-2">
            <label for="name"><strong>Тэг статьи:</strong></label><br>
            <p>
                <select name="tag">
                        <option disabled selected>Выберите тег...</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                        @endforeach
                </select>
            </p>
        </div>
        <div class="py-2">
            <label for="name"><strong>Краткое описание:</strong></label><br>
            <textarea class="form-control" cols="30" rows="10" name="post_description">{{ old('post_description') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Текст:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="post">{{ old('post') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Миниатюра статьи:</strong></label><br>
            <input type="file" name="thumb_logo_img_article">
        </div>
        <div class="py-2">
            <label><input type="checkbox" name="active"> <strong>Опубликовать материал</strong></label>
        </div>
        <div class="text-center d-grid gap-2 col-2 mx-auto my-2">
            <input type="hidden" name="creator_id" value="{{ Auth::user()->id }}">
            <button type="submit" class="btn btn-primary text">Создать</button>
        </div>
    </form>
    @include('blocks.tinymce_config')

@stop
