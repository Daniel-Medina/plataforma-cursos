<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    //Asignacion Masiva con Guarded

    protected $guarded = ['id']; 
    

    //Relacion polimorfica
    public function resourceable() {
        return $this->morphTo();
    }
}
