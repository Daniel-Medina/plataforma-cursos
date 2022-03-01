<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory; 
    const LIKE = 1;
    const DISLIKE = 2;

    //Asignacion Masiva con Guarded

    protected $guarded = ['id']; 
    

    //Relacion polimorfica
    public function reactionable() {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo('App\Models\User'); 
    }

}
