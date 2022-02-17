<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use App\Models\Ru_site\Spravochnik;
use App\Models\Ru_site\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexPageController extends Controller
{
    public function index()
    {
        $material_prices = DB::select('SELECT * FROM metal_prices');
        $usd_price = DB::select('SELECT price FROM currency_prices WHERE currency_id = 1');
        $title = 'MetalWork Industrial - промышленный справочник, марочник материалов, государственные стандарты';
        $description = 'MetalWorkInd.com - информационный ресурс в области промышленных технологий. Марочник сталей, ГОСТы, справочные материалы, аналитика';
        $last_articles = Spravochnik::select('spravochnik.slug', 'spravochnik.h1', 'spravochnik.thumb_img_logo_article',
            'sc.slug as slug_category')
            ->leftJoin('spravochnik_categories as sc', 'spravochnik.spravochnik_category_id', '=', 'sc.id')
            ->where('spravochnik.active', '=', 1)
            ->limit(8)->reorder('spravochnik.id', 'desc')->get();
        $news = News::orderBy('created_at', 'desc')->take(10)->get();

        return view('pages.ru_site.index',
            compact('material_prices', 'usd_price', 'title', 'description', 'last_articles', 'news'));
    }
}
