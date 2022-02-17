@extends('layouts.internal')
@section('title', $title)
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
        {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-made-materials') }}
    </nav>
    @if($db_table == 'materials')
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="h2">{{ $title }}</h1>
                </div>
                <div class="col-1">
                    <span class="badge bg-primary rounded-pill">{{ $quantity_materials }}</span>
                </div>
            </div>
            @include('blocks.rulilka.search')
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
                    @foreach($made_materials as $material)
                        @if(($material->creator_id == Auth::user()->id and Auth::user()->id != 1))
                            <tr>
                                <td><a href="/dashboard/edit-material/{{ $material->id }}"
                                       class="link-primary">{{ $material->material_name }}</a></td>
                                <td style="font-size: 0.86rem">{{ $material->getUser->name }}</td>
                                <td style="font-size: 0.86rem">{{ $material->updated_at }}</td>
                                <td style="font-size: 0.86rem">{{ $material->created_at }}</td>
                                <td style="font-size: 0.86rem">{{ $material->getCreator->name }}</td>
                            </tr>
                        @endif
                    @endforeach
                    @if(Auth::user()->id == 1)
                        @foreach($made_materials as $material)

                            <tr>
                                <td><a href="/dashboard/edit-material/{{ $material->id }}"
                                       class="link-primary">{{ $material->material_name }}</a></td>
                                <td style="font-size: 0.86rem">{{ $material->getUser->name }}</td>
                                <td style="font-size: 0.86rem">{{ $material->updated_at }}</td>
                                <td style="font-size: 0.86rem">{{ $material->created_at }}</td>
                                <td style="font-size: 0.86rem">{{ $material->getCreator->name }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            {{ $made_materials->links('vendor.pagination.bootstrap-4') }}
        </div>
    @else
        <h1 class="h2">{{ $title }}</h1>
        @include('blocks.rulilka.search')
        <ul class="my-3 link-primary">
            @foreach ($made_materials as $material)
                <li><a href="@if($db_table == 'metportal_materials'){{ route('show-materials-met') }}@else{{ route('show-materials-har') }}@endif/{{ $material->id }}">{{ $material->material_name ?? 'Неизвестный' }}</a></li>
            @endforeach
        </ul>
        {{ $made_materials->links('vendor.pagination.bootstrap-4') }}
    @endif
@stop
