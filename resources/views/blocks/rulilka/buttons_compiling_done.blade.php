@if(isset($site))
    <div class="text-right">
        <form target="_blank¨" class="form-check-inline">
            <button type="submit" formaction="{{ route('compilation-new-material') }}" class="btn btn-primary">Компилировать</button>
        </form>
        <form class="form-check-inline">
            <input type="hidden" name="site" value="{{ $site }}">
            <input type="hidden" name="material_name" value="{{ $material_name }}">
            @if(isset($id))<input type="hidden" name="id" value="{{ $id }}">@endif
            <input type="hidden" name="redactor_id" value="{{ Auth::user()->id }}">
            <button type="submit" formaction="{{ route('done-new-material') }}" class="btn btn-success">Готово</button>
        </form>
    </div>
@else
    <div class="d-flex flex-row">
    <div class="text-right">
        <form target="_blank¨" class="form-check-inline">
            <button type="submit" formaction="{{ route('compilation-new-material') }}" class="btn btn-primary">Создать материал в марочник</button>
        </form>
    </div>
    <div class="text-right">
        <form target="_blank¨" class="form-check-inline">
            <button type="submit" formaction="{{ route('article.add') }}" class="btn btn-success">Создать статью в справочник</button>
        </form>
    </div>
    </div>
@endif
