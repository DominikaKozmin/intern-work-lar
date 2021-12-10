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
    public function test(){
        return Offer::whereHas('levels', function($q){
            $industry =  Request()->get('industry');
            if($industry == null){
                $temp = [];
                foreach(Industry::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $industry=$temp;
            }
            else{
                $industry = explode(',', $industry);
            }

            $ability = Request()->get('ability');
            if($ability == null){
                $temp = [];
                foreach(Ability::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $ability=$temp;
            }

            $level = Request()->get('level');
            if($level == null){
                $temp = [];
                foreach(Level::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $level=$temp;
            }
            else{
                $level = explode(',', $level);
            }
            
            $salary = Request()->get('salary');
            if($salary == null){
                $temp = [];
                foreach(Salary::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $salary=$temp;
            }

            $location = Request()->get('location');
            if($location == null){
                $temp = [];
                foreach(Location::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $location=$temp;
            }

            $type = Request()->get('type');
            if($type == null){
                $temp = [];
                foreach(Type::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $type=$temp;
            }
            $q->whereIn('offers.industry', $industry);
            $q->whereIn('levels.id', $level);
        })->whereHas('abilities', function($q){
            $ability = Request()->get('ability');
            if($ability == null){
                $temp = [];
                foreach(Ability::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $ability=$temp;
            }
            else{
                $ability = explode(',', $ability);
            }
            $q->whereIn('abilities.id', $ability);
        })->whereHas('types', function($q){
            $type = Request()->get('type');
            if($type == null){
                $temp = [];
                foreach(Type::select('id')->get()->toarray() as $table){
                    array_push($temp, $table['id']);
                }
                $type=$temp;
            }
            else{
                $type = explode(',', $type);
            }
            $q->whereIn('types.id', $type);
        })->get();
    }
}
