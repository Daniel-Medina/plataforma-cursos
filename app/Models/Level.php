<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    //Asignacion Masiva con Guarded

    protected $guarded = ['id']; 
    
    //relacion uno a muchos
    public function course() {
        return $this->hasMany('App\Models\Course');
    }
}
 