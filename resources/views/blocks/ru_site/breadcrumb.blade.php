<div class="container">
    <div class="col bg-light rounded mb-3">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            @if(Request::is(substr(route('search.show', [], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('search.show') }}
            @elseif(isset($slug) && (Request::is(substr(route('about.show', [$slug], false), 1))))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('about.show', $slug, $page) }}
            @elseif(Request::is(substr(route('material_categories.show', [], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('material_categories.show') }}
            @elseif(isset($slug_category) && Request::is(substr(route('all_materials_sub_categories.show', [$slug_category], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('all_materials_sub_categories.show', $slug_category, $h1) }}
            @elseif(isset($slug_category) && Request::is(substr(route('materials_one_sub_category.show', [$slug_category, $slug_sub_category], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('materials_one_sub_category.show', $slug_category, $slug_sub_category, $category_name, $h1) }}
            @elseif(isset($slug_category) && Request::is(substr(route('one_material.show', [$slug_category, $slug_sub_category, $slug_material], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('one_material.show', $slug_category, $slug_sub_category, $slug_material, $sub_category_name, $category_name, $material_name) }}
            @elseif(isset($slug_tag) && Request::is(substr(route('tag_article.show', [$slug_tag], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('tag_article.show', $slug_tag, $tag_articles[0]->tag_name) }}
            @elseif(Request::is(substr(route('spravochnik_index.show', [], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('spravochnik_index.show') }}
            @elseif(isset($category_articles) && Request::is(substr(route('article_category.show', [$category_articles[0]->slug_category], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('article_category.show', $category_articles[0]->slug_category, $category_articles[0]->category_name) }}
            @elseif(isset($article) && Request::is(substr(route('article_spravochnik.show', [$article[0]->slug_category, $article[0]->slug], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('article_spravochnik.show', $article[0]->slug_category, $article[0]->category_name, $article[0]->slug, $article[0]->h1) }}
            @elseif(Request::is(substr(route('gost_index.show', [], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('gost_index.show') }}
            @elseif(isset($slug_razdela) && Request::is(substr(route('gost_razdel.show', [$slug_razdela], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('gost_razdel.show', $slug_razdela, $h1) }}
            @elseif(isset($slug_gruppy) && Request::is(substr(route('gost_gruppa.show', [$slug_razdela, $slug_gruppy], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('gost_gruppa.show', $slug_razdela, $slug_gruppy, $razdel_name, $name_gruppy) }}
            @elseif(isset($slug_gost) && Request::is(substr(route('gost.show', [$slug_razdela, $slug_gruppy, $slug_gost], false), 1)))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('gost.show', $slug_razdela, $slug_gruppy, $razdel_name, $name_gruppy, $slug_gost, $standard_name) }}
            @elseif ((isset($exception) && $exception->getStatusCode() == 404))
                {{ \Diglactic\Breadcrumbs\Breadcrumbs::render('errors.404') }}
            @else
                <p>Ошибка! Сообщите администратору!</p>
            @endif
        </nav>
    </div>
</div>




