<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Ability;
use App\Models\Level;
use App\Models\Type;

class MiscellaneousApiController extends Controller
{
    public function partners(){
        return Partner::all();
    }
    public function abilities(){
        return Ability::all();
    }
    public function levels(){
        return Level::all();
    }
    public function types(){
        return Type::all();
    }
}
