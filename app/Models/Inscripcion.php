<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;
    //Quito timestamps porque la finalidad es académica, en una implementacion real es util este valor para por ejemplo,
    //suspender a un alumno un curso si han pasado 6 meses desde que se inscribió
    public $timestamps = false;
    //añado los valores de la tabla inscripciones
    protected $fillable = [
        'curso_id',
        'user_id',
        'nota_media',
        'progreso_medio',
        'superado'
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
}
