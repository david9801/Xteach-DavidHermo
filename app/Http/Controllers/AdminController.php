<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\User;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class AdminController extends Controller
{

    public function show(){
        //para mostrar los cursos que ha subido un administrador
        //como esta funcion solo se va a llegar si estas logueado
        //y ademas si eres admin unicamente
        $cursos = Curso::where('user_id', Auth::user()->id)->get();
        return view('class.MisCursos', compact('cursos'));

    }

    public function index()
    {
        // Obtén el usuario actual
        $user = Auth::user();

        // Obtén los cursos asociados con el usuario actual junto con sus inscripciones
        $cursos = $user->cursos()->with('inscripciones')->get();

        return view('class.MisCursos', compact('cursos'));
    }



}
