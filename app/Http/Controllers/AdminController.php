<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function status(Request $request)
    {
        $inactive = [
            'status' => '0',
        ];
        $active = [
            'status' => '1',
        ];
        $modelName = '\\App\\Models\\' . $request->model;
        $model = $modelName::findOrFail($request->id);
        if ($model->status == ' 1') {
            $model->update($inactive);
            // session()->flash('message', "Faol emas");
        } else {
            $model->update($active);
            // session()->flash('message', "Faol");
        }
        return back();
    }
}
