<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracownikController extends Controller
{
    public function index() {
        return view('pracownik.pracownik');
    }
}
