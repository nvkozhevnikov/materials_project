<div class="alert alert-primary my-4">
    <form action="{{ route($search_route) }}" method="get">
        <div class="input-group">
            <input type="search" class="form-control rounded" placeholder="Поиск" name="s" id="s" aria-label="Поиск"
                   aria-describedby="search-addon"/>
            <button type="submit" class="btn btn-primary">найти</button>
        </div>
    </form>
</div>
