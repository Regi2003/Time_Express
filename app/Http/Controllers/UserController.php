<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::paginate(2);
        return view('usuarios.list', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:30',
            'apellidos' => 'required|string|max:40',
            'email' => 'required|string|email|max:30',
            'password' => 'required|string|min:6',
            'rol' => 'required|string'
        ]);

        User::create([
            'name' => $validate['name'],
            'apellidos' => $validate['apellidos'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'rol' => $validate['rol'],
        ]);
        Alert::success('Éxito', 'El usuario ha sido creado correctamente')->flash();
        return redirect()->route('user.list');

    }

    public function edit($id)
    {
        $usuario = User::find($id);
        return view('usuarios.update', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:30',
            'apellidos' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);
    
        $usuario = User::find($id);
    
        $usuario->name = $request->name;
        $usuario->apellidos = $request->apellidos;
        $usuario->email = $request->email;
        $usuario->save();

        return redirect()->route('user.list');
        Alert::success('Éxito', 'Los datos han sido guardados correctamente')->flash();
    }

    public function destroy($id)
    {
        $usuario = User::find($id);
        $usuario->delete();
        Alert::success('Éxito', 'El usuario ha sido eliminado correctamente')->flash();
        return redirect()->route('user.list');
    }
}
