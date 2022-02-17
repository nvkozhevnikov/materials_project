<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowGostsController extends Controller
{
    public function index()
    {
        $query = "SELECT kg1.id, kg1.slug slug_razdela, kg1.name name_razdela, kg1.number_razdela, kg2.slug slug_gruppy,
                        kg2.gruppa, kg2.name name_gruppy, kg2.klassifikator_gostov_1_ur_id link_id_razdela
                  FROM klassifikator_gostov_2_ur kg2
                  LEFT JOIN (klassifikator_gostov_1_ur kg1)
                  ON (kg2.klassifikator_gostov_1_ur_id = kg1.id)
                  WHERE kg2.active = 1
                  ORDER BY kg2.gruppa";
        $data = DB::select($query);

	if(empty($data)){
		abort(404);
	}

        $razdely_array = array();
        foreach ($data as $item) {
            array_push($razdely_array, array($item->id, $item->slug_razdela, $item->name_razdela, $item->number_razdela));
        }
        $unique_razdely = array_unique($razdely_array, SORT_REGULAR);

        return view('pages.ru_site.gosts_categories', [
            'h1' => 'Классификатор государственных стандартов',
            'title' => 'Классификатор государственных стандартов (ГОСТ)',
            'description' => 'Классификатор государственных стандартов (ГОСТ) - раздел "Металлы и металлические изделия"',
            'data' => $data,
            'razdely' => $unique_razdely,
        ]);
    }

    public function showRazdel($slug_razdela)
    {
        $query = "SELECT kg2.slug slug_gruppy, kg2.gruppa number_gruppy, kg2.name name_gruppy, kg1.name name_razdela,
                            kg1.number_razdela
                  FROM klassifikator_gostov_2_ur kg2
                  LEFT JOIN (klassifikator_gostov_1_ur kg1)
                  ON (kg2.klassifikator_gostov_1_ur_id = kg1.id)
                  WHERE kg2.klassifikator_gostov_1_ur_id = (SELECT id FROM klassifikator_gostov_1_ur WHERE slug = '{$slug_razdela}')
                  AND kg2.active = 1";

        $data = DB::select($query);

	if(empty($data)){
		abort(404);
	}

        $number_razdela = $data[0]->number_razdela;
        $name_razdela = $data[0]->name_razdela;

        return view('pages.ru_site.gosts_one_razdel', [
            'slug_razdela' => $slug_razdela,
            'slug_gruppy' => $data[0]->slug_gruppy,
            'title' => $data[0]->name_razdela. ' - раздел общероссийского классификатора государственных стандартов',
            'h1' =>  "$number_razdela - $name_razdela",
            'description' => $data[0]->name_razdela. ' - раздел общероссийского классификатора государственных стандартов: перечень и наименование групп, входящих в раздел.',
            'data' => $data,
        ]);
    }

    public function showGruppa($slug_razdela, $slug_gruppy)
    {
        $query = "SELECT gm.slug standard_slug, gm.standard, gm.standard_number, gm.standard_title, kg2.name name_gruppy,
                        kg2.gruppa number_gruppy, kg1.name razdel_name
                  FROM gost_materials gm
                  LEFT JOIN (klassifikator_gostov_2_ur kg2, klassifikator_gostov_1_ur kg1)
                  ON (gm.klassifikator_gostov_2_ur_id = kg2.id AND  kg2.klassifikator_gostov_1_ur_id = kg1.id)
                  WHERE klassifikator_gostov_2_ur_id =
                        (SELECT id FROM klassifikator_gostov_2_ur WHERE slug = '{$slug_gruppy}') ORDER BY gm.standard_number";

        $data = DB::select($query);

	if(empty($data)){
		abort(404);
	}

        $standard_group_number = $data[0]->number_gruppy;
        $standard_group_name = $data[0]->name_gruppy;

        return view('pages.ru_site.gosts_gruppy', [
            'title' => "$standard_group_name - $standard_group_number" . ' перечень стандартов',
            'description' => 'Перечень государственных стандартов из классификатора Российской Федерации, входящих в группу ' . mb_strtolower($standard_group_name),
            'h1' => "$standard_group_number - $standard_group_name",
            'slug_razdela' => $slug_razdela,
            'slug_gruppy' => $slug_gruppy,
            'razdel_name' => $data[0]->razdel_name,
            'name_gruppy' => $data[0]->name_gruppy,
            'data' => $data,
        ]);
    }

    public function showGost($slug_razdela, $slug_gruppy, $slug_gost)
    {
        $query = "SELECT gm.standard, gm.standard_number, gm.standard_title, kg2.name name_gruppy,
                            kg1.name razdel_name
                  FROM gost_materials gm
                  LEFT JOIN (klassifikator_gostov_2_ur kg2, klassifikator_gostov_1_ur kg1)
                  ON (gm.klassifikator_gostov_2_ur_id = kg2.id AND kg2.klassifikator_gostov_1_ur_id = kg1.id)
                  WHERE gm.slug = '{$slug_gost}'";

        $data = DB::select($query);

	if(empty($data)){
		abort(404);
	}

        $standard = $data[0]->standard;
        $standard_number = $data[0]->standard_number;

        return view('pages.ru_site.gost', [
            'slug_razdela' => $slug_razdela,
            'slug_gruppy' => $slug_gruppy,
            'slug_gost' => $slug_gost,
            'name_gruppy' => $data[0]->name_gruppy,
            'razdel_name' => $data[0]->razdel_name,
            'standard_name' => "$standard $standard_number",
            'h1' => "$standard $standard_number",
            'data' => $data,
            'current_url' => $_SERVER['REQUEST_URI'],
        ]);
    }
}
