<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];
    protected $table= 'files';
    protected $primaryKey = 'id';

}

