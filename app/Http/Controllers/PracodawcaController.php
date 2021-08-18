<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracodawcaController extends Controller
{
    public function index() {
        return view('pracodawca.pracodawca');
    }
}
