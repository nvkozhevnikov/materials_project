<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//})->name('main-page');

Route::middleware(['auth', 'active'])->get('/', 'App\Http\Controllers\RU_site\IndexPageController@index')->name('main-page');
Route::middleware(['auth', 'active'])->get('/test', 'App\Http\Controllers\TestController@getRelatedArticles')->name('test');

Route::middleware(['auth', 'active'])->prefix('/ru')->group(function() {

    Route::get('/search', 'App\Http\Controllers\RU_site\SearchFilterController@index')->name('search.show');
    Route::get('/about/{slug}', 'App\Http\Controllers\RU_site\AboutController@index')->name('about.show');
    Route::post('/send', 'App\Http\Controllers\MailController@send')->name('mail.send');
    Route::post('/subscribe', 'App\Http\Controllers\MailController@subscribe')->name('mail.subscribe');

    Route::prefix('/marochnik/rf')->group(function() {
        Route::get('/', 'App\Http\Controllers\RU_site\ShowCategoriesRUController@index')->name('material_categories.show');
        Route::get('/{slug}', 'App\Http\Controllers\RU_site\ShowSubCategoriesRUController@index')->name('all_materials_sub_categories.show');
        Route::get('/{slug_category}/{slug_sub_category}','App\Http\Controllers\RU_site\ShowSubCategoriesRUController@getOneSubCategory')->name('materials_one_sub_category.show');
        Route::get('/{slug_category}/{slug_sub_category}/{slug_material_name}', 'App\Http\Controllers\RU_site\ShowMaterialRuController@show')->name('one_material.show');
    });

    Route::prefix('/spravochnik')->group(function() {
        Route::get('/', 'App\Http\Controllers\RU_site\ShowSpravochnikController@index')->name('spravochnik_index.show');
        Route::get('/tag/{slug_tag}', 'App\Http\Controllers\RU_site\ShowTagArticlesController@showTag')->name('tag_article.show');
        Route::get('/{slug_category}', 'App\Http\Controllers\RU_site\ShowArticleCategoriesController@showCategory')->name('article_category.show');
        Route::get('/{slug_category}/{slug_article}', 'App\Http\Controllers\RU_site\ShowArticleController@show')->name('article_spravochnik.show');

    });

    Route::prefix('/gosts')->group(function() {
        Route::get('/', 'App\Http\Controllers\RU_site\ShowGostsController@index')->name('gost_index.show');
        Route::get('/{slug_razdela}','App\Http\Controllers\RU_site\ShowGostsController@showRazdel')->name('gost_razdel.show');
        Route::get('/{slug_razdela}/{slug_gruppy}','App\Http\Controllers\RU_site\ShowGostsController@showGruppa')->name('gost_gruppa.show');
        Route::get('/{slug_razdela}/{slug_gruppy}/{slug_gost}','App\Http\Controllers\RU_site\ShowGostsController@showGost')->name('gost.show');
    });



});






