<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{

    public function index()
    {
        $data = array(
          'data' => Dispositivo::all()
        );
        return view('dispositivos.index', $data);
    }

    public function create()
    {
        return view('dispositivos.new');
    }

    public function store(Request $request)
    {
        $sql = new Dispositivo;
        $sql->name = $request->name;
        $sql->anio = $request->anio;
        $sql->save();
        return redirect()->route('dispositivo.index');
    }

    public function show(Dispositivo $dispositivo)
    {
        //
    }

    public function edit(Dispositivo $dispositivo)
    {
        $data = array(
            'data' => $dispositivo
        );
        return view('dispositivos.edit', $data);
    }

    public function update(Request $request, Dispositivo $dispositivo)
    {
        $sql = $dispositivo;
        $sql->name = $request->name;
        $sql->anio = $request->anio;
        $sql->save();
        return redirect()->route('dispositivo.index');
    }

    public function destroy(Dispositivo $dispositivo)
    {
        $sql =  $dispositivo;
        $sql->delete();
        return redirect()->route('dispositivo.index');
    }
}
