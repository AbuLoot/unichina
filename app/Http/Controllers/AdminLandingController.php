<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Landing;
use App\Http\Requests\LandingRequest;

class AdminLandingController extends Controller
{
    public function index()
    {
        $landing = Landing::all();

        return view('admin.landing.index', ['landing' => $landing]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.landing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(LandingRequest $request)
    {
        $landing = new Landing;
        $landing->title = $request->title;
        $landing->secondary = $request->secondary;
        $landing->title_for_universities = $request->title_for_universities;
        $landing->secondary_text_for_universities = $request->secondary_text_for_universities;
        $landing->programs = $request->programs;
        $landing->three_steps = $request->three_steps;
        $landing->lang = $request->lang;
        if ($request->status == 'on')
        	$landing->status = 1;
        else
        	$landing->status = 0;
        $landing->save();

        return redirect('/admin/landing')->with('status', 'Главная страница добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $page = Landing::findOrFail($id);

        return view('admin.landing.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(LandingRequest $request, $id)
    {
        $landing = Landing::findOrFail($id);
        $landing->title = $request->title;
        $landing->secondary = $request->secondary;
        $landing->title_for_universities = $request->title_for_universities;
        $landing->secondary_text_for_universities = $request->secondary_text_for_universities;
        $landing->programs = $request->programs;
        $landing->three_steps = $request->three_steps;
        $landing->lang = $request->lang;
        if ($request->status == 'on')
        	$landing->status = 1;
        else
        	$landing->status = 0;
        $landing->save();

        return redirect('/admin/landing')->with('status', 'Университет обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	Landing::destroy($id);

        return redirect('/admin/landing')->with('status', 'Университет удален!');
    }
}
