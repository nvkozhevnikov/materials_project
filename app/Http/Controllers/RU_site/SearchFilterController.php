<?php

namespace App\Http\Controllers\RU_site;

use App\Filters\Search;
use App\Http\Controllers\Controller;
use App\Models\Ru_site\GostMaterial;
use App\Models\Ru_site\Material;
use App\Models\Ru_site\Spravochnik;


class SearchFilterController extends Controller
{
    public function index(Search $request)
    {
        if (is_null($request->request->s)) {
            return view('pages.ru_site.search_result', [
                'h1' => 'Ошибка',
                'title' => 'Ошибка',
                'description' => 'Ошибка',
                'message' => 'Вы отправили пустой запрос! Попрбуйте ввести реальный запрос.'
            ]);
        }

        if (!isset($request->request->search_radio) || $request->request->search_radio == 'marochnik') {
                $search_result = Material::SearchMarochnik($request)->paginate(20);
                if (count($search_result) == 0) {
                    return view('pages.ru_site.search_result', [
                        'h1' => 'Ничего не найдено',
                        'title' => 'Ничего не найдено',
                        'description' => 'Ничего не найдено',
                        'message' => 'Ничего не найдено. Попробуйте переформулировать запрос. Поиск производится по наименованию материала.'
                    ]);
                }

                $search_keyword = $request->request->s;

                $find_items = count(Material::SearchMarochnik($request)->get());

                return view('pages.ru_site.search_result', [
                    'search_result' => $search_result,
                    'h1' => "Результаты поиска",
                    'title' => "Результаты поиска по запросу: " . $search_keyword,
                    'description' => "Результаты поиска по запросу: " . $search_keyword,
                    'search_keyword' => $search_keyword,
                    'find_items' => $find_items,
                    'razdel' => 'marochnik',
                ]);
        } elseif ($request->request->search_radio == 'gost') {
            $search_result = GostMaterial::SearchGost($request)->paginate(20);

            if (count($search_result) == 0) {
                return view('pages.ru_site.search_result', [
                    'h1' => 'Ничего не найдено',
                    'title' => 'Ничего не найдено',
                    'description' => 'Ничего не найдено',
                    'message' => 'Ничего не найдено. Попробуйте переформулировать запрос. Поиск производится по наименованию материала.'
                ]);
            }

            $search_keyword = $request->request->s;
            $find_items = count(GostMaterial::SearchGost($request)->get());

            return view('pages.ru_site.search_result', [
                'search_result' => $search_result,
                'h1' => "Результаты поиска",
                'title' => "Результаты поиска по запросу: " . $search_keyword,
                'description' => "Результаты поиска по запросу: " . $search_keyword,
                'search_keyword' => $search_keyword,
                'find_items' => $find_items,
                'razdel' => 'gost',
            ]);
        } elseif ($request->request->search_radio == 'spravochnik') {
            $search_result = Spravochnik::SearchSpravochnik($request)->paginate(20);

            if (count($search_result) == 0) {
                return view('pages.ru_site.search_result', [
                    'h1' => 'Ничего не найдено',
                    'title' => 'Ничего не найдено',
                    'description' => 'Ничего не найдено',
                    'message' => 'Ничего не найдено. Попробуйте переформулировать запрос. Поиск производится по наименованию материала.'
                ]);
            }

            $search_keyword = $request->request->s;
            $find_items = count(Spravochnik::SearchSpravochnik($request)->get());

            return view('pages.ru_site.search_result', [
                'search_result' => $search_result,
                'h1' => "Результаты поиска",
                'title' => "Результаты поиска по запросу: " . $search_keyword,
                'description' => "Результаты поиска по запросу: " . $search_keyword,
                'search_keyword' => $search_keyword,
                'find_items' => $find_items,
                'razdel' => 'spravochnik',
            ]);
        }
    }
}
