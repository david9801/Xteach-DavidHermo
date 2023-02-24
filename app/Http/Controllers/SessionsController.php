<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use App\Rules\ExistingEmail;
class SessionsController extends Controller
{
    public function create()
    {
        return view('users.LoginForm');
    }

    public function dologin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ],  [
            'email.required' => 'Por favor introduzca el correo.',
            'email.email' => 'Por favor introduzca un correo válido.',
            'password.required' => 'Por favor introduzca la contraseña.',
        ]);


        if (Auth::attempt($credentials)) {
            // Inicio de sesión exitoso
            return redirect()->route('welcome');
        }
        // Inicio de sesión fallido
        return back()->withErrors(['email' => 'Estas credenciales no coinciden con nuestros registros']);
    }
    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required','confirmed'],
            'password_confirmation' => ['required', 'same:password'],
        ]);
        $validator->after(function ($validator) {
            if ($validator->errors()->has('password')) {
                $validator->errors()->add('password', 'Por favor, ingrese las contraseñas iguales');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (!$validator->passes()) {
            if ($request->password !== $request->password_confirmation) {
                $validator->errors()->add('password_confirmation', 'Las contraseñas deben ser iguales');
            }
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('welcome')->with('success', 'Password updated successfully!');
    }

    public function upload(Request $request, $id)
    {
        Log::error('entra en upload');
        $user = User::findOrFail($id);
        Log::error('error pre hasfile');
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = $image->getClientOriginalName();
            $path = $image->storeAs('public/', $filename);
            // Actualizar el nombre de archivo en la base de datos
            $user->profile_image = $filename;
            Log::error('error pre save');
            $user->save();

            return redirect()->route('welcome')->with('success', 'Foto de perfil subida correctamente.');
        } else {
            return redirect()->back()->withErrors(['profile_image' => 'Por favor, seleccione un archivo de imagen.']);
        }
    }

    public function deleteProfileImage($id)
    {
        $user = User::findOrFail($id);
        if ($user->profile_image) {
            // Eliminar el archivo de almacenamiento
            Storage::delete('public/' . $user->profile_image);
            // Eliminar el nombre del archivo de la base de datos
            $user->profile_image = null;
            $user->save();

            return redirect()->route('welcome')->with('success', 'Foto de perfil eliminada correctamente.');
        } else {
            return redirect()->back()->withErrors(['profile_image' => 'No hay ninguna foto de perfil para eliminar.']);
        }
    }



    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('welcome');
    }

    public function deleteuser($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            return redirect()->route('welcome');
        } catch (\Exception $e) {
            Log::error("Error al eliminar usuario: {$e->getMessage()}");
            return redirect()->back()->with('error', 'Ocurrió un error al intentar eliminar el usuario');
        }
    }

}
