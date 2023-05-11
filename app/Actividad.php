<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividads';
    protected $primaryKey = 'id';
    protected $fillable = ['observaciones','descripcion','fecha','tareas_id'];

    public function tarea(){
        // return $this->hasMany('App\Publicacion');
        return $this->belongTo('App\Tarea');
    }

}
