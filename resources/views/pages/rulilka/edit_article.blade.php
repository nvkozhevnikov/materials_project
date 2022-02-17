@extends('layouts.internal')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render($route, $article->id) }}
    </nav>
    <h1 class="h2">Редактирование статьи</h1>
    <p class="badge bg-info">Редактор: {{ Auth::user()->name }}</p>

    @include('blocks.errors')

    <form action="{{ route('article.edit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="py-2">
            <label for="name"><strong>Наименование материала (H1):</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="h1" value="{{ $article->h1 ?? old('h1') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>URL страницы:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="slug" value="{{ $article->slug ?? old('slug') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Title:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="title" value="{{ $article->title ?? old('title') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Description:</strong></label><br>
            <input type="text" class="form-control input-group-lg" name="description" value="{{ $article->description ?? old('description') }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Группа статьи:</strong></label><br>
            <p>
                <select name="sub_category">
                    @if(old('sub_category') || $article->spravochnik_category_id)
                        <option disabled>Выберите категорию...</option>
                        @foreach($sub_categories as $sub_category)
                            @if($sub_category->id == old('sub_category') || $sub_category->id == $article->spravochnik_category_id)
                                <option value="{{ $sub_category->id }}" selected>{{ $sub_category->category_name }}</option>
                            @else
                                <option value="{{ $sub_category->id }}">{{ $sub_category->category_name }}</option>
                            @endif
                        @endforeach
                    @else
                        <option disabled selected>Выберите категорию...</option>
                        @foreach($sub_categories as $sub_category)
                            <option value="{{ $sub_category->id }}">{{ $sub_category->category_name }}</option>
                        @endforeach
                    @endif
                </select>
            </p>
        </div>
        <div class="py-2">
            <label for="name"><strong>Тег статьи:</strong></label><br>
            <p>
                <select name="tag">
                    @if(old('tag') || $current_tag[0]->id)
                        <option disabled>Выберите тег...</option>
                        @foreach($tags as $tag)
                            @if($tag->id == $current_tag[0]->id)
                                <option value="{{ $tag->id }}" selected>{{ $tag->tag_name }}</option>
                            @else
                                <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                            @endif
                        @endforeach
                    @else
                        <option disabled selected>Выберите тег...</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                        @endforeach
                    @endif
                </select>
            </p>
        </div>
        <div class="py-2">
            <label for="name"><strong>Краткое описание:</strong></label><br>
            <textarea class="form-control" cols="30" rows="10" name="post_description">{{ $article->post_description ?? old('post_description') }}</textarea>
        </div>
        <div class="py-2">
            <label for="name"><strong>Текст:</strong></label><br>
            <textarea class="form-control" cols="40" rows="15" name="post">{{ $article->post ?? old('post') }}</textarea>
        </div>
        <div class="py-2">
            <div class="row">
                <div class="col-3">
                    <label for="name"><strong>Миниатюра статьи:</strong></label><br>
                    <input type="file" name="thumb_logo_img_article">
                </div>
                <div class="col">
                    <img src="{{ Storage::url($article->thumb_img_logo_article) }}" height="200px" width="200px">
                </div>
            </div>
        </div>
        <div class="py-2">
            <label><input type="checkbox" name="active" @if($article->active == 1) checked @endif> <strong>Опубликовать материал</strong></label>
        </div>
        <div class="text-center d-grid gap-2 col-2 mx-auto my-2">
            <input type="hidden" name="redactor_id" value="{{ Auth::user()->id }}">
            <input type="hidden" name="id" value="{{ $article->id }}">
            <button type="submit" class="btn btn-primary text">Перезаписать</button>
        </div>
        @include('blocks.tinymce_config')
    </form>

@stop
