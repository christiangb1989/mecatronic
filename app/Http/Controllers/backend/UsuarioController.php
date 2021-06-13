<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    public function index()
    {
        $data = array(
            'data' => Usuario::all()
        );
        return view('usuarios.index', $data);
    }

    public function create()
    {

        return view('usuarios.new');
    }

    public function store(Request $request)
    {
        $sql = new Usuario;
        $sql->nombres = $request->nombres;
        $sql->tipo_persona = $request->tipo_persona;
        $sql->correo = $request->correo;
        $sql->acceso = $request->acceso;
        $sql->clave = $request->clave;
        $sql->direccion = $request->direccion;
        $sql->telefono1 = $request->telefono1;
        $sql->telefono2 = $request->telefono2;
        $sql->estado = $request->estado;
        $sql->save();

        return redirect()->route('usuario.index');
    }

    public function show(Usuario $usuario)
    {

    }

    public function edit(Usuario $usuario)
    {
        $data = array(
            'data' => $usuario
        );
        return view('usuarios.edit', $data);
    }

    public function update(Request $request, Usuario $usuario)
    {
        $sql = Usuario::find($usuario->id);
        $sql->nombres = $request->nombres;
        $sql->tipo_persona = $request->tipo_persona;
        $sql->correo = $request->correo;
        $sql->acceso = $request->acceso;
        $sql->clave = $request->clave;
        $sql->direccion = $request->direccion;
        $sql->telefono1 = $request->telefono1;
        $sql->telefono2 = $request->telefono2;
        $sql->estado = $request->estado;
        $sql->save();

        return redirect()->route('usuario.index');
    }

    public function destroy(Usuario $usuario)
    {

        $sql = Usuario::find($usuario->id);
        $sql->delete();

        return redirect()->route('usuario.index');

    }
}
