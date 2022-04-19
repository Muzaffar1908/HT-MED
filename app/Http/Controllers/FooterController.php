<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::all();
        return  view('admin.footer.index', compact('footers'));
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
            'address' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'email1' => 'required',
            'email2' => 'required',
            'link' => 'required',
        ]);

        Footer::create($data);
        return  redirect()->route('admin.footer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = Footer::findOrFail($id);
        return view('admin.footer.show', [
           'footer' => $footer
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
        $footer = Footer::findOrFail($id);
        return view('admin.footer.edit', [
           'footer' => $footer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $data = $request->validate([
            'address' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'email1' => 'required',
            'email2' => 'required',
            'link' => 'required',
        ]);

        $footer->update($data);
        return  redirect()->route('admin.footer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        // $footer->delete();
        // return  redirect()->route('admin.footer.index');
    }
}
