@if(Request::route()->getName() == 'main-page')
    <div class="bg-light rounded mb-3">
        <div class="row p-2">
            <div class="col-md-3"></div>
            <div class="col-md-6" itemscope itemtype="https://schema.org/WebSite">
                <meta itemprop="url" content="{{ route('main-page') }}"/>
                <form action="{{ route('search.show') }}" method="GET" itemprop="potentialAction" itemscope
                      itemtype="https://schema.org/SearchAction">
                    <div class="block d-flex align-items-center">
                        <div class="input-group">
                            <meta itemprop="target"
                                  content="{{ route('main-page') }}/ru/search?s={s}"/>
                            <input type="search" class="form-control rounded" placeholder="Поиск материалов в марочнике"
                                   name="s"
                                   aria-label="Search"
                                   aria-describedby="search-addon"
                                   itemprop="query-input"
                            />
                            <button type="submit" class="btn btn-primary">Найти</button>
                        </div>
                    </div>
                </form>
            <!-- Button trigger modal -->
                <p class="text-center">
                    <a href="" data-bs-toggle="modal" data-bs-target="#searchModal">Расширенный поиск</a>
                </p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@else
    <div class="bg-light rounded mb-3">
        <div class="row p-2">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <form action="{{ route('search.show') }}" method="GET">
                    <div class="block d-flex align-items-center">
                        <div class="input-group">
                            <input type="search" class="form-control rounded" placeholder="Поиск материалов в марочнике"
                                   name="s"
                                   aria-label="Search"
                                   aria-describedby="search-addon"
                            />
                            <button type="submit" class="btn btn-primary">Найти</button>
                        </div>
                    </div>
                </form>
                <!-- Button trigger modal -->
                <p class="text-center">
                    <a href="" data-bs-toggle="modal" data-bs-target="#searchModal">Расширенный поиск</a>
                </p>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Расширенный поиск</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('search.show') }}" method="GET">
                    <div class="block d-flex align-items-center">
                        <div class="input-group">
                            <div>
                            <input type="search" class="form-control rounded" placeholder="Поиск"
                                   name="s"
                                   aria-label="Search"
                                   aria-describedby="search-addon"
                                   size="42"
                            />
                            <div class="search-label">
                                по:
                                <label><input type="radio" name="search_radio" value="marochnik"> марочнику</label>
                                <label><input type="radio" name="search_radio" value="gost"> ГОСТам</label>
                                <label><input type="radio" name="search_radio" value="spravochnik"> справочнику</label>
                            </div>
                            </div>
                            <div>
                            <button type="submit" class="btn btn-primary">Найти</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
