<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;
    public function offers(){
        return $this->belongsToMany(Offer::class, 'ability_offer');
    }
}
