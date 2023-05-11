<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Sesion extends Model
{
    protected $table= 'sesiones';

    protected $primaryKey = 'id';

    protected $fillable = ['asistencia','descripcion', 'maquina', 'user_id', 'ip', 'created_at', 'updated_at'];

    public function users(){
        return $this->hasOne('App\Asignacion');
    }
    
}
