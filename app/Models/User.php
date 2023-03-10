<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;
    //se ha añadido el paquete spatie, para permisos y roles, los cuales uso en mi modelo User

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','progresomedio','notamedia'
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
        'graduado' => 'boolean'
    ];
    //aqui defino la relacion uno a muchos
    //un usuario(alumno) puede tener varias inscripciones
    public function inscripcions(){
        return $this->hasMany(Inscripcion::class,'user_id');
    }
    public function cursos(){
        return $this->hasMany(Cursos::class,'user_id');
        //un profesor puede tener varios cursos creados
    }

}
