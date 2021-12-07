<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class CategoriesApiController extends Controller
{
    public function latestOffers($id){
        return Offer::where('industry', $id)->orderBy('created_at', 'DESC')->get()->toarray();
    }
    public function salary($id){
        return Offer::where('industry', $id)->orderBy('salary', 'DESC')->get()->toarray();
    }
    public function jobTitle($id){
        return Offer::where('industry', $id)->orderBy('title', 'DESC')->get()->toarray();
    }
}
