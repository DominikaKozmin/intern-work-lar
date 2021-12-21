<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\Ability;
use App\Models\Industry;
use App\Models\Level;
use App\Models\Location;
use App\Models\Type;
use App\Models\Offer;
use App\Models\Salary;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;

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
    public function locations(){
        return Country::all();
    }
    public function industries(){
        return Industry::all();
    }
    public function cities(){
        return City::all();
    }
    public function test(){
        $orderBy = Request()->get('orderBy') == null ? 'created_at' : Request()->get('orderBy');
        $order = Request()->get('order') == 'true' ? 'ASC' : 'DESC';
        return Offer::query()
            ->where(function($query){
                return $query->whereIn('industry', filterParametersCollection(Request()->get('industry'), Industry::class));
            })
            ->whereHas('abilities', function($query){
                return $query->whereIn('abilities.id', filterParametersCollection(Request()->get('ability'), Ability::class));
            })
            ->whereHas('levels', function($query){
                return $query->whereIn('levels.id', filterParametersCollection(Request()->get('level'), Level::class));
            })
            ->whereHas('types', function($query){
                return $query->whereIn('types.id', filterParametersCollection(Request()->get('type'), Type::class));
            })
            ->orderBy($orderBy, $order)
            ->get();
    }
}
