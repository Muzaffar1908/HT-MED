<?php

namespace App\Http\Controllers;

use App\Models\Servise;
use Illuminate\Http\Request;

use function PHPUnit\Framework\directoryExists;

class ServiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servises = Servise::paginate(5);
        return  view('admin.servise.index', compact('servises'));
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
            'text_uz' => 'required',
            'text_en' => 'required',
        ]);

        if ($request->has('status')) {
            $data['status'] = true;
        }
        else
        {
            $data['status'] = false;
        }

        Servise::create($data);
        return  redirect()->route('admin.servise.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $servise = Servise::findOrFail($id);
        return  view('admin.servise.show', [
            'servise' => $servise
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
        $servise = Servise::findOrFail($id);
        return  view('admin.servise.edit', [
            'servise' => $servise
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servise $servise)
    {
        $data = $request->validate([
            'text_uz' => 'required',
            'text_en' => 'required',
        ]);

        $servise->update($data);
        return  redirect()->route('admin.servise.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servise $servise)
    {
        $servise->delete();
        return  redirect()->route('admin.servise.index');
    }
}
