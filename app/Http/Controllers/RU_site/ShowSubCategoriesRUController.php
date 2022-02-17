<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowSubCategoriesRUController extends Controller
{
    public function index($slug)
    {
        $query = "(SELECT m.material_name, m.slug, msc.sub_category_name, msc.slug slug_sub_category,
                        (SELECT category_name FROM material_categories WHERE slug = '{$slug}') category_name
                  FROM materials m
                  LEFT JOIN (material_sub_categories msc)
                  ON (m.material_sub_category_id = msc.id)
                  WHERE m.material_sub_category_id
                  IN (SELECT id FROM material_sub_categories WHERE material_category_id =
                                                           (SELECT id FROM material_categories WHERE slug = '{$slug}'))
                  ORDER BY msc.id, m.material_name)";

        $data = DB::select($query);

	if(empty($data)){
		abort(404);
	}

        $sub_categories_array = array();
        foreach ($data as $item) {
            array_push($sub_categories_array, array($item->sub_category_name, $item->slug_sub_category));
        }

        //Добавляем в массив все подкатегории и удаляем дубликаты (получаем уникальные подкатегории)
        $unique_sub_categories = array_unique($sub_categories_array, SORT_REGULAR);

        return view('pages.ru_site.material_sub_categories', [
            'h1' => $data[0]->category_name,
            'title' => $data[0]->category_name. ' - марки материалов, группы, классифицированных по ГОСТ',
            'description' => $data[0]->category_name.' - марки материалов и классификация согласно ГОСТ РФ.',
            'data' => $data,
            'unique_sub_categories' => $unique_sub_categories,
            'slug_category' => $slug,
        ]);
    }

    public function getOneSubCategory($slug_category, $slug_sub_category)
    {
        $query = "(SELECT m.slug, m.material_name, msc.sub_category_name, mc.category_name
                   FROM materials m
                   LEFT JOIN (material_sub_categories msc, material_categories mc)
                   ON (m.material_sub_category_id = msc.id AND mc.id = msc.material_category_id)
                   WHERE m.material_sub_category_id =
                                        (SELECT id FROM material_sub_categories WHERE slug = '{$slug_sub_category}')
                   ORDER BY m.material_name)";

        $data = DB::select($query);

	if(empty($data)) {
		abort(404);
	}

        return view('pages.ru_site.materials_one_sub_category',[
            'slug_category' => $slug_category,
            'slug_sub_category' => $slug_sub_category,
            'category_name' => $data[0]->category_name,
            'h1' => $data[0]->sub_category_name,
            'title' => $data[0]->sub_category_name.' - список марок материалов, изготавливаемых по ГОСТ РФ',
            'description' => $data[0]->sub_category_name.' - полный перечень марок материалов, прозводимых в РФ по ГОСТ.',
            'data' => $data,
        ]);
    }

}
