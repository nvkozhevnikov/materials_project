@extends('layouts.internal')
@section('title', $header_h2)
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
        @if ($site == 'metportal')
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-materials-met') }}
        @elseif ($site == 'all_sites')
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-materials-all') }}
        @else
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-materials-har') }}
        @endif

    </nav>
    <h2 class="h2">{{ $header_h2 }}</h2>
    @include('blocks.rulilka.search')
    <p class="text-secondary my-3">Всего необработанных материалов: {{ $quantity_raw_materials ?? 'Нет данных' }} шт.</p>
    <ul class="my-3 link-primary">
        @foreach ($materials as $material)
            <li><a href="@if($site == 'metportal'){{ route('show-materials-met') }}@elseif($site == 'all_sites'){{ route('show-materials-all') }}@else{{ route('show-materials-har') }}@endif/{{ $material->id }}">{{ $material->material_name ?? 'Неизвестный' }}</a></li>
        @endforeach
    </ul>
    @if ($site != 'all_sites')
    {{ $materials->links('vendor.pagination.bootstrap-4') }}
    @endif
@stop
