<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class GrupoMateria extends Model
{
    protected $table = 'grupos_materia';
    protected $primaryKey = 'id';
    protected $fillable = ['nombregrupomat','materia_id','user_id','updated_at','created_at'];

    public function materia(){
        return $this->belongsTo('App\Materia','materia_id');
    }

    public function usuario(){
        return $this->belongsTo('App\User','user_id');
    }

    public function asignacion(){
        return $this->hasOne('App\Asignacion');
    }

    /**
     * Un grupo de materia, tiene muchas publicaciones
     */
     public function publicacions(){
        return $this->hasMany(Publicacion::class);
     }

    public function users () {
        return $this->belongsToMany('App\User','grupomateria_user','grupomateria_id','user_id')->withTimestamps();
    }

    public function posts() {
        return $this->belongsToMany('App\Post','grupomateria_post','post_id','grupomateria_id')->withTimestamps();
    }

}