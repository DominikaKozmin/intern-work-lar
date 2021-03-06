<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;
    
        // Create a connection to Offer model
        public function offers()
        {
            return $this->belongsToMany(Offer::class, 'favourites')->withTimestamps();
        }
}
