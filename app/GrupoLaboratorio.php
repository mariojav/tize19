<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrupoLaboratorio extends Model
{
    protected $table = 'grupos_laboratorio';
    protected $fillable = ['nombregrupolab','materia_id','laboratorio_id','diagrupo','horagrupo','updated_at','created_at'];
 

    public function materia(){
        return $this->belongsTo('App\Materia');
    }

    public function laboratorio(){
        return $this->belongsTo('App\Laboratorio');
    }

    public function asignacion(){
        return $this->hasOne('App\Asignacion');
    }

}

