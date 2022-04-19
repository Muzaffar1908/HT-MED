<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = SubCategory::all();
        $categories = Category::where('status', '=', 1)->get();
        return  view('admin.subcategory.index', compact('subcategories', 'categories'));
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
            'category_id' => 'required',
        ]);

        $data['slug'] = Str::slug($data['title_en'], '-');
        if ($request->has('status')) {
            $data['status'] = true;
        } else {
            $data['status'] = false;
        }

        if (!file_exists('uploads/about-photo')) {
            mkdir('uploads/about-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/about-photo'), $imageName);
            $data['image'] = 'uploads/about-photo/' . $imageName;
        }
        SubCategory::create($data);
        return  redirect()->route('admin.subcategory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        return  view('admin.subcategory.show', [
            'subcategory' => $subcategory
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
        $categories = Category::where('status', '=', 1)->get();
        $subcategory = SubCategory::findOrFail($id);
        return  view('admin.subcategory.edit', [
            'subcategory' => $subcategory,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $data = $request->validate([
            'title_uz' => 'required',
            'title_en' => 'required',
            'image' => 'required',
        ]);

        if (!file_exists('uploads/about-photo')) {
            mkdir('uploads/about-photo', 0777, true);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ex = $file->getClientOriginalExtension();
            $imageName = md5(rand(100, 999999) . microtime()) . "." . $ex;
            $file->move(public_path('uploads/about-photo'), $imageName);
            unlink($subcategory->image);
            $data['image'] = 'uploads/about-photo/' . $imageName;
        }

        $subcategory->update($data);    
        return redirect()->route('admin.subcategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        unlink($subcategory->image);
        $subcategory->delete();
        return redirect()->route('admin.subcategory.index');
    }
}
