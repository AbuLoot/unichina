<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Page;
use App\Landing;
use App\University;

class PagesController extends Controller
{
    public function index()
    {
    	$pages = Page::all();
        $landing = Landing::where('lang', \App::getLocale())->first();
        $universities = University::where('lang', \App::getLocale())->take(9)->get();

    	return view('pages.index', [
    		'pages' => $pages,
    		'landing' => $landing,
    		'universities' => $universities
    	]);
    }

    public function page($slug)
    {
    	$page = Page::where('slug', $slug)->first();

    	return view('pages.common', ['page' => $page]);
    }

    public function universities()
    {
    	$page = Page::where('slug', 'universitety')->first();

    	return view('pages.universities', ['page' => $page]);
    }

    public function contacts()
    {
    	$page = Page::where('slug', 'kontakty')->first();

    	return view('pages.contacts', ['page' => $page]);
    }
}
