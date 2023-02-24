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
    ];
    //aqui defino relacion uno a muchos, un curso puede tener varias inscripciones, pues es de diferentes alumnos
    //cada inscripcion
    public function inscripcions(){
        return $this->hasMany(Inscripcion::class,'curso_id');
    }
}
