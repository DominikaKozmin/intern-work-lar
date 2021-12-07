<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;
    //protected $with = ['offers'];
    public function offers(){
        return $this->belongsToMany(Offer::class, 'level_offer');
    }
}
