<?php

namespace App\Http\Controllers\Ru_site;

use App\Http\Controllers\Controller;
use App\Models\Ru_site\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowMaterialRuController extends Controller
{
    public function show($slug_category, $slug_sub_category, $slug_material_name)
    {
        $data = DB::table('materials as m')
            ->select('m.*', 'mgm.*', 'mc.category_name', 'msc.sub_category_name')
            ->leftJoin('material_sub_categories as msc', 'm.material_sub_category_id', '=', 'msc.id')
            ->leftJoin('material_categories as mc', 'msc.material_category_id', '=', 'mc.id')
            ->leftJoin('metallography_materials as mgm', 'm.id', '=', 'mgm.material_id')
            ->where('m.slug', $slug_material_name)
            ->get();

	if($data->isEmpty()){
		abort(404);
	}
        return view('pages.ru_site.material_card',[
            'photos' => $data,
            'material' => $data[0],
            'category_name' => $data[0]->category_name,
            'sub_category_name' => $data[0]->sub_category_name,
            'slug_category' => $slug_category,
            'slug_sub_category' => $slug_sub_category,
            'material_name' => $data[0]->material_name,
            'slug_material' => $data[0]->slug,
            'current_url' => $_SERVER['REQUEST_URI'],
        ]);

    }
    public function test()
    {
//        $material = Material::where('id',19)->first();
        $data = DB::table('materials')
            ->leftJoin('metallography_materials', 'materials.id', '=', 'metallography_materials.material_id')
            ->where('materials.id',19)
            ->get();

        foreach ($data as $material) {
            $material;
            break;
        }

        return view('pages.ru_site.material_card',[
            'photos' => $data,
            'material' => $material,

        ]);
    }

    public function test2()
    {
//        $material = Material::where('id',19)->first();
        $data = DB::table('materials')
            ->leftJoin('metallography_materials', 'materials.id', '=', 'metallography_materials.material_id')
            ->where('materials.id',59)
            ->get();

        foreach ($data as $material) {
            $material;
            break;
        }

        return view('pages.ru_site.material_card',[
            'photos' => $data,
            'material' => $material,

        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
