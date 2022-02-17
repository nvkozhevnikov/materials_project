@extends('layouts.internal')
@section('title', $header_h1)
@section('content')
    <nav style="--bs-breadcrumb-divider: '>'; font-size: 14px;" aria-label="breadcrumb">
        @if ($site == 'metportal')
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-one-material-met', $data_of_material) }}
        @elseif ($site == 'harkov')
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-one-material-har', $data_of_material)}}
        @else
            {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('show-one-material-all', $material_name, $id)}}
        @endif
    </nav>
   @if($site <> 'all_sites')
    <h1 class="h2">{{ $header_h1 ?? ''}}</h1>
    <p class="badge bg-info">Редактор: {{ Auth::user()->name }}</p>
    @include('blocks.rulilka.buttons_compiling_done')
    <form action="" method="POST">
        <div class="py-2">
            <label for="name"><strong>Наименование материала:</strong></label><br>
            <input type="text" disabled="disabled" class="form-control input-group-lg" name="material_name" value="{{ $material_name ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>URL источника:</strong></label><br>
            <a href="{{ $url ?? '' }}" target="_blank" class="link-primary">{{ $url ?? '' }}</a>
        </div>
        <div class="py-2">
            <label for="name"><strong>Группа материала:</strong></label><br>
            <input type="text" disabled="disabled" class="form-control input-group-lg" name="category" value="{{ $category_name ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Title материала:</strong></label><br>
            <input type="text" disabled="disabled" class="form-control input-group-lg" name="title" value="{{ $title ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Н1 материала:</strong></label><br>
            <input type="text" disabled="disabled" class="form-control input-group-lg" name="h1" value="{{ $h1 ?? '' }}">
        </div>

        <div class="py-2">
            <label for="name"><strong>Description материала:</strong></label><br>
            <input type="text" disabled="disabled" class="form-control input-group-lg" name="description" value="{{ $description ?? '' }}">
        </div>
        <div class="py-2">
            <label for="name"><strong>Body материала:</strong></label><br>
            <textarea class="form-control" rows="20" name="body">{{ $body ?? '' }}</textarea>
        </div>
        @include('blocks.tinymce_config')
    </form>
   @else
       <h1 class="h2">{{ $header_h1 ?? ''}}</h1>
       <p class="badge bg-info">Редактор: {{ Auth::user()->name }}</p>
       @include('blocks.rulilka.buttons_compiling_done')
       <form action="" method="POST" enctype="multipart/form-data">
           <div class="py-2">
               <label for="name"><strong>Наименование материала:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="material_name" value="{{ $material_name ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>URL harkov:</strong></label><br>
               <a href="{{ $url_h ?? '' }}" target="_blank" class="link-primary">{{ $url_h ?? '' }}</a>
           </div>
           <div class="py-2">
               <label for="name"><strong>URL metportal:</strong></label><br>
               <a href="{{ $url_m ?? '' }}" target="_blank" class="link-primary">{{ $url_m ?? '' }}</a>
           </div>
           <div class="py-2">
               <label for="name"><strong>Группа материала harkov:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="category" value="{{ $category_name_h ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Группа материала metportal:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="category" value="{{ $category_name_m ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Title материала harkov:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="title" value="{{ $title_h ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Title материала metportal:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="title" value="{{ $title_m ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Н1 материала harkov:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="h1" value="{{ $h1_h ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Н1 материала metportal:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="h1" value="{{ $h1_m ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Description материала harkov:</strong></label><br>
               <input type="text" disabled="disabled" class="form-control input-group-lg" name="description" value="{{ $desc_h ?? '' }}">
           </div>
           <div class="py-2">
               <label for="name"><strong>Body материала harkov:</strong></label><br>
               <textarea class="form-control" rows="20" name="body">{{ $body_h ?? '' }}</textarea>
           </div>
           <div class="py-2">
               <label for="name"><strong>Body материала metportal:</strong></label><br>
               <textarea class="form-control" rows="20" name="body">{{ $body_m ?? '' }}</textarea>
           </div>
           @include('blocks.tinymce_config')
       </form>
    @endif
@stop

