<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Validator;
use App\Page;

class AdminPagesController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:60|unique:pages',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $page = new Page;

        if ($request->sort_id > 0) $page->sort_id = $request->sort_id;
        else $page->sort_id = $page->increment('sort_id', 1);
        $page->title = $request->title;
        $page->slug = ( ! empty($request->slug)) ? $request->slug : str_slug($request->title);
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->text = $request->text;
        $page->lang = $request->lang;
        if ($request->status == 'on') $page->status = 1;
        else $page->status = 0;
        $page->save();

        return redirect('/admin/pages')->with('status', 'Страница добавлена!');
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
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:60',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $page = Page::findOrFail($id);

        if ($request->sort_id > 0) $page->sort_id = $request->sort_id;
        else $page->sort_id = $page->increment('sort_id', page::count());
        $page->title = $request->title;
        $page->slug = ( ! empty($request->slug)) ? $request->slug : str_slug($request->title);
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->text = $request->text;
        $page->lang = $request->lang;
        if ($request->status == 'on') $page->status = 1;
        else $page->status = 0;
        $page->save();

        return redirect('/admin/pages')->with('status', 'Страница обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Page::destroy($id);

        return redirect('/admin/pages')->with('status', 'Страница удалена!');
    }
}
