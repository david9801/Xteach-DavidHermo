<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'curso_id'
    ];
    //un examen pertenece a un curso
    //Un profesor que ha subido un examen, ese examen solo pertenece a ese curso
    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
    //un exam puede tener varias preguntas
    public function questions()
    {
        return $this->hasMany(Question::class,'exam_id');
    }
}
