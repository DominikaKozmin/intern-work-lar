<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'packets';
    public function color_scheme(){
        return $this->hasone(color_scheme::class, 'id', 'color_scheme_id');
    }
}