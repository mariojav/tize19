<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Hash;
use Spatie\Permission\Models\Role;

/**
 * Class User
 *
 * @package App
 * @property string $name
 * @property string $apellidopaterno
 * @property string $apellidomaterno
 * @property string $cedula
 * @property string $codigosiss
 * @property string $email
 * @property string $password
 * @property string $remember_token
*/
class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $table= 'users';

    protected $primaryKey = 'id';

    protected $fillable = ['name','apellidopaterno', 'apellidomaterno', 'cedula', 'codigosiss', 'email', 'password', 'remember_token'];
    
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input)
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
    }
    
    
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }
    
    
    public function usuarios(){
        return $this->hasMany('App\GrupoMateria');
    }

    public function asignacion(){
        return $this->hasOne('App\Asignacion');
    }

    /**
     * Un usuario (Estudiante) tiene muchas tareas
     */
    public function tareas(){
        return $this-> hasMany(Tarea::class);
    }

    // public function gruposMateria(){
    //     return $this->belongsTo(Usuario_GrupoMat::class);
    // }

    public function portafolio(){
        return $this->hasTo('App\Portafolio','portafolio_id');
    }

    public function getnombre(){
        return $this->name.' '.$this->apellidopaterno;
    }
    public function gruposmateria() {
        return $this->belongsToMany('App\GrupoMateria','grupomateria_user','user_id','grupomateria_id')->withTimestamps();
    }

    public function materias() {
        return $this->belongsToMany('App\Materia','materia_user','user_id','materia_id')->withTimestamps();
    }

    //Sesiones
    public function sesiones(){
        return $this-> hasMany(Sesion::class);
    }

}
