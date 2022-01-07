<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'owner_id',
        'author_id',
        'category',
        'slug',
        'name',
        'email',
        'item',
        'content'
    ];
}
