<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Image;
use Storage;
use Validator;
use App\University;

class AdminUniversitiesController extends Controller
{
	protected $file;

    public function index()
    {
        $universities = University::all();

        return view('admin.universities.index', ['universities' => $universities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.universities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:60|unique:universities',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->hasFile('image'))
        {
            $image = 'image-'.str_random(20).'.'.$request->file('image')->getClientOriginalExtension();

            $file = Image::make($request->file('image'));
            $this->file = $file;
            $this->optimalResize(400, 300);
            $this->file->save('img/universities/'.$image);
        }
        else
        {
        	$image = 'no-image.jpg';
        }

        $university = new University;
        $count = $university->count();

        if ($request->sort_id > 0)
        	$university->sort_id = $request->sort_id;
        else
        	$university->sort_id = ++$count;
        $university->title = $request->title;
        $university->slug = ( ! empty($request->slug)) ? $request->slug : str_slug($request->title);
        $university->image = $image;
        $university->map = $request->map;
        $university->meta_title = $request->meta_title;
        $university->meta_description = $request->meta_description;
        $university->text = $request->text;
        $university->lang = $request->lang;
        if ($request->status == 'on')
        	$university->status = 1;
        else
        	$university->status = 0;
        $university->save();

        return redirect('/admin/universities')->with('status', 'Университет добавлен!');
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
        $university = University::findOrFail($id);

        return view('admin.universities.edit', ['university' => $university]);
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

        $university = University::findOrFail($id);

        if ($request->hasFile('image'))
        {
            $image = 'image-'.str_random(20).'.'.$request->file('image')->getClientOriginalExtension();

            $file = Image::make($request->file('image'));
            $this->file = $file;
            $this->optimalResize(400, 300);
            $this->file->save('img/universities/'.$image);

            if ( ! empty($university->image))
            {
                // Storage::delete('img/universities/'.$university->image);
            }
        }
        else
        {
        	$image = $university->image;
        }

        $count = $university->count();

        if ($request->sort_id > 0)
        	$university->sort_id = $request->sort_id;
        else
        	$university->sort_id = ++$count;
        $university->title = $request->title;
        $university->slug = ( ! empty($request->slug)) ? $request->slug : str_slug($request->title);
        $university->image = $image;
        $university->map = $request->map;
        $university->meta_title = $request->meta_title;
        $university->meta_description = $request->meta_description;
        $university->text = $request->text;
        $university->lang = $request->lang;
        if ($request->status == 'on')
        	$university->status = 1;
        else
        	$university->status = 0;
        $university->save();

        return redirect('/admin/universities')->with('status', 'Университет обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    	$university = University::findOrFail($id);

        if ($university->image != NULL AND file_exists('img/universities/'.$university->image))
        {
            // Storage::delete('img/universities/'.$university->image);
        }

        $university->delete();

        return redirect('/admin/universities')->with('status', 'Университет удален!');
    }

    public function optimalResize($width, $height)
    {
        if ($this->file->width() <= $this->file->height())
        {
            $this->file->resize(null, $height, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        else
        {
            $this->file->resize($width, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

		if ($this->file->width() > $width OR $this->file->height() > $height)
		{
            $this->file->crop($width, $height);
		}
    }
}
