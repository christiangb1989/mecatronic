<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\Usuario;
use Illuminate\Http\Request;

class GrupoController extends Controller
{

    public function index()
    {
        $data = array(
            'data' => Grupo::all()
        );
        return view('grupos.index', $data);
    }


    public function create()
    {
        $data = array(
            'data' => Usuario::all()
        );
        return view('grupos.new', $data);
    }


    public function store(Request $request)
    {
        $sql = new Grupo;
        $sql->name = $request->nombre;
        $sql->usuario_id = $request->usuario_id;
        $sql->save();

        return redirect()->route('grupo.index');
    }


    public function show(Grupo $grupo)
    {
        //
    }


    public function edit(Grupo $grupo)
    {
        $data = array(
            'data' => $grupo,
            'user' => Usuario::all()
        );
        return view('grupos.edit', $data);
    }


    public function update(Request $request, Grupo $grupo)
    {
        $sql = Grupo::find($grupo->id);
        $sql->name = $request->nombre;
        $sql->usuario_id = $request->usuario_id;
        $sql->save();

        return redirect()->route('grupo.index');
    }


    public function destroy(Grupo $grupo)
    {
        $sql = Grupo::find($grupo->id);
        $sql->delete();

        return redirect()->route('grupo.index');
    }
}
