<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Http\Controllers\Controller;
use App\Models\CompileMaterials\ShowMetportalMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMetportalMaterialsController extends Controller
{
    public function index()
    {
        $materials = DB::table('metportal_materials')->select('id','material_name')
            ->whereNull('change_mtrl')->paginate(15);
        $header_h2 = 'Материалы metallicheskiy-portal.ru';
        $quantity_raw_materials = DB::table('metportal_materials')->whereNull('change_mtrl')->count();

        return view('pages.rulilka.materials_list', [
            'header_h2' => $header_h2,
            'materials' => $materials,
            'quantity_raw_materials' => $quantity_raw_materials,
            'site' => 'metportal',
            'search_route' => 'search-metportal',
        ]);
    }

    public function getMaterial($id)
    {
        $data_of_material = DB::table('metportal_materials')->where('id',$id)->first();
        $material_name = $data_of_material->material_name;
        return view('pages.rulilka.show_material_compile',[
            'header_h1' => 'Компиляция материала ' . $material_name,
            'category_name' => $data_of_material->category_name,
            'material_name' => $material_name,
            'url' => $data_of_material->url,
            'title' => $data_of_material->title,
            'h1' => $data_of_material->h1,
            'tables' => $data_of_material->tables,
            'body' => $data_of_material->body,
            'site' => 'metportal',
            'data_of_material' => $data_of_material,
        ]);
    }
}
