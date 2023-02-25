<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\Inscripcion;
class CursoController extends Controller
{
    public function index()
    {
        //metodo index de CursoController para mostrar todos los cursos que hay disponibles
        $cursos = Curso::all();
        return view('class.InscripcionCurso', compact('cursos'));
    }

    public function showmycursos()
    {
        // Obtén el usuario actual
        $user = Auth::user();
        //inscripciones del usuario actual, que viene dado por la funcion de la relacion
        //hasmany del modelo user
        $inscripciones = $user->inscripcions;
        return view('class.MisCursos')->with('inscripciones', $inscripciones);
    }


    public function create(Request $request)
    {
        //metodo create para que un admin cree/añada un curso a la plataforma
        //validamos los datos de entrada de un curso
        //nombre y temas
        $request->validate([
            'name' => 'required|max:25|unique:cursos,name',
            'temas' => 'required|integer|between:1,1000'
        ], [
            'name.required' => 'Por favor, escribe un nombre para el curso',
            'temas.required' => 'Por favor, indica cuántos temas tiene el curso',
            'name.unique' => 'Lo sentimos!El nombre del curso ya existe, pruebe otro parecido!'
        ]);
        //añadimos el curso a nuestra bbdd
        $curso=new Curso();
        $curso->name = $request->name;
        $curso->temas = $request->temas;
        //le pasamos el user_id a la tabla cursos para saber que cursos ha subido cada profesor
        $curso->user_id = Auth::user()->id;
        $curso->save();
        //retornamos la ruta que devuelve la vista que muestra solo los cursos
        //creados por un admin(profesor) en particular
        return redirect()->route('showcursosadmin');

    }
    public function inscribirse(Request $request)
    {
        //metodo para que un alumno se inscriba en un curso
        $user_id = Auth::user()->id;
        $curso_id = $request->curso_id;
        // Busca una inscripción con el user_id y el curso_id
        $existe = Inscripcion::where('user_id', $user_id)->where('curso_id', $curso_id)->first();

        // Si ya existe una inscripción, muestra un mensaje de error
        if ($existe) {
            return redirect()->back()->withErrors(['Ya estás inscrito en este curso, tienes más cursos disponibles']);
        }
        // Se crea una inscripcion a la tabla inscripciones de la bbdd, que es de un usuario y de un curso
        $inscripcion = new Inscripcion();
        //añadimos el id del usuario al id, que es el id del user que esta log
        $inscripcion->user_id = Auth::user()->id;
        //obligamos a que el user deba elegir el curso, elegiremos un select
        $inscripcion->curso_id = $request->curso_id;
        $inscripcion->save();
        return redirect()->route('welcome');
    }
    public function doingcurso(Request $request, $id)
    {
        //metodo para realizar las acciones necesarias para que un alumno supere un curso
        $inscripcion = Inscripcion::find($id);
        $inscripcion->nota_media = $request->input('nota_media');
        $inscripcion->progreso_medio = $request->input('progreso_medio');

        $curso = Curso::find($inscripcion->curso_id);
        if ($inscripcion->progreso_medio >= $curso->temas) {
            $inscripcion->superado = true;
        } else {
            $inscripcion->superado = false;
        }

        $inscripcion->save();
        return redirect()->back();
    }


    public function showmycursossuperados()
    {
        //funcion para mostrar en una vista los cursos superados por el alumno
        $user = Auth::user();
        //inscripciones del usuario(alumno) que han sido superadas
        $inscripciones = $user->inscripcions()->where('superado', true)->get();

        // Obtén los nombres de los cursos correspondientes a las inscripciones
        $cursosNombres = [];
        foreach ($inscripciones as $inscripcion) {
            $cursoNombre = $inscripcion->curso->name;
            $cursosNombres[] = $cursoNombre;
        }

        return view('users.ViewProfile', compact('cursosNombres'));
    }


}
