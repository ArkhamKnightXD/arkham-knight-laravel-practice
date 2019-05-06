<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Console extends Model
{
    // nombre de la tabla

    protected $table = 'consoles';

    //primary key

    public $primarykey = 'id';

    public $timestamps = 'true';
}
