<?php

namespace App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates=['fechapublicacion','fechaentrega'];

    protected $fillable=['titulo','descripcion'];

    public function category(){ //$post->category->name
        return $this->belongsTo('App\Category','category_id');
    }

    public function gruposMateria(){
        return $this->belongsToMany('App\GrupoMateria','grupomateria_post','post_id','grupomateria_id');
    }

    public function photos(){
        return $this->hasMany('App\Photo');
    }

    public function scopePublished($query){
        $query->whereNotNull('fechapublicacion')
                        ->where('fechapublicacion','<=',Carbon::now())
                        ->latest('fechapublicacion');

    }
}
