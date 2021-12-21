<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Accommodation extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable=[
        "title",
        "slug",
        "price",
        "city_id",
        "user_id",
        "rooms",
        "square_meters",
        "content"
    ];
    public function user(){
        return $this->BelongsTo(User::class);
    }
    public function photo(){
        return $this->hasMany(Photo::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
