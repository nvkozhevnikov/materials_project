@extends('layouts.internal')
@section('content')

    @if ($search_route == 'search-harkov')
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('search-harkov') }}
    @elseif ($search_route == 'search-metportal')
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('search-metportal') }}
    @elseif ($search_route == 'search-made-material')
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('search-made-material') }}
    @elseif ($search_route == 'articles.search')
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('articles.search') }}
    @else
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('search-all-sources') }}
    @endif

    <h2 class="h2">Результаты поиска</h2>
    @include('blocks.rulilka.search')
    @if($search_route == 'search-all-sources')
        @if(count($materials))
            <ul class="my-3 link-primary">
                @foreach($materials as $material)
                    <li><a href="{{ route('show-materials-all') }}/{{ $material[0]['id'] }}">{{ $material[0]['material_name'] ?? 'Данные отсутствуют!' }}</a></li>
                @endforeach
            </ul>
        @else
            <p class="alert alert-danger my-4">Ничего не найдено!</p>
        @endif

    @elseif($search_route == 'search-made-material')
        @if(count($materials))
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Материал</th>
                        <th>Последний редактор</th>
                        <th>Дата редактирования</th>
                        <th>Дата создания</th>
                        <th>Создан</th>
                    </tr>
                    @foreach($materials as $material)
                        <tr>
                            <td><a href="/dashboard/edit-material/{{ $material->id }}"
                                   class="link-primary">{{ $material->material_name }}</a></td>
                            <td style="font-size: 0.86rem">{{ $material->getUser->name }}</td>
                            <td style="font-size: 0.86rem">{{ $material->updated_at }}</td>
                            <td style="font-size: 0.86rem">{{ $material->created_at }}</td>
                            <td style="font-size: 0.86rem">{{ $material->getCreator->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="alert alert-danger my-4">Ничего не найдено!</p>
        @endif
    @elseif($search_route == 'articles.search')
        @if(count($articles))
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <th>Статья</th>
                        <th>Последний редактор</th>
                        <th>Дата редактирования</th>
                        <th>Дата создания</th>
                        <th>Создан</th>
                    </tr>
                    @foreach($articles as $article)
                        <tr>
                            <td><a href="{{ route('article.edit') }}/{{ $article->id }}"
                                   class="link-primary">{{ $article->h1 }}</a></td>
                            <td style="font-size: 0.86rem">{{ $article->getUser->name }}</td>
                            <td style="font-size: 0.86rem">{{ $article->updated_at }}</td>
                            <td style="font-size: 0.86rem">{{ $article->created_at }}</td>
                            <td style="font-size: 0.86rem">{{ $article->getCreator->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p class="alert alert-danger my-4">Ничего не найдено!</p>
        @endif

    @elseif($search_route == 'search-harkov' || $search_route == 'search-metportal')
        @if(count($materials))
            <ul class="my-3 link-primary">
                @foreach ($materials as $material)
                    <li><a href="@if($search_route == 'search-harkov'){{ route('show-materials-har') }}@else{{ route('show-materials-met') }}@endif/{{ $material->id }}">{{ $material->material_name ?? 'Данные отсутствуют!' }}</a></li>
                @endforeach
            </ul>
        @else
            <p class="alert alert-danger my-4">Ничего не найдено!</p>
        @endif
    @else
        @if(count($materials))
            <ul class="my-3 link-primary">
                @foreach ($materials as $material)
                    <li><a href="@if($search_route == 'search-harkov-made'){{ route('show-materials-har') }}@else{{ route('show-materials-met') }}@endif/{{ $material->id }}">{{ $material->material_name ?? 'Данные отсутствуют!' }}</a></li>
                @endforeach
            </ul>
        @else
            <p class="alert alert-danger my-4">Ничего не найдено!</p>
        @endif
    @endif
@stop
