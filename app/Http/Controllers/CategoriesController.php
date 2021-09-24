<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industry;

class CategoriesController extends Controller
{
    function show($id){
        $response = Industry::where('id', $id)->first();
        if(empty($response)){
            abort(404);
        }
        return view('categories.show')
            ->with('category', $response);
    }
}
