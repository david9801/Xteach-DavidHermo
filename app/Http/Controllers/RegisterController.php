<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class RegisterController extends Controller
{
    public function create(){
        return view('users.RegisterForm');
        //me retorna la vista del formulario de registro para un usuario alumno
    }
    public function createadmin(){
        return view('users.RegisterFormAdmin');
        //me retorna la vista del formulario de registro para un usuario admin, que será el profesor o el creador de cursos
    }
    public function store(Request $request)
    {
        //valido el registro;
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|unique:users,name',
            'email' => 'sometimes|required|email|unique:users,email',
            'password' => 'sometimes|required|max:30'
        ]);
        //si hay errores al validar
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //creo el usuario
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //asigno el rol de alumno en el formulario de registro de alumno
        $user->assignRole('alumno');
        //me logueo
        auth()->login($user);
        //retorno la ruta welcome->la vista class.welcome
        return redirect()->route('welcome');
    }
    public function storeadmin(Request $request)
    {
        //valido el registro;
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|unique:users,name',
            'email' => 'sometimes|required|email|unique:users,email',
            'password' => 'sometimes|required|max:30'
        ]);
        //si hay errores al validar
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        //creo el usuario
        $user=new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        //asigno rol de admin en el formulario de creador de cursos
        $user->assignRole('admin');
        //me logueo
        auth()->login($user);
        //retorno la ruta welcome->la vista class.welcome
        return redirect()->route('welcome');
    }
}
