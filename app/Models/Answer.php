<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'answer',
        'question_id',
        'inscripcion_id'
    ];
    //una respuesta pertenece a un sola pregunta
    public function question()
    {
        return $this->belongsTo(Question::class,'question_id');
    }
    //una respuesta pertenece a un solo alumno, es decir, a una sola inscripcion
    //del alumno/user
    public function inscripcion()
    {
        return $this->belongsTo(Inscripcion::class,'inscripcion_id');
    }


}
