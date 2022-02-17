<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Http\Controllers\Controller;
use App\Models\CompileMaterials\Material;
use App\Models\CompileMaterials\ShowHarkovMaterial;
use App\Models\CompileMaterials\ShowMetportalMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MadeMaterialsController extends Controller
{
    public function showMade()
    {
        $made_materials = Material::orderBy('id', 'desc')->paginate(15);
        $count_materials = Material::count();

        return view('pages.rulilka.made_materials', [
            'title' => 'Новые скомпилированные материалы',
            'made_materials' => $made_materials,
            'db_table' => 'materials',
            'quantity_materials' => $count_materials,
            'search_route' => 'search-made-material',
        ]);
    }

    public function showMadeHar()
    {
        $made_materials = ShowHarkovMaterial::whereNotNull('change_mtrl')->paginate(15);
        return view('pages.rulilka.made_materials', [
            'title' => 'Обработанные материалы Harkov',
            'made_materials' => $made_materials,
            'db_table' => 'harkov_materials',
            'search_route' => 'search-harkov-made',
        ]);
    }

    public function showMadeMet()
    {
        $made_materials = ShowMetportalMaterial::whereNotNull('change_mtrl')->paginate(15);
        return view('pages.rulilka.made_materials', [
            'title' => 'Обработанные материалы Metportal',
            'made_materials' => $made_materials,
            'db_table' => 'metportal_materials',
            'search_route' => 'search-metportal-made',

        ]);
    }

    public function editMaterial(Request $request)
    {
        $request->validate([
            'material_name' => 'required|string|max:45',
            'slug' => 'required|string|regex:/^[a-z0-9\-]+$/u|max:99',
            'sub_category' => 'required|string',
            'title' => 'required|string|max:300',
            'h1' => 'required|string|max:300',
            'description' => 'required|string|max:300',

        ]);

        $id = $request->input('id');
        $material_name = $request->input('material_name');
        $slug = $request->input('slug');
        $material_sub_category_id = $request->input('sub_category');
        $title = $request->input('title');
        $h1 = $request->input('h1');
        $description = $request->input('description');

        $main_properties = $request->input('main_properties');
        $vidy_postavki = $request->input('vidy_postavki');
        $him_sostav = $request->input('him_sostav');
        $tehnolog_properties = $request->input('tehnolog_properties');
        $meh_properties = $request->input('meh_properties');
        $fiz_properties = $request->input('fiz_properties');
        $temps_kritich_tochek = $request->input('temps_kritich_tochek');
        $international_analogs = $request->input('international_analogs');
        $faq = $request->input('faq');
        $sources_information = $request->input('sources_information');
        $tverdost = $request->input('tverdost');
        $redactor_id = $request->input('redactor_id');

        $updated_at = date('Y-m-d H:i:s');

        // Записываем данные в базу

        $query = "UPDATE materials SET material_name='{$material_name}', slug='{$slug}', faq='{$faq}',
                 material_sub_category_id='{$material_sub_category_id}', main_properties='{$main_properties}', title='{$title}',
                 h1='{$h1}', description='{$description}', vidy_postavki='{$vidy_postavki}', him_sostav='{$him_sostav}',
                 tehnolog_properties='{$tehnolog_properties}', meh_properties='{$meh_properties}', fiz_properties='{$fiz_properties}',
                 temps_kritich_tochek='{$temps_kritich_tochek}', international_analogs='{$international_analogs}',
                 sources_information='{$sources_information}', tverdost='{$tverdost}', redactor_id='{$redactor_id}',
                 updated_at='{$updated_at}' WHERE id='{$id}'";

        DB::update($query);

        return view('pages.rulilka.successful_add_notif', [
            'title' => 'Материал '.$material_name.' изменен!',
            'id' => $id,
            'material_name' => $material_name,
            'route' => 'edit-made-material'
        ]);

    }

}
