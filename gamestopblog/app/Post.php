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

     public function user()
     {
    // Con esta funcion especifamos una relacion entre post y user esto quiere decir que un post pertenece a un usuario
         return $this->belongsTo('App\User');
     }

}
