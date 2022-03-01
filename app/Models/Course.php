<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    //Metodos
    protected $withCount = ['students', 'reviews'];

    //Asignacion Masiva con Guarded

    protected $guarded = ['id']; 

    //Nombre de la funcion get debe de comenzar el nombre de la funcion en mayuscula y seguido de la palabra "Attribute"
    public function getRatingAttribute() {

        if($this->reviews_count) 
        {
            return round($this->reviews->avg('rating'), 1);
        } else {
            return 5;
        }

    } 


    //Filtros Query Scopes

    public function scopeCategory($query, $category_id) {
      if($category_id) {
        return $query->where('category_id', $category_id);
      }

    }

    public function scopeLevel($query, $level_id) {
        if($level_id) {
          return $query->where('level_id', $level_id);
        }
  
      }

    public function getRouteKeyName()
    {
        return "slug";
    }

    //relacion uno a muchos
    public function reviews() {
        return $this->hasMany('App\Models\Review');
    }
    public function requirements() {
        return$this->hasMany('App\Models\Requirement');
    }

    public function goals() {
        return$this->hasMany('App\Models\Goal');
    }

    public function audiences() {
        return$this->hasMany('App\Models\Audience');
    }

    public function sections() {
        return$this->hasMany('App\Models\Section');
    }


    //Relacion uno a uno inversa

    public function teacher() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function level() {
        return $this->belongsTo('App\Models\Level');
    }

    public function price() {
        return $this->belongsTo('App\Models\Price');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }

    //relacion muchos a muchos
    public function students()
    {
        # code...
        return $this->belongsToMany('App\Models\User');
    }

    //Relacion uno a uno polimorfica
    public function image()
    {
        # code...
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relacion uno a muchos trompeada??

    public function lessons() {
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Section');
    }

    //Relacion uno a uno
    public function observation()
    {
        return $this->hasOne(Observation::class);
    }

}
