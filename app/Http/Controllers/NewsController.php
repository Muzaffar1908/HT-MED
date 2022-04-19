<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(4);
        return  view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'image' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
        ]);

        if ($request->has('status')) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }

        if (!file_exists('uploads/news-photo')) {
            mkdir('uploads/news-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/news-photo'), $imageName);
            $data['image'] = 'uploads/news-photo/' . $imageName;
        }


        News::create($data);
        return  redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::findOrFail($id);
        return  view('admin.news.show', [
            'new' => $new,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
        return  view('admin.news.edit', [
            'new' => $new,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'desc_uz' => 'required',
            'desc_en' => 'required',
            'status' => '',
        ]);

        if (!file_exists('uploads/news-photo')) {
            mkdir('uploads/news-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/news-photo'), $imageName);
            unlink($news->image);
            $data['image'] = 'uploads/news-photo/' . $imageName;
        }

        $news->update($data);
        return  redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        unlink($news->image);
        $news->delete();
        return  redirect()->route('admin.news.index');
    }
}
