<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class PagesController extends Controller
{
    public function index(){
        return view('index')
            ->with('offers', Offer::orderBy('created_at', 'DESC')
            ->limit(12)
            ->get())
            ->with('highlightedOffers', Offer::orderBy('created_at', 'DESC')
            ->where('industry', '=', '1')
            ->limit(12)
            ->get());
    }

    public function employee(){
        return view('employee');
    }

    public function employer(){
        return view('employer');
    }

    public function accommodation(){
        return view('accommodation');
    }
}
