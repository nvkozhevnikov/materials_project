<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Http\Controllers\Controller;
use App\Models\CompileMaterials\ShowHarkovMaterial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowHarkovMaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = DB::table('harkov_materials')->select('id','material_name')
            ->whereNull('change_mtrl')->paginate(15);
        $header_h2 = 'Материалы splav-kharkov.com';
        $quantity_raw_materials = DB::table('harkov_materials')->whereNull('change_mtrl')->count();

        return view('pages.rulilka.materials_list', [
            'header_h2' => $header_h2,
            'materials' => $materials,
            'quantity_raw_materials' => $quantity_raw_materials,
            'site' => 'harkov',
            'search_route' => 'search-harkov',
        ]);
    }

    public function getMaterial($id)
    {
        $data_of_material = DB::table('harkov_materials')->where('id',$id)->first();
        $material_name = $data_of_material->material_name;

        return view('pages.rulilka.show_material_compile',[
            'id' => $data_of_material->id,
            'header_h1' => 'Компиляция материала ' . $material_name,
            'category_name' => $data_of_material->category_name,
            'material_name' => $material_name,
            'url' => $data_of_material->url,
            'title' => $data_of_material->title,
            'h1' => $data_of_material->h1,
            'description' => $data_of_material->description,
            'tables' => $data_of_material->tables,
            'body' => $data_of_material->body,
            'data_of_material' => $data_of_material,
            'site' => 'harkov',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\ShowHarkovMaterial  $showHarkovMaterial
     * @return \Illuminate\Http\Response
     */
    public function show(ShowHarkovMaterial $showHarkovMaterial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\ShowHarkovMaterial  $showHarkovMaterial
     * @return \Illuminate\Http\Response
     */
    public function edit(ShowHarkovMaterial $showHarkovMaterial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\ShowHarkovMaterial  $showHarkovMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShowHarkovMaterial $showHarkovMaterial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\ShowHarkovMaterial  $showHarkovMaterial
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShowHarkovMaterial $showHarkovMaterial)
    {
        //
    }
}
