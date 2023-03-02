<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'exam_id',
        'question',
        'answer1',
        'answer2',
        'answer3',
        'correct_answer'
    ];
    //una pregunta pertenece a un único exam
    public function exam()
    {
        return $this->belongsTo(Exam::class,'exam_id');
    }
    //una pregunta puede tener varias respuestas, tantas respuestas como usuarios
    //alumnos realicen el examen
    public function answers()
    {
        return $this->hasMany(Answer::class,'question_id');
    }
}
