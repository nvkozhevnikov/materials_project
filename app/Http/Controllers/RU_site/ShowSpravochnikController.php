<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use App\Models\Ru_site\Spravochnik;
use Illuminate\Http\Request;

class ShowSpravochnikController extends Controller
{
    public function index()
    {
        $articles = Spravochnik::select('spravochnik.slug', 'spravochnik.h1', 'spravochnik.thumb_img_logo_article',
                    'sc.slug as slug_category')
                    ->leftJoin('spravochnik_categories as sc', 'spravochnik.spravochnik_category_id', '=', 'sc.id')
                    ->where('spravochnik.active', '=', 1)->reorder('spravochnik.id', 'desc')
                    ->paginate(20);

        $title_text = 'Справочник инженера, технолога, техника, слесаря';
        $description_text = "Справочник - статьи по металлам, металлообработке, справочные данные в машиностроении и смежных областях";

        if ($articles->currentPage() == 1){
            $title = $title_text;
            $description = $description_text;
        } else {
            $title = $title_text. ' | Страница ' .$articles->currentPage();
            $description = $description_text. ' | Страница ' .$articles->currentPage();
        }

        return view('pages.ru_site.spravochnik_index', [
            'h1' => 'Справочник',
            'title' => $title,
            'description' => $description,
            'articles' => $articles,
        ]);
    }
}
