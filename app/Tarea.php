<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tarea extends Model
{   
    //Agregado
    protected $table= 'tareas';
    protected $primaryKey = 'id';

    protected $dates=['fecha_entrega'];
    
    protected $fillable = ['titulotarea', 'desctarea', 'calificacion','user_id','portafolio_id','post_id', 'remember_token'];
        
    /**
     * Una tarea pertenece a un usuario
     */
    // public function user(){
    //     return $this->belongsTo('App\User','user_id');
    // }
    // /**
    //  * Una tarea tiene uno a muchos archivos de tareas
    //  */
    // public function archivoTareas(){
    //     return $this->hasMany(ArchivoTarea::class);
    // }


    // public function publicacion(){
    //     return $this->belongsTo('App\Publicacion','publicacion_id');
    // }


    // public function actividades(){
    //     return $this->hasMany(Actividad::class);
    // }

    // public function portafolio(){
    //     return $this->belongsToMany('App\Portafolio','portafolio_id');
    // }


    // public function gruposMateria(){
    //     return $this->belongsToMany('App\GrupoMateria','grupomateria_post','tarea_id','grupomateria_id');
    // }

    public function files(){
        return $this->hasMany('App\File');
    }

    // public function scopePublished($query){
    //     $query->whereNotNull('fecha_entrega')
    //                     ->where('fecha_entrega','<=',Carbon::now())
    //                     ->latest('fecha_entrega');

    // }


}

