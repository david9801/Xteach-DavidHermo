<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'temas',
        'archivo',
        'user_id'
    ];
    //aqui defino relacion uno a muchos, un curso puede tener varias inscripciones, pues es de diferentes alumnos
    //cada inscripcion
    public function inscripcions(){
        return $this->hasMany(Inscripcion::class,'curso_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
        //un curso pertenece a un user_id profesor
    }
}
