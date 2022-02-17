<?php

namespace App\Http\Controllers\RU_site;

use App\Http\Controllers\Controller;
use App\Models\Ru_site\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index($slug)
    {
        $page = About::where('slug', $slug)->first();
	if(is_null($page)){
		abort(404);
	}
        return view('pages.ru_site.about', compact('page', 'slug'));
    }
}
