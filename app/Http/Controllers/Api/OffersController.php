<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;

class OffersController extends Controller
{
    public function latestOffers(){
        return Offer::orderBy('created_at', 'DESC')->get()->toarray();
    }
    public function salary(){
        return Offer::orderBy('salary', 'DESC')->get()->toarray();
    }
    public function jobTitle(){
        return Offer::orderBy('title', 'ASC')->get()->toarray();
    }
}
