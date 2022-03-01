<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    //Asignacion Masiva con Guarded

    protected $guarded = ['id'];
    

     //Relacion uno a muchos inversa
     public function courses() {
        return $this->belongsTo('App\Models\Course');
    }

    //relacion uno a muchos
    public function lesson() {
        return $this->hasMany('App\Models\Lesson');
    }
}
 