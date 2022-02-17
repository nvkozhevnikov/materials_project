@extends('layouts.internal')
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('articles.show') }}
    </nav>
    <h1 class="h2">Статьи</h1>
    @include('blocks.rulilka.search')

    <div class="table-responsive">
        <table class="table table-hover">
            <tbody>
            <tr>
                <th>Статья</th>
                <th>Последний редактор</th>
                <th>Дата редактирования</th>
                <th>Дата создания</th>
                <th>Создан</th>
                <th>Активность</th>
            </tr>
            @foreach($articles as $article)
                <tr>
                    <td><a href="/dashboard/edit-article/{{ $article->id }}"
                           class="link-primary">{{ $article->h1 }}</a></td>
                    <td style="font-size: 0.86rem">{{ $article->getUser->name }}</td>
                    <td style="font-size: 0.86rem">{{ $article->updated_at }}</td>
                    <td style="font-size: 0.86rem">{{ $article->created_at }}</td>
                    <td style="font-size: 0.86rem">{{ $article->getCreator->name }}</td>
                    <td style="font-size: 0.86rem">@if($article->active == 1)<span class="badge bg-success">Опубликована</span> @else <span class="badge bg-danger">Ожидает публикации</span> @endif</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    {{ $articles->links('vendor.pagination.bootstrap-4') }}
    </div>

@stop
