<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    //
    protected $table = 'asignaciones';

    protected $primaryKey = 'id';

    protected $fillable = ['user_id','grupomateria_id','grupolaboratorio_id','updated_at','created_at'];

    public function user(){
      return $this->belongsTo('App\User','user_id');
    }

    public function grupoMateria(){
      return $this->belongsTo('App\GrupoMateria','grupomateria_id');
    }

    public function grupoLaboratorio(){
      return $this->belongsTo('App\GrupoLaboratorio','grupolaboratorio_id');
    }
}
