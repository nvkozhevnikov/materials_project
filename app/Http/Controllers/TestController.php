<?php

namespace App\Http\Controllers;

use App\Modules\NewsParser\NewsParser;
use App\Models\Ru_site\News;
use App\Models\CompileMaterials\RelatedArticles;
use App\Models\CompileMaterials\Spravochnik;
use App\Modules\RelatedArticlesSeacher\RelatedArticlesSeacher;

class TestController extends Controller
{
    public function getNews()
    {
        $parser = new NewsParser;
        git
        foreach ($parser->getData() as $source => $item) {
            $last_date = strtotime('-1 day', strtotime(date('Y-m-d')));
            $parse_date = strtotime($item['date']);

            if($last_date < $parse_date) {
                News::firstOrCreate(
                    ['title' => $item['title']],
                    ['title' => $item['title'], 'url' => $item['url'], 'published_date' => $item['date'], 'source' => $source]
                );
            }
        }
    }

    public function getRelatedArticles()
    {
        RelatedArticles::truncate();
        $all_articles = Spravochnik::select('id', 'title', 'post', 'post_description')->where('active', 1)->get();

        foreach ($all_articles as $id) {
            $article = Spravochnik::select('title', 'post', 'post_description')->where('id', $id->id)->first();
            $seacher = new RelatedArticlesSeacher;
            $text = $seacher->get_minification_array($article->title . ' ' . $article->post . ' ' . $article->post_description);
            $similar_articles = $seacher->searchSimilarArticle($text, $all_articles);

            foreach ($similar_articles as $rel_id => $value) {
                $related_article = new RelatedArticles;
                $related_article->article_id = $id->id;
                $related_article->related_article_id = $rel_id;
                $related_article->save();
            }
        }
    }
}
