<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active'])->prefix('/dashboard')->group(function() {
    
    //Для периодического запуска
    Route::get('/test', 'App\Http\Controllers\TestController@test')->name('test');

    //Материалы для марочника
    Route::get('/', function () {return view('dashboard');})->name('dashboard');
    Route::get('/compilation-new-material', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@index')->name('compilation-new-material');
    Route::post('/compilation-new-material/create', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@create')->name('create-new-material');
    Route::get('/done-new-material', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@done')->name('done-new-material');
    Route::get('/show-made-materials', 'App\Http\Controllers\CompileMaterials\MadeMaterialsController@showMade')->name('show-made-materials');
    Route::post('/edit-made-material', 'App\Http\Controllers\CompileMaterials\MadeMaterialsController@editMaterial')->name('edit-made-material');
    Route::get('/edit-material/{id}', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@showEdit')->name('select-edit-material');
    Route::get('/search-made-material', 'App\Http\Controllers\CompileMaterials\SearchController@searchMadeMaterial')->name('search-made-material');

    //СТАТЬИ ДЛЯ СПРАВОЧНИКА
    Route::get('/add-article', 'App\Http\Controllers\CompileMaterials\ArticleController@add')->name('article.add');
    Route::get('/show-articles', 'App\Http\Controllers\CompileMaterials\ArticleController@showArticles')->name('articles.show');
    Route::get('/search-articles', 'App\Http\Controllers\CompileMaterials\SearchController@searchArticles')->name('articles.search');
    Route::get('/edit-article/{id}', 'App\Http\Controllers\CompileMaterials\ArticleController@editShowArticle')->name('article.show');
    Route::post('/edit-article', 'App\Http\Controllers\CompileMaterials\ArticleController@editArticle')->name('article.edit');
    Route::post('/create', 'App\Http\Controllers\CompileMaterials\ArticleController@create')->name('article.create');
});

require __DIR__.'/auth.php';

//Route::get('/dashboard', function () {
//return view('dashboard');
//})->middleware(['auth', 'active'])->name('dashboard');





//Route::get('/dashboard/compilation-new-material', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@index')
//->middleware(['auth', 'active'])->name('compilation-new-material');

//Route::post('/dashboard/compilation-new-material/create', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@create')
//->middleware(['auth', 'active'])->name('create-new-material');

//Route::get('/dashboard/done-new-material', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@done')
//->middleware(['auth', 'active'])->name('done-new-material');


//Route::get('/dashboard/show-made-materials', 'App\Http\Controllers\CompileMaterials\MadeMaterialsController@showMade')
//->middleware(['auth', 'active'])->name('show-made-materials');

//Route::post('/dashboard/edit-made-material', 'App\Http\Controllers\CompileMaterials\MadeMaterialsController@editMaterial')
//->middleware(['auth', 'active'])->name('edit-made-material');

//Route::get('/dashboard/edit-material/{id}', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@showEdit')
//->middleware(['auth', 'active'])->name('select-edit-material');



//Route::get('/dashboard/search-made-material', 'App\Http\Controllers\CompileMaterials\SearchController@searchMadeMaterial')
//    ->middleware(['auth', 'active'])->name('search-made-material');

//Route::get('/dashboard/add-article', 'App\Http\Controllers\CompileMaterials\ArticleController@add')
//    ->middleware(['auth', 'active'])->name('article.add');

//Route::get('/dashboard/show-articles', 'App\Http\Controllers\CompileMaterials\ArticleController@showArticles')
//    ->middleware(['auth', 'active'])->name('articles.show');

//Route::get('/dashboard/search-articles', 'App\Http\Controllers\CompileMaterials\SearchController@searchArticles')
//    ->middleware(['auth', 'active'])->name('articles.search');

//Route::get('/dashboard/edit-article/{id}', 'App\Http\Controllers\CompileMaterials\ArticleController@editShowArticle')
//    ->middleware(['auth', 'active'])->name('article.show');

//Route::post('/dashboard/edit-article', 'App\Http\Controllers\CompileMaterials\ArticleController@editArticle')
//    ->middleware(['auth', 'active'])->name('article.edit');
//
//Route::post('/dashboard/create', 'App\Http\Controllers\CompileMaterials\ArticleController@create')
//    ->middleware(['auth', 'active'])->name('article.create');




//НАДО УДАЛИТЬ
//Route::get('/dashboard/show-materials-har', 'App\Http\Controllers\CompileMaterials\ShowHarkovMaterialsController@index')
//->middleware(['auth', 'active'])->name('show-materials-har');

//Route::get('/dashboard/show-materials-har/{id}', 'App\Http\Controllers\CompileMaterials\ShowHarkovMaterialsController@getMaterial')
//->middleware(['auth', 'active'])->name('show-one-material-har');

//Route::get('/dashboard/show-materials-met/', 'App\Http\Controllers\CompileMaterials\ShowMetportalMaterialsController@index')
//->middleware(['auth', 'active'])->name('show-materials-met');

//Route::get('/dashboard/show-materials-met/{id}', 'App\Http\Controllers\CompileMaterials\ShowMetportalMaterialsController@getMaterial')
//->middleware(['auth', 'active'])->name('show-one-material-met');

//Route::get('/dashboard/show-materials-all', 'App\Http\Controllers\CompileMaterials\ShowMaterialsAllController@index')
//->middleware(['auth', 'active'])->name('show-materials-all');

//Route::get('/dashboard/show-materials-all/{id}', 'App\Http\Controllers\CompileMaterials\ShowMaterialsAllController@getMaterial')
//->middleware(['auth', 'active'])->name('show-one-material-all');

//Route::get('/dashboard/search-harkov', 'App\Http\Controllers\CompileMaterials\SearchController@searchHar')
//->middleware(['auth', 'active'])->name('search-harkov');

//Route::get('/dashboard/search-harkov-made', 'App\Http\Controllers\CompileMaterials\SearchController@searchHarMade')
//->middleware(['auth', 'active'])->name('search-harkov-made');

//Route::get('/dashboard/search-metportal', 'App\Http\Controllers\CompileMaterials\SearchController@searchMetport')
//->middleware(['auth', 'active'])->name('search-metportal');

//Route::get('/dashboard/search-metportal-made', 'App\Http\Controllers\CompileMaterials\SearchController@searchMetportMade')
//->middleware(['auth', 'active'])->name('search-metportal-made');

//Route::get('/dashboard/search-all-sources', 'App\Http\Controllers\CompileMaterials\SearchController@searchAllSources')
//->middleware(['auth', 'active'])->name('search-all-sources');

//Route::get('/dashboard/show-made-materials-har', 'App\Http\Controllers\CompileMaterials\MadeMaterialsController@showMadeHar')
//->middleware(['auth', 'active'])->name('show-made-materials-har');

//Route::get('/dashboard/done-new-material-har', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@done')
//->middleware(['auth', 'active'])->name('done-new-material-har');
//Route::get('/dashboard/done-new-material-met', 'App\Http\Controllers\CompileMaterials\CompileMaterialController@done')
//->middleware(['auth', 'active'])->name('done-new-material-met');
//Route::get('/dashboard/show-made-materials-met', 'App\Http\Controllers\CompileMaterials\MadeMaterialsController@showMadeMet')
//->middleware(['auth', 'active'])->name('show-made-materials-met');
