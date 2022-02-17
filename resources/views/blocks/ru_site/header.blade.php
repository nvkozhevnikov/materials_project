<header>
    <div class="container">
        @if(session('successful_subscribe'))
            <div class="alert alert-success text-center h5">{{ session('successful_subscribe') }}</div>
        @endif
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded mb-3">
            <div class="container-fluid">
                <a href="{{ route('main-page') }}">
                    <img src="{{ route('main-page') }}/img/logo.png" alt="Metal Work Industrial" class="me-2" width="224px" height="40px">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbars" aria-controls="navbars" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbars">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-uppercase font-wight-700">
                        <li class="nav-item">
                            @if(request()->is('*ru/marochnik*')) <a class="link-hover active" aria-current="page" @else <a class="link-hover" @endif href="{{ route('material_categories.show') }}">Марочник</a>
                        </li>
                        <li class="nav-item">
                            @if(request()->is('*ru/gosts*')) <a class="link-hover active" aria-current="page" @else <a class="link-hover" @endif href="{{ route('gost_index.show') }}">ГОСТы</a>
                        </li>

                        <li class="nav-item">
                            @if(request()->is('*ru/spravochnik*')) <a class="link-hover active" aria-current="page" @else <a class="link-hover" @endif href="{{ route('spravochnik_index.show') }}">Справочник</a>
                        </li>
                    </ul>
{{--                        <div class="dropdown">--}}
{{--                            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                                Язык--}}
{{--                            </button>--}}
{{--                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">--}}
{{--                                <li>--}}
{{--                                    <div class="d-flex flex-row bd-highlight ms-2">--}}
{{--                                        <div class="bd-highlight">--}}
{{--                                            <img src="/img/ruflag.svg" alt="" height="20px"></div>--}}
{{--                                        <div class="bd-highlight"><a class="dropdown-item" href="#">Русский</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                </div>
            </div>
        </nav>
        @include('blocks.ru_site.search')
    </div>
</header>
