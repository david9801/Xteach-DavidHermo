<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Curso;
use App\Models\Question;
use App\Models\Answer;
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
        //Funcion para ver cursos
        $curso = Curso::findOrFail($id);
        return view('class.CrearExamen')->with('curso', $curso);
    }


    public function create(Request $request, $id)
    {
        //para crear un examen, de momento solo titulo
        $request->validate([
            'title' => 'required|max:25',
            'questions.*.question' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!is_string($value)) {
                        $fail('La pregunta debe ser una cadena de caracteres');
                    }
                }
            ],
        ], [
            'title.required' => 'Por favor, ingresa un título para el examen',
        ]);


        // curso correspondiente al id de la url, el cual es el curso sobre el que se quiere crear/subir un examen
        $curso = Curso::find($id);

        // crear un nuevo examen y guardar el título y el id del curso
        $exam = new Exam();
        $exam->title = $request->title;
        $exam->curso_id = $curso->id;
        $exam->save();

        // guardar las preguntas asociadas con el examen
        foreach ($request->questions as $question) {
            $exam->questions()->create([
                'question' => $question['question'],
                'answer1' => $question['answer1'],
                'answer2' => $question['answer2'],
                'answer3' => $question['answer3'],
                'correct_answer' => $question['correct_answer']
            ]);
        }

        // redirigir al usuario a la página del curso al que pertenece el examen
        return redirect()->route('showcursosadmin', $curso->id);
    }


    public function index($curso_id)
    {
        $exams = Exam::where('curso_id', $curso_id)->get();
        return view('class.CrearExamen', compact('exams'));
    }
    public function mostrarPosibleExamen($id)
    {
        //funcion que muestra los examenes creados por un profesor de una asignatura en concreto
        $curso = Curso::findOrFail($id);
        $exams = Exam::where('curso_id', $id)->get();
        return view('class.HacerExamen')->with(['curso' => $curso, 'exams' => $exams]);

    }

    public function showQuestion($id)
    {
        $exam = Exam::findOrFail($id);
        return view('class.HacerTest', compact('exam'));
    }


    public function submitQuestion(Request $request, $id)
    {
        $exam = Exam::findOrFail($id);
        $questions = $exam->questions;
        $user = auth()->user();
        $inscripcionId = $exam->curso->inscripcion_id;
//tengo un problema con inscripcion_id
        foreach ($questions as $question) {
            $userAnswer = $request->input('answer'.$question->id);

            $answer = new Answer([
                'user_id' => $user->id,
                'inscripcion_id' => $inscripcionId,
                'question_id' => $question->id,
                'answer' => $userAnswer
            ]);
            $answer->save();
        }

        return view('contact.welcome');
    }






}
