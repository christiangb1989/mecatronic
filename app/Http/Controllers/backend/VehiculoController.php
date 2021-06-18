<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Vehiculo;
use App\Models\Grupo;
use App\Models\Gps;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{

    public function index()
    {
        $data = array(
            'data' => Vehiculo::all()
        );
        return view('vehiculos.index', $data);
    }

    public function create()
    {
        $data = array(
            'grupo' => Grupo::all(),
            'dispositivo' => Dispositivo::all()
        );
        return view('vehiculos.new', $data);
    }

    public function store(Request $request)
    {
        $sql = new Vehiculo;
        $sql->grupo_id = $request->grupo_id;
        $sql->imei = $request->imei;
        $sql->placa = $request->placa;
        $sql->num_chip = $request->num_chip;
        $sql->operador = $request->operador;
        $sql->tipo = $request->tipo;
        $sql->dispositivo_id = $request->dispositivo_id;
        $sql->marca = $request->marca;
        $sql->modelo = $request->modelo;
        $sql->color = $request->color;
        $sql->anio = $request->anio;
        $sql->odometro = $request->odometro;
        $sql->sms = $request->sms;
        $sql->estado = $request->estado;
        $sql->save();

        return redirect()->route('vehiculo.index');
    }

    public function show(Vehiculo $vehiculo)
    {
        $data = array(
            'data' => $vehiculo,
            'gps' => Gps::where('imei', $vehiculo->imei)->first()
        );
        return view('vehiculos.show', $data);
    }



    public function edit(Vehiculo $vehiculo)
    {
        $data = array(
            'grupo' => Grupo::all(),
            'dispositivo' => Dispositivo::all(),
            'data' => $vehiculo
        );
        return view('vehiculos.edit', $data);
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $sql = $vehiculo;
        $sql->grupo_id = $request->grupo_id;
        $sql->imei = $request->imei;
        $sql->placa = $request->placa;
        $sql->num_chip = $request->num_chip;
        $sql->operador = $request->operador;
        $sql->tipo = $request->tipo;
        $sql->dispositivo_id = $request->dispositivo_id;
        $sql->marca = $request->marca;
        $sql->modelo = $request->modelo;
        $sql->color = $request->color;
        $sql->anio = $request->anio;
        $sql->odometro = $request->odometro;
        $sql->sms = $request->sms;
        $sql->estado = $request->estado;
        $sql->save();

        return redirect()->route('vehiculo.index');
    }

    public function destroy(Vehiculo $vehiculo)
    {
        $sql = $vehiculo;
        $sql->delete();

        return redirect()->route('vehiculo.index');

    }
}
