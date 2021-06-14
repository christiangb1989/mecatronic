<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class);
    }
}
