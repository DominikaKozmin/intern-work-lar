<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Offer extends Model
{
    use HasFactory;
    use Sluggable;
    protected $with = ['user','levels'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*
        "category_id",
        "location_id",
        "type_id",
        "position",
        "city",
        "location",
        "category",
        "type",
        "job_duration",
        "job_start",
        "salary",
        "vacancies",
        "description",
        "offer_duration",
        "image",
        */
        "slug",
        "title",
        "user_id",
        "salary",
        "industry",
        "deadline",
        "content",
    ];
    
    public function abilities(){
        return $this->belongsToMany(Ability::class);
    }

    public function abilites(){
        return $this->belongsToMany(Ability::class);
    }

    public function levels(){
        return $this->belongsToMany(Level::class);
    }

    public function industries(){
        return $this->belongsTo(Industry::class, 'industry', 'id');
    }

    public function industryTable(){
        return $this->belongsTo(Industry::class, 'industry', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function languages(){
        return $this->belongsToMany(Language::class);
    }

    public function types_of_work(){
        return $this->belongsToMany(Type_of_work::class);
    }
    public function types(){
        return $this->belongsToMany(Type::class);
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
