<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // cuando vayamos a trabajar con relaciones debemos venir al modelo y a esta funcion esto debemos hacerlo en los 
    //2 modelos que tengan la relacion
    public function posts(Type $var = null)
    {
        // Aqui especificamos la otra parte de la relacion pues es una relacion de 1 a mucho en la que un usuario puede 
        //tener uno o muchos posts por eso se usa el hasmany y se especifica la ruta del modelo tambien
        return $this->hasMany('App\Post');
    }
}
