<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowArticleCategoriesController extends Controller
{
    public function showCategory($slug_category)
    {
        $query = "SELECT sc.category_name, sc.slug slug_category, s.slug slug_article, s.h1 h1_article,
                            s.thumb_img_logo_article
                    FROM spravochnik_categories sc
                    LEFT JOIN (spravochnik s)
                    ON (s.spravochnik_category_id = sc.id)
                    WHERE sc.slug = '{$slug_category}' AND s.active = 1";
        $category_articles = DB::select($query);

        if(!$category_articles){
            abort(404);
        }

        $h1 = $category_articles[0]->category_name;
        $title = $category_articles[0]->category_name. ' | MetalWorkInd.com';
        $description = 'В этом разделе собраны материалы на тему '.$category_articles[0]->category_name;


        return view('pages.ru_site.article_category_show',
                    compact('category_articles', 'h1', 'title', 'description'));

    }
}
