<?php

namespace App\Http\Controllers\CompileMaterials;

use App\Http\Controllers\Controller;
use App\Models\CompileMaterials\Spravochnik;
use App\Models\CompileMaterials\SpravochnikSubCatogory;
use App\Models\CompileMaterials\SpravochnikTag;
use App\Models\CompileMaterials\SpravochnikTagName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function add()
    {
        $sub_categories = SpravochnikSubCatogory::select('id', 'category_name')->get();
        $tags = DB::table('spravochnik_tags_name')->select('id', 'tag_name')->get();
        return view('pages.rulilka.add_new_article',
                    compact('sub_categories', 'tags'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'h1' => 'required|string|max:255',
            'slug' => 'required|string|regex:/^[a-z0-9\-]+$/u|max:255',
            'sub_category' => 'required|string|max:255',
            'tag' => 'required|int',
            'title' => 'required|string|max:300',
            'description' => 'required|string|max:300',
            'post' => 'required|string|max:25000',
            'post_description' => 'required|string|max:25000',
            'creator_id' => 'required|int|max:5',
            'active' => 'int|max:1',
        ]);

        $slug = $request->input('slug');
        $h1 = $request->input('h1');
        $title = $request->input('title');
        $spravochnik_sub_category_id = $request->input('sub_category');
        $tag_id = $request->input('tag');
        $description = $request->input('description');
        $post = $request->input('post');
        $post_description = $request->input('post_description');
        $creator_id = $request->input('creator_id');
        $active = intval($request->input('active'));
        $created_at = date('Y-m-d H:i:s');

        if($request->file('thumb_logo_img_article')) {
            $thumb_file_name = $request->file('thumb_logo_img_article')->getClientOriginalName();

            if (file_exists(storage_path('app/public/thumb_logo_articles/' . $thumb_file_name))) {
                $new_thumb_file_name = explode('.', $thumb_file_name);
                $f = $new_thumb_file_name[0] . '-' . rand(0, 1000);
                $thumb_file_name = $f . '.' . $new_thumb_file_name[1];
            }

            $path_thumb_img_logo = $request->file('thumb_logo_img_article')->storeAs('thumb_logo_articles', $thumb_file_name);

            $query = "INSERT INTO spravochnik (spravochnik_category_id, slug, h1, title, description, post, post_description,
                         active, creator_id, created_at, redactor_id, thumb_img_logo_article)
                    VALUES ('{$spravochnik_sub_category_id}', '{$slug}', '{$h1}', '{$title}', '{$description}', '{$post}',
                            '{$post_description}', '{$active}', '{$creator_id}', '{$created_at}',
                            '{$creator_id}', '{$path_thumb_img_logo}')";
        } else {
            $query = "INSERT INTO spravochnik (spravochnik_category_id, slug, h1, title, description, post, post_description,
                         active, creator_id, created_at, redactor_id)
                    VALUES ('{$spravochnik_sub_category_id}', '{$slug}', '{$h1}', '{$title}', '{$description}', '{$post}',
                            '{$post_description}', '{$active}', '{$creator_id}', '{$created_at}',
                            '{$creator_id}')";
        }

        DB::insert($query);

        $article_id = "SELECT id FROM spravochnik WHERE slug = '{$slug}'";
        $query_tag = "INSERT INTO spravochnik_tags (article_id, tag_name_id)
                        VALUES (({$article_id}), '{$tag_id}')";

        DB::insert($query_tag);

        return view('pages.rulilka.successful_add_notif', [
            'title' => 'Статья '.$h1.' создана',
            'material_check' => '1',
        ]);
    }

    public function showArticles()
    {
        $articles = Spravochnik::orderBy('id', 'desc')->paginate(15);
        $search_route = 'articles.search';

        return view('pages.rulilka.show_made_articles',
            compact('articles', 'search_route'));
    }

    public function editShowArticle($id)
    {
        $validator = validator(['id' => $id], ['id' => 'required|int']);
        $id = $validator->validate()['id'];

        $sub_categories = SpravochnikSubCatogory::select('id', 'category_name')->get();
        $article = Spravochnik::where('id', $id)->first();
        $tags = SpravochnikTagName::select('id', 'tag_name')->get();
        $query_current_tag = "SELECT stn.id FROM spravochnik_tags_name stn
                                    LEFT JOIN (spravochnik_tags st, spravochnik s)
                                    ON (st.article_id = s.id AND st.tag_name_id = stn.id)
                                    WHERE s.id = {$id}";
        $current_tag = DB::select($query_current_tag);
        $route = 'article.show';

        return view('pages.rulilka.edit_article',
                compact('sub_categories', 'article', 'tags', 'current_tag', 'route')
        );
    }

    public function editArticle(Request $request)
    {
        $request->validate([
            'h1' => 'required|string|max:255',
            'slug' => 'required|string|regex:/^[a-z0-9\-]+$/u|max:255',
            'sub_category' => 'required|string|max:255',
            'tag' => 'required|int',
            'title' => 'required|string|max:300',
            'description' => 'required|string|max:300',
            'post' => 'required|string|max:25000',
            'post_description' => 'required|string|max:1000',
            'redactor_id' => 'required|int|max:5',
            'active' => 'string|max:5',
            'id' => 'required|int',
        ]);

        $id = $request->input('id');
        $slug = $request->input('slug');
        $spravochnik_sub_category_id = $request->input('sub_category');
        $tag_id = $request->input('tag');
        $h1 = $request->input('h1');
        $title = $request->input('title');
        $description = $request->input('description');
        $post = $request->input('post');
        $post_description = $request->input('post_description');
        $redactor_id = $request->input('redactor_id');

        $post = str_replace('../..', '', $post);
        $post_description = str_replace('../..', '', $post_description);

        $active = $request->input('active');
        if($active == 'on'){
            $active = 1;
        } else {
            $active = 0;
        }

        if(is_null($request->file('thumb_logo_img_article'))) {
            $path_thumb_img_logo = NULL;
        } else {
            $thumb_file_name = $request->file('thumb_logo_img_article')->getClientOriginalName();
            if (file_exists(storage_path('app/public/thumb_logo_articles/' . $thumb_file_name))) {
                $new_thumb_file_name = explode('.', $thumb_file_name);
                $f = $new_thumb_file_name[0] . '-' . rand(0, 1000);
                $thumb_file_name = $f . '.' . $new_thumb_file_name[1];
            }
            $path_thumb_img_logo = $request->file('thumb_logo_img_article')->storeAs('thumb_logo_articles', $thumb_file_name);
        }

        $updated_at = date('Y-m-d H:i:s');

        if(is_null($path_thumb_img_logo)){
            $query = "UPDATE spravochnik
                      SET slug = '{$slug}', h1 = '{$h1}', title = '{$title}', spravochnik_category_id = '{$spravochnik_sub_category_id}',
                      description = '{$description}', post = '{$post}', post_description = '{$post_description}',
                      redactor_id = '{$redactor_id}', active = '{$active}', updated_at = '{$updated_at}' WHERE id = '{$id}'";
        } else {
            $query = "UPDATE spravochnik
                      SET slug = '{$slug}', h1 = '{$h1}', title = '{$title}', spravochnik_category_id = '{$spravochnik_sub_category_id}',
                      description = '{$description}', post = '{$post}', post_description = '{$post_description}',
                      redactor_id = '{$redactor_id}', active = '{$active}', updated_at = '{$updated_at}',
                      thumb_img_logo_article = '{$path_thumb_img_logo}' WHERE id = '{$id}'";
        }
        DB::update($query);

        $tag_query_update = "UPDATE spravochnik_tags SET tag_name_id = {$tag_id} WHERE article_id = {$id}";
        DB::update($tag_query_update);

        return view('pages.rulilka.successful_add_notif', [
            'title' => 'Статья '.$h1.' изменена!',
            'id' => $id,
            'route' => 'article.edit'
        ]);


    }
}
