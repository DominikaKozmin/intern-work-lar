<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        return view('index');
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
