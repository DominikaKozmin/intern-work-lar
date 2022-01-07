<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use Illuminate\Http\Request;


class AccommodationApiController extends Controller
{
    public function showAccommodations(){
        $search = (Request()->get('search') != null) ? Request()->get('search') : "";
        $location = (Request()->get('location') != null) ? Request()->get('location') : "";
        
        if($location==null){
            return Accommodation::with(['photo','city'])
            ->where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('content', 'LIKE', '%'.$search.'%')
            ->get();
        }
        else{
            return Accommodation::with(['photo','city'])
            ->where('city_id', $location)
            ->where(function($query){
                return $query
                ->where('title', 'LIKE', '%'.Request()->get('search').'%')
                ->orWhere('content', 'LIKE', '%'.Request()->get('search').'%');
            })->get();
        }
        
        return Accommodation::with(['photo', 'city'])->get();
    }
    public function showHighlightedAccommodations(){
        return Accommodation::with(['photo', 'city'])->where('highlighted', 1)->get();
    }
}
