<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory; 

    //Asignacion Masiva con Guarded

    protected $guarded = ['id', 'status']; 

    //Relacion polimorfica
    public function commentable() {
        return $this->morphTo();
    }

    //relacion uno a muchos polimorfica
    public function comments() {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions() {
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }

    //Relacion uno a muchos inversa
    public function user() {
        return $this->belongsTo('App\Models\User'); 
    }
}
