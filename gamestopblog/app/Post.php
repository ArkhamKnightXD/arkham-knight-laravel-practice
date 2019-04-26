<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // El nombre de la tabla

    protected $table = 'posts';

    //primary key

    public $primaryKey = 'id';

     public $timestamps = true;
}
