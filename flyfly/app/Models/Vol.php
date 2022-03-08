<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vol extends Model
{
    protected $primaryKey = 'codiVol'; // Para que pille la columna email como primary key
    public $incrementing = false; // Para que no devuelva 0 en el email
    public $timestamps = false; // Per a que no intenti modificar la data de creacio ni modificacio

    use HasFactory;
    protected $fillable = [
        'codiVol',
        'codiAvio',
        'ciutatOrigen',
        'ciutatDestinacio',
        'terminalOrigen',
        'terminalDestinacio',
        'dataSortida',
        'dataArribada',
        'classe'        
    ];
}
