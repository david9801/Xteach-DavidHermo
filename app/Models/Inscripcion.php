<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'curso_id',
        'nota_media',
        'progreso_medio',
    ];

    protected $casts = [
        'superado' => 'boolean',
        'graduado' => 'boolean'
    ];
    //Establezco las relaciones, las cuales vienen dadas muy claras en el PDF
    //relacion uno a muchos (de una bbdd relacional)
    //Una inscripción pertenece a un solo usuario(alumno)
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    //Un curso pertenece a un solo usuario(alumno)
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
    //una inscripcion puede tener varias respuestas
    //tantas como preguntas haya
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
