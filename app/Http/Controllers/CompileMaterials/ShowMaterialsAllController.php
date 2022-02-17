<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMaterialsAllController extends Controller
{
    public function index()
    {
        $materials = DB::select('select harkov_materials.id, harkov_materials.material_name
                        from harkov_materials inner join metportal_materials on
                        lower(harkov_materials.material_name) = lower(metportal_materials.material_name)
                        where harkov_materials.change_mtrl is NULL ORDER BY RAND() limit 20');
        $quantity_raw_materials = DB::select('select count(harkov_materials.id) as cm
                        from harkov_materials inner join metportal_materials on
                        lower(harkov_materials.material_name) = lower(metportal_materials.material_name)
                        where harkov_materials.change_mtrl is NULL');
        foreach ($quantity_raw_materials as $item) {$cm = $item->cm;}
        return view ('pages.rulilka.materials_list', [
            'materials' => $materials,
            'site' => 'all_sites',
            'header_h2' => 'Общие материалы harkov и metportal',
            'quantity_raw_materials' => $cm,
            'search_route' => 'search-all-sources',
        ]);
    }

    public function getMaterial($id)
    {
        $query = 'select h.id, h.url url_h, m.url url_m, h.category_name category_name_h, m.category_name category_name_m,
                  h.material_name, h.title title_h, m.title title_m, h.h1 h1_h, m.h1 h1_m, h.description desc_h,
                  h.body body_h, m.body body_m, h.tables tables_h, m.tables tables_m
                  from harkov_materials h inner join metportal_materials m on
                        lower(h.material_name) = lower(m.material_name) where h.id = '. $id;
        $data_of_material = DB::select($query);
        $material_name = $data_of_material[0]->material_name;

        return view('pages.rulilka.show_material_compile',[
            'id' => $data_of_material[0]->id,
            'site' => 'all_sites',
            'data_of_material' => $data_of_material[0],
            'header_h1' => 'Компиляция материала ' . $material_name,
            'material_name' => $material_name,
            'url_h' => $data_of_material[0]->url_h,
            'url_m' => $data_of_material[0]->url_m,
            'category_name_h' => $data_of_material[0]->category_name_h,
            'category_name_m' => $data_of_material[0]->category_name_m,
            'title_h' => $data_of_material[0]->title_h,
            'title_m' => $data_of_material[0]->title_m,
            'h1_h' => $data_of_material[0]->h1_h,
            'h1_m' => $data_of_material[0]->h1_m,
            'desc_h' => $data_of_material[0]->desc_h,
            'body_h' => $data_of_material[0]->body_h,
            'body_m' => $data_of_material[0]->body_m,
            'tables_h' => $data_of_material[0]->tables_h,
            'tables_m' => $data_of_material[0]->tables_m,



        ]);

    }


}
