<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use App\Modules\ContentsOfArticle\CreateContentsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShowArticleController extends Controller
{
    public function show($slug_category, $slug_article)
    {
        $validator = validator(['slug_article' => $slug_article],
                               ['slug_article' => 'required|string|regex:/^[a-z0-9\-]+$/u|max:500']);
        $slug_article = $validator->validate()['slug_article'];

        $query = "SELECT s.*, sc.category_name, sc.slug slug_category, stn.tag_name, stn.slug slug_tag
                    FROM spravochnik s
                    LEFT JOIN (spravochnik_categories sc, spravochnik_tags st, spravochnik_tags_name stn)
                    ON (s.spravochnik_category_id = sc.id AND st.article_id = s.id AND stn.id = st.tag_name_id)
                    WHERE s.slug = '{$slug_article}' AND s.active = 1";
        $article = DB::select($query);

        $query_related_post = "SELECT s.slug, s.h1, s.thumb_img_logo_article, sc.slug slug_category
                                FROM spravochnik s
                                LEFT JOIN (spravochnik_categories sc)
                                ON (s.spravochnik_category_id = sc.id)
                                WHERE s.id IN
                                (SELECT related_article_id FROM spravochnik_related_articles WHERE article_id = {$article[0]->id})";
        $related_articles = DB::select($query_related_post);

        if(!$article) {
            abort(404);
        }

        //Генерируем содержание статьи и добаляем атрибуты в заголовки для ссылок-якорей
        $contents_of_article = CreateContentsArticle::generateArticle($article[0]->post);
        $soderzhanie = $contents_of_article['soderzhanie'];
        $article_text = $contents_of_article['article_text'];

        $current_url = $_SERVER['REQUEST_URI'];

        return view('pages.ru_site.article_show',
                    compact('article', 'current_url', 'soderzhanie', 'article_text', 'related_articles'));

    }
}
