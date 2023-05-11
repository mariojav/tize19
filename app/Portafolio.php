<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    protected $table= 'portafolios';
    protected $primaryKey = 'id';

    // protected $fillable = ['nombre', 'desc', 'fechaPublicaion', 'fechaLimite', 'remember_token'];
    
    public function tareas(){
        return $this->hasToMany('App\Tarea','tareas_id');
    }

    public function user(){
        return $this->hasTo('App\User','user_id');
    }
}
