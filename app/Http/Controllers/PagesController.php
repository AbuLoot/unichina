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
}
