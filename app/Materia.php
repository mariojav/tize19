<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 *
 * @package App
 * @property string $nombreMateria
 * @property string $codigoMateria
 * @property string $descripcionMateria
 */ 
 
class Materia extends Model
{
    use Notifiable;

    protected $table= 'materias';

    protected $primaryKey = 'id';

    protected $fillable = ['nombremateria','codigomateria','updated_at','created_at'];

    public function grupoLaboratorio(){
        return $this->hasOne('App\GrupoLaboratorio');
    }

    // public function gruposMateria(){
    //     return $this->belongsToMany(GrupoMateria::class,'gruposMateria','materia_id','grupoMateria_id');
    // }
    
    public function gruposMateria(){
        return $this->hasMany('App\GrupoMateria');
    }

    public function users() {
        return $this->belongsToMany('App\User','materia_user','materia_id','user_id')->withTimestamps();
    }
 
}
