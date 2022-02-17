<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Http\Controllers\Controller;
use App\Models\CompileMaterials\Spravochnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CompileMaterials\Material;

class SearchController extends Controller
{
    public function searchArticles(Request $request)
    {
        $s = $request->s;
        $articles = Spravochnik::where('post', 'like', '%'.$s.'%')
            ->orWhere('post_description', 'like', '%'.$s.'%')
            ->get();

        $search_route = 'articles.search';

        return view('pages.rulilka.search_result',
                compact('articles', 'search_route'));

    }
    public function searchHar(Request $request)
    {
        $s = $request->s;
        $materials = DB::table('harkov_materials')->select('id', 'material_name')
            ->where('material_name', 'LIKE', "%{$s}%")
            ->whereNull('change_mtrl')
            ->get();

        return view('pages.rulilka.search_result', [
            'materials' => $materials,
            'search_route' => 'search-harkov',
        ]);

    }

    public function searchHarMade(Request $request)
    {
        $s = $request->s;
        $materials = DB::table('harkov_materials')->select('id', 'material_name')
            ->where('material_name', 'LIKE', "%{$s}%")
            ->whereNotNull('change_mtrl')
            ->get();

        return view('pages.rulilka.search_result', [
            'materials' => $materials,
            'search_route' => 'search-harkov-made',
        ]);

    }

    public function searchMetport(Request $request)
    {
        $s = $request->s;
        $materials = DB::table('metportal_materials')->select('id', 'material_name')
            ->where('material_name', 'LIKE', "%{$s}%")
            ->whereNull('change_mtrl')
            ->get();

        return view('pages.rulilka.search_result', [
            'materials' => $materials,
            'search_route' => 'search-metportal',
        ]);
    }

    public function searchMetportMade(Request $request)
    {
        $s = $request->s;
        $materials = DB::table('metportal_materials')->select('id', 'material_name')
            ->where('material_name', 'LIKE', "%{$s}%")
            ->whereNotNull('change_mtrl')
            ->get();

        return view('pages.rulilka.search_result', [
            'materials' => $materials,
            'search_route' => 'search-metportal-made',
        ]);
    }


    public function searchAllSources(Request $request)
    {
        $s = $request->s;
        $query = 'select id, material_name from harkov_materials where material_name like "%'.$s.'%" and change_mtrl IS NULL';
        $similar_materials = DB::select($query);
        $joint_materials = array();
        $e = 0;
        foreach ($similar_materials as $item){
            $id = $item->id;
            $sub_query = 'select h.id, h.material_name from harkov_materials h inner join metportal_materials m
                on lower(h.material_name) = lower(m.material_name) where h.id ='.$id;
            $find_joint_materials = DB::select($sub_query);

            foreach ($find_joint_materials as $item) {
                $joint_materials[$e] = array(array('id' => $item->id, 'material_name' => $item->material_name));
                $e++;
            }
        }
        return view('pages.rulilka.search_result', [
            'materials' => $joint_materials,
            'search_route' => 'search-all-sources',
        ]);
    }

    public function searchMadeMaterial(Request $request)
    {
        $s = $request->s;
        $request = Material::where('material_name', 'LIKE', "%{$s}%")->limit(150)->get();

        return view('pages.rulilka.search_result', [
            'materials' => $request,
            'search_route' => 'search-made-material',
        ]);
    }
}
