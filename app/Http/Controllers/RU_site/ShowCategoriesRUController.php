<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use App\Models\Ru_site\MaterialCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ShowCategoriesRUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = DB::select('SELECT mc.slug, mc.category_name, mc.metal_color, mc.id, m.material_name FROM materials m
                                        LEFT JOIN (material_sub_categories msc, material_categories mc)
                                        ON (m.material_sub_category_id = msc.id AND msc.material_category_id = mc.id)
                                        ORDER BY mc.id');

        $count_materials = array();
        $categories_list = array();

        foreach ($categories as $item) {
            if (array_key_exists($item->id, $count_materials)) {
                $count_materials[$item->id] += 1;
            } else {
                $count_materials[$item->id] = 1;
            }
            if(array_key_exists($item->slug, $categories_list)) {
                continue;
            } else {
                $categories_list[$item->slug] = array('slug' => $item->slug,
                                                      'category_name' => $item->category_name,
                                                      'metal_color' => $item->metal_color,
                                                      'category_id' => $item->id,
                                                      );
            }
        }

        return view('pages.ru_site.material_categories', [
            'title' => 'Марочник материалов и сплавов',
            'h1' => 'Марочник материалов и сплавов',
            'description' => 'Описание категории',
            'categories' => $categories_list,
            'count_materials' => $count_materials,
        ]);
    }

}
