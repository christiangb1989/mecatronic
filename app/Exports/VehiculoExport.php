<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Gps;

class VehiculoExport implements FromCollection
{
    private $userID;

    public function __construct($id)
    {
        $this->userID = $id;
    }

    public function collection()
    {
        return Gps::where('imei', $this->userID)->get();

    }
}
