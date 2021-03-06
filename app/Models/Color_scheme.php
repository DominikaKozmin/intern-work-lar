<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color_scheme extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'color_schemes';
    public function scheme(){
        return $this->belongsTo(Packet::class, 'foreign_key' , 'color_scheme_id');
    }
}
