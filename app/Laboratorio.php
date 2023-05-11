<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    use Notifiable;

    protected $table = 'laboratorios';

    protected $primaryKey = 'id';

    protected $fillable = ['nombrelab','nummaquinas','updated_at','created_at'];

    public function gruposLaboratorio(){
        return $this->hasMany('App\GrupoLaboratorio');
    }
}
