@section('title', "Админка")
<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                   Привет, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('blocks.rulilka.buttons_compiling_done')
{{--                    <h2 class="h2">Источники для компилирования новых материалов</h2>--}}
{{--                    <p>--}}
{{--                        <ol class="link-primary">--}}
{{--                            <li>1. <a href="/dashboard/show-materials-all">Материалы 2-х источников</a></li>--}}
{{--                            <li>2. <a href="/dashboard/show-materials-har">Материалы harkov</a></li>--}}
{{--                            <li>3. <a href="/dashboard/show-materials-met">Материалы metportal</a></li>--}}
{{--                        </ol>--}}
{{--                    </p>--}}
                    <div class="my-3">
                        <h2 class="h2">Меню</h2>
                        <p>
                            <ol class="link-primary">
                                <li>1. <a href="/dashboard/show-made-materials">Материалы (марочник)</a></li>
                                <li>2. <a href="/dashboard/show-articles">Статьи (справочник)</a></li>
{{--                                <li>2. <a href="/dashboard/show-made-materials-har">Посмотреть обработанные материалы harkov</a></li>--}}
{{--                                <li>3. <a href="/dashboard/show-made-materials-met">Посмотреть обработанные материалы metportal</a></li>--}}
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
