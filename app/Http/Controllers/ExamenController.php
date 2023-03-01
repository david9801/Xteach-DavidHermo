<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
class ExamenController extends Controller
{

    public function showexamenes()
    {
        //Funcion que muestra las asignaturas inscritas de un alumno
        //para elegir una asignatura y ver si hay examenes disponibles
        $user = Auth::user();
        $inscripciones = $user->inscripcions;
        return view('class.IrExamen')->with('inscripciones', $inscripciones);
    }
    public function verPosibleExamen($id)
    {
        //Funcion para ver una asingatura en concreto y realizar pruebas/examenes de ella
        $curso = Curso::findOrFail($id);
        $exams = Exam::where('curso_id', $id)->get();
        return view('class.HacerExamen')->with(['curso' => $curso, 'exams' => $exams]);
    }
    public function crearPosibleExamen($id)
    {
        //Funcion para ver una asingatura en concreto y realizar pruebas/examenes de ella
        $curso = Curso::findOrFail($id);
        return view('class.CrearExamen')->with('curso', $curso);
    }

    public function create(Request $request, $id)
    {
        //para crear un examen, de momento solo titulo
        $request->validate([
            'title' => 'required|max:25',
        ], [
            'title.required' => 'Por favor, ingresa un título para el examen.',
        ]);

        // curso correspondiente al id de la url, el cual es el curso sobre el que se quiere crear/subir un examen
        $curso = Curso::find($id);

        // crear un nuevo examen y guardar el título y el id del curso
        $exam = new Exam();
        $exam->title = $request->title;
        $exam->curso_id = $curso->id;
        $exam->save();

        // redirigir al usuario a la página del curso al que pertenece el examen
        return redirect()->route('showcursosadmin', $curso->id);
    }
    public function index($curso_id)
    {
        $exams = Exam::where('curso_id', $curso_id)->get();
        return view('class.CrearExamen', compact('exams'));
    }




}
