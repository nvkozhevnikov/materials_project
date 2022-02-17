<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowTagArticlesController extends Controller
{
    public function showTag($slug_tag)
    {
        $query = "SELECT sc.slug slug_category, s.slug slug_article, s.h1 h1_article, s.thumb_img_logo_article, stn.tag_name
                    FROM spravochnik s
                    LEFT JOIN (spravochnik_categories sc, spravochnik_tags_name stn)
                    ON (s.spravochnik_category_id = sc.id AND stn.id = (SELECT stn.id FROM spravochnik_tags_name stn WHERE stn.slug = '{$slug_tag}'))
                    WHERE s.id IN
                          (SELECT st.article_id FROM spravochnik_tags st WHERE st.tag_name_id =
                                                                         (SELECT stn.id FROM spravochnik_tags_name stn WHERE stn.slug = '{$slug_tag}'))";

        $tag_articles = DB::select($query);

	if(empty($tag_articles)){
		abort(404);
	}

        $tag_name = $tag_articles[0]->tag_name;
        $h1 = $tag_name;
        $title = $tag_name.' | MetalWorkInd.com';
        $description = 'В этом разделе собраны материалы с тэгом '.$tag_name;

        return view('pages.ru_site.article_tag',
                    compact('tag_articles', 'slug_tag', 'tag_name',
                    'h1', 'title', 'description'));
    }
}
