<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Packet;
use App\Models\Color_scheme;

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
        return view('employee')
            ->with('offers', Offer::orderBy('created_at', 'DESC')
            ->limit(12)
            ->get())
            ->with('highlightedOffers', Offer::orderBy('created_at', 'DESC')
            ->where('industry', '=', '1')
            ->limit(12)
            ->get());
    }

    public function employer(){
        return view('employer')
            ->with('packets', Packet::orderBy('price', 'ASC')
            ->get());
    }

    public function accommodation(){
        return view('accommodation');
    }
}
