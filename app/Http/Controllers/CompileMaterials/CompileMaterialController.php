<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\CompileMaterials\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompileMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories = DB::table('material_sub_categories')
            ->select('id', 'sub_category_name')->get();

        return view('pages.rulilka.compiling_new_material', [
            'header_h1' => 'Создание нового материала',
            'sub_categories' => $sub_categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $request->validate([
            'material_name' => 'required|string|max:45',
            'slug' => 'required|string|regex:/^[a-z0-9\-]+$/u|max:99',
            'sub_category' => 'required|string',
            'title' => 'required|string|max:300',
            'h1' => 'required|string|max:300',
            'description' => 'required|string|max:300',

        ]);

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

        $created_at = date('Y-m-d H:i:s');

        $query = "INSERT INTO materials (material_sub_category_id, material_name, title, h1, description, slug, main_properties,
                       vidy_postavki, him_sostav, tehnolog_properties, meh_properties, fiz_properties, temps_kritich_tochek,
                       international_analogs, faq, tverdost, sources_information, redactor_id, created_at, creator_id)
                   VALUES ('{$material_sub_category_id}', '{$material_name}', '{$title}', '{$h1}', '{$description}', '{$slug}',
                           '{$main_properties}', '{$vidy_postavki}', '{$him_sostav}', '{$tehnolog_properties}', '{$meh_properties}',
                           '{$fiz_properties}', '{$temps_kritich_tochek}', '{$international_analogs}', '{$faq}',
                          '{$tverdost}', '{$sources_information}', '{$redactor_id}', '{$created_at}', '{$redactor_id}')";

        DB::insert($query);
        return view('pages.rulilka.successful_add_notif', [
            'title' => 'Материал '.$material_name.' создан',
            'route' => 'create-new-material',
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function done(Request $request)
    {
        $material_name = $request->input('material_name');
        $site = $request->input('site');
        $id = $request->input('id');

        if($site == 'all_sites'){
            $db_name_h = 'harkov_materials';
            $db_name_m = 'metportal_materials';
            $query_h = "UPDATE {$db_name_h} SET change_mtrl='1' WHERE material_name='{$material_name}'";
            $query_m = "UPDATE {$db_name_m} SET change_mtrl='1' WHERE material_name='{$material_name}'";
            DB::update($query_h);
            DB::update($query_m);

            return view('pages.rulilka.successful_add_notif', [
                'title' => 'Материал '.$material_name.' помечен как готов',
                'material_name' => $material_name,
                'id' => $id,
                'route' => 'done-new-material',
            ]);

        } elseif($site == 'metportal'){
            $db_name_m = 'metportal_materials';
            $query_m = "UPDATE {$db_name_m} SET change_mtrl='1' WHERE material_name='{$material_name}'";
            DB::update($query_m);

            return view('pages.rulilka.successful_add_notif', [
                'title' => 'Материал '.$material_name.' помечен как готов',
                'material_name' => $material_name,
                'id' => $id,
                'route' => 'done-new-material-met',
            ]);

        } else {
            $db_name_h = 'harkov_materials';
            $query_h = "UPDATE {$db_name_h} SET change_mtrl='1' WHERE material_name='{$material_name}'";
            DB::update($query_h);

            return view('pages.rulilka.successful_add_notif', [
                'title' => 'Материал '.$material_name.' помечен как готов',
                'route' => 'done-new-material-har',
                'second_path' => 'yes',
            ]);

        }

    }

    public function showEdit($id)
    {
        $material = Material::where('id',$id)->first();
        $sub_categories = DB::table('material_sub_categories')
            ->select('id', 'sub_category_name')->get();
        $user = User::where('id', $material->redactor_id)->first();

        return view('pages.rulilka.show_our_material_edit', [
            'sub_categories' => $sub_categories,
            'id' => $material->id,
            'title' => 'Редактирование материала '.$material->material_name,
            'db_table' => 'materials',
            'material_sub_category_id' => $material->material_sub_category_id,
            'material_name' => $material->material_name,
            'slug' => $material->slug,
            'faq' => $material->faq,
            'title_material' => $material->title,
            'h1' => $material->h1,
            'desc' => $material->description,
            'main_properties' => $material->main_properties,
            'vidy_postavki' => $material->vidy_postavki,
            'him_sostav' => $material->him_sostav,
            'tehnolog_properties' => $material->tehnolog_properties,
            'meh_properties' => $material->meh_properties,
            'fiz_properties' => $material->fiz_properties,
            'temps_kritich_tochek' => $material->temps_kritich_tochek,
            'international_analogs' => $material->international_analogs,
            'sources_information' => $material->sources_information,
            'tverdost' => $material->tverdost,
            'last_redactor' => $user->name,
        ]);
    }


}
