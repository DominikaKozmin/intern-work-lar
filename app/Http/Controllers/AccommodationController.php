<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccommodationController extends Controller
{
    public function index() {
        return view('zakwaterowanie.zakwaterowanie');
    }
}
