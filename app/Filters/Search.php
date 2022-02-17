<?php

namespace App\Filters;

class Search extends QueryFilter{

    public function s($search_string = ''){

        $validator = validator(['s' => $search_string], ['s' => 'required|string|max:60']);
        $search_string = $validator->validate()['s'];

        $razdel = $this->request->search_radio;

        if ($razdel == 'gost') {
            return $this->builder
                ->select('gost_materials.standard', 'gost_materials.standard_number', 'gost_materials.standard_title',
                    'gost_materials.slug as slug_gost', 'klassifikator_gostov_2_ur.slug as slug_gruppy',
                    'klassifikator_gostov_1_ur.slug as slug_razdela')
                ->leftJoin('klassifikator_gostov_2_ur', 'gost_materials.klassifikator_gostov_2_ur_id', '=', 'klassifikator_gostov_2_ur.id')
                ->leftJoin('klassifikator_gostov_1_ur', 'klassifikator_gostov_2_ur.klassifikator_gostov_1_ur_id', '=', 'klassifikator_gostov_1_ur.id')
                ->where('gost_materials.standard_number', 'LIKE', '%' . $search_string . '%')
                ->orWhere('gost_materials.standard_title', 'LIKE', '%' . $search_string . '%');
        } elseif ($razdel == 'spravochnik') {
            return $this->builder
                ->select('spravochnik.*', 'sc.slug as slug_category')
                ->leftJoin('spravochnik_categories as sc', 'spravochnik.spravochnik_category_id', '=', 'sc.id')
                ->where('spravochnik.post', 'LIKE', '%' . $search_string . '%');
        } else {
            return $this->builder
                ->select('material_sub_categories.slug as msc_slug', 'material_categories.slug as mc_slug',
                    'materials.material_name', 'materials.slug as m_slug', 'materials.h1')
                ->leftJoin('material_sub_categories', 'material_sub_categories.id', '=', 'materials.material_sub_category_id')
                ->leftJoin('material_categories', 'material_sub_categories.material_category_id', '=', 'material_categories.id')
                ->where('materials.material_name', 'LIKE', '%' . $search_string . '%')
                ->orWhere('materials.h1', 'LIKE', '%' . $search_string . '%');
        }
    }
}
