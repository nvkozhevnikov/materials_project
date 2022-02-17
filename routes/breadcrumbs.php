<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
// Error 404
Breadcrumbs::for('errors.404', function ($trail) {
    $trail->parent('main-page');
    $trail->push('Ошибка 404');
});

// Главная
Breadcrumbs::for('main-page', function(BreadcrumbTrail $trail){
    $trail->push('Главная', route('main-page'));
});
// Главная > Поиск
Breadcrumbs::for('search.show', function(BreadcrumbTrail $trail){
    $trail->parent('main-page');
    $trail->push('Поиск', route('search.show'));
});
// Главная > About
Breadcrumbs::for('about.show', function(BreadcrumbTrail $trail, $slug, $page){
    $trail->parent('main-page');
    $trail->push($page->breadcrumb, route('about.show', $slug));
});
// Главная > Марочник сталей
Breadcrumbs::for('material_categories.show', function(BreadcrumbTrail $trail){
    $trail->parent('main-page');
    $trail->push('Марочник сталей', route('material_categories.show'));
});
// Главная > Марочник сталей > Подкатегория (отобразить все группы (под-подкатегория) подкатегории)
Breadcrumbs::for('all_materials_sub_categories.show', function(BreadcrumbTrail $trail, $slug_category, $h1){
    $trail->parent('material_categories.show');
    $trail->push($h1, route('all_materials_sub_categories.show', $slug_category));
});
// Главная > Марочник сталей > Подкатегория (отобразить материала только одной группы (под-подкатегории))
Breadcrumbs::for('materials_one_sub_category.show', function(BreadcrumbTrail $trail, $slug_category, $slug_sub_category, $category_name, $h1){
    $trail->parent('all_materials_sub_categories.show', $slug_category, $category_name);
    $trail->push($h1, route('materials_one_sub_category.show', [$slug_category, $slug_sub_category]));
});
// Главная > Марочник сталей > Подкатегория > Материал
Breadcrumbs::for('one_material.show', function(BreadcrumbTrail $trail, $slug_category, $slug_sub_category, $slug_material, $sub_category_name, $category_name, $material_name){
    $trail->parent('materials_one_sub_category.show', $slug_category, $slug_sub_category, $category_name, $sub_category_name);
    $trail->push($material_name, route('one_material.show', [$slug_category, $slug_sub_category, $slug_material]));
});

// Главная > Справочник
Breadcrumbs::for('spravochnik_index.show', function(BreadcrumbTrail $trail){
    $trail->parent('main-page');
    $trail->push('Справочник', route('spravochnik_index.show'));
});

// Главная > Справочник > Тэг
Breadcrumbs::for('tag_article.show', function(BreadcrumbTrail $trail, $slug_tag, $tag_name){
    $trail->parent('spravochnik_index.show');
    $trail->push($tag_name, route('tag_article.show', [$slug_tag]));
});

// Главная > Справочник > Категория
Breadcrumbs::for('article_category.show', function(BreadcrumbTrail $trail, $slug_category, $category_name){
    $trail->parent('spravochnik_index.show');
    $trail->push($category_name, route('article_category.show', $slug_category));
});

// Главная > Справочник > Категория > Статья
Breadcrumbs::for('article_spravochnik.show', function(BreadcrumbTrail $trail, $slug_category, $category_name, $slug_article, $h1){
    $trail->parent('article_category.show', $slug_category, $category_name);
    $trail->push($h1, route('article_spravochnik.show', [$slug_category, $slug_article]));
});

// Главная > Классификатор ГОСТ
Breadcrumbs::for('gost_index.show', function(BreadcrumbTrail $trail){
    $trail->parent('main-page');
    $trail->push('Классификатор ГОСТ', route('gost_index.show'));
});

// Главная > Классификатор ГОСТ > Раздел классификатора
Breadcrumbs::for('gost_razdel.show', function(BreadcrumbTrail $trail, $slug_razdela, $h1){
    $trail->parent('gost_index.show');
    $trail->push($h1, route('gost_razdel.show', $slug_razdela));
});

// Главная > Классификатор ГОСТ > Раздел классификатора > Группа классификатора
Breadcrumbs::for('gost_gruppa.show', function(BreadcrumbTrail $trail, $slug_razdela, $slug_gruppy, $razdel_name, $name_gruppy){
    $trail->parent('gost_razdel.show', $slug_razdela, $razdel_name);
    $trail->push($name_gruppy, route('gost_gruppa.show', [$slug_razdela, $slug_gruppy]));
});

// Главная > Классификатор ГОСТ > Раздел классификатора > Группа классификатора > ГОСТ
Breadcrumbs::for('gost.show', function(BreadcrumbTrail $trail, $slug_razdela, $slug_gruppy, $razdel_name, $name_gruppy, $slug_gost, $standard_name){
    $trail->parent('gost_gruppa.show', $slug_razdela, $slug_gruppy, $razdel_name, $name_gruppy);
    $trail->push($standard_name, route('gost.show', [$slug_razdela, $slug_gruppy, $slug_gost]));
});

// Админка  Админка Админка Админка Админка //
// Главная
Breadcrumbs::for('dashboard', function(BreadcrumbTrail $trail){
    $trail->push('Dashboard', route('dashboard'));
});



