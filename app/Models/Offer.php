<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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
    ];
}