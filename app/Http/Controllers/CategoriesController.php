<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Industry;
use App\Models\Offer;

class CategoriesController extends Controller
{
    function show($id){
        $response = Industry::where('id', $id)->first();
        if(empty($response)){
            abort(404);
        }
        //dd(Offer::where('industry', $id)->get()->toarray());
        return view('categories.show')
            ->with('category', $response)
            ->with('offers', Offer::where('industry', $id)->get()->toarray())
            ->with('offersRightPanel', Offer::orderBy('created_at', 'DESC')->get())
            ->with('id', $id);
    }
}