// Dashboard > Создание нового материала
Breadcrumbs::for('compilation-new-material', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Создание нового материала', route('compilation-new-material'));
});

// Dashboard > Создание нового материала > Новый материал создан
Breadcrumbs::for('create-new-material', function(BreadcrumbTrail $trail){
    $trail->parent('compilation-new-material');
    $trail->push('Новый материал создан', route('create-new-material'));
});

// Dashboard > Готовые материалы
Breadcrumbs::for('show-made-materials', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Список обработанных материалов', route('show-made-materials'));
});

// Dashboard > Готовые материалы > Результаты поиска
Breadcrumbs::for('search-made-material', function(BreadcrumbTrail $trail){
    $trail->parent('show-made-materials');
    $trail->push('Результаты поиска по готовым материалам', route('search-made-material'));
});

// Dashboard > Готовые материалы > Редактирование материала
Breadcrumbs::for('select-edit-material', function(BreadcrumbTrail $trail, $material_name, $id){
    $trail->parent('show-made-materials');
    $trail->push('Редактирование материала '.$material_name, route('select-edit-material', $id));
});

// Dashboard > Готовые материалы > Редактирование материала > Материал изменен
Breadcrumbs::for('edit-made-material', function(BreadcrumbTrail $trail, $material_name, $id){
    $trail->parent('select-edit-material', $material_name, $id);
    $trail->push('Материал изменен', route('edit-made-material'));
});



// Dashboard > Материалы Kharkov и Metportal
Breadcrumbs::for('show-materials-all', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Материалы Kharkov и Metportal', route('show-materials-all'));
});

// Dashboard > Материалы Kharkov и Metportal -> Material Name
Breadcrumbs::for('show-one-material-all', function(BreadcrumbTrail $trail, $material_name, $id){
    $trail->parent('show-materials-all');
    $trail->push($material_name, route('show-one-material-all', $id));
});

// Dashboard > Материалы Kharkov и Metportal -> Material Name > Материал помечен как готов
Breadcrumbs::for('done-new-material', function(BreadcrumbTrail $trail, $material_name, $id){
    $trail->parent('show-one-material-all', $material_name, $id);
    $trail->push('Материал '.$material_name.' помечен как готов', route('done-new-material'));
});

// Dashboard > Материалы Kharkov и Metportal > Результаты поиска Kharkov и Metportal
Breadcrumbs::for('search-all-sources', function(BreadcrumbTrail $trail){
    $trail->parent('show-materials-all');
    $trail->push('Результаты поиска', route('search-all-sources'));
});



// Dashboard > Материалы Kharkov
Breadcrumbs::for('show-materials-har', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Материалы Kharkov', route('show-materials-har'));
});

// Dashboard > Материалы Kharkov > Material Name
Breadcrumbs::for('show-one-material-har', function(BreadcrumbTrail $trail, $data_of_material){
    $trail->parent('show-materials-har');
    $trail->push($data_of_material->material_name, route('show-one-material-har', $data_of_material->id));
});

//// Dashboard > Материалы Kharkov > Material Name > Помечен как готов
//Breadcrumbs::for('done-new-material-har', function(BreadcrumbTrail $trail, $data_of_material){
//    $trail->parent('show-one-material-har', $data_of_material);
//    $trail->push('Материал '.$data_of_material['material_name'].' помечен как готов', route('done-new-material-har'));
//});

// Dashboard > Материалы Kharkov > Результаты поиска harkov
Breadcrumbs::for('search-harkov', function(BreadcrumbTrail $trail){
    $trail->parent('show-materials-har');
    $trail->push('Результаты поиска', route('search-harkov'));
});




// Dashboard > Материалы Metallicheskii-portal
Breadcrumbs::for('show-materials-met', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Материалы Metallicheskii-portal', route('show-materials-met'));
});

// Dashboard > Материалы Metportal > Результаты поиска metportal
Breadcrumbs::for('search-metportal', function(BreadcrumbTrail $trail){
    $trail->parent('show-materials-met');
    $trail->push('Результаты поиска', route('search-metportal'));
});

// Dashboard > Материалы Metallicheskii-portal > Material Name
Breadcrumbs::for('show-one-material-met', function(BreadcrumbTrail $trail, $getMaterial){
    $trail->parent('show-materials-met');
    $trail->push($getMaterial->material_name, route('show-one-material-met', $getMaterial->id));
});


// Dashboard > Список статей
Breadcrumbs::for('articles.show', function(BreadcrumbTrail $trail){
    $trail->parent('dashboard');
    $trail->push('Список статей', route('articles.show'));
});

// Dashboard > Список статей > Редактирование статьи
Breadcrumbs::for('article.show', function(BreadcrumbTrail $trail, $id){
    $trail->parent('articles.show');
    $trail->push('Редактирование статьи', route('article.show', $id));
});

// Dashboard > Список статей > Редактирование статьи > Статья изменена
Breadcrumbs::for('article.edit', function(BreadcrumbTrail $trail, $id){
    $trail->parent('article.show', $id);
    $trail->push('Статья изменена', route('article.edit'));
});

// Dashboard > Список статей > Результаты поиска
Breadcrumbs::for('articles.search', function(BreadcrumbTrail $trail){
    $trail->parent('articles.show');
    $trail->push('Результаты поиска', route('articles.search'));
});
