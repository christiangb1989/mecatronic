<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Exports\VehiculoExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Gps;
class ReporteController extends Controller
{

    public function index()
    {
        $data = array(
            'data' => Vehiculo::all()
        );

        //return Vehiculo::all();
        return view('reportes.index', $data);
    }

    public function exportExcel($id, $placa)
    {
        return Excel::download(new VehiculoExport($id), $placa.'-gps.xlsx');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
