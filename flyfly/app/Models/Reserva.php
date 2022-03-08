<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $primaryKey = ['passaportClient', 'codiVol']; // Para que pille la columna email como primary key
    public $incrementing = false; // Para que no devuelva 0 en el email
    public $timestamps = false; // Per a que no intenti modificar la data de creacio ni modificacio

    use HasFactory;
    protected $fillable = [
        'passaportClient',
        'codiVol',
        'localitzadorReserva',
        'numeroSeient',
        'isEquipatgeMa',
        'isEquipatgeCabinaMenor20',
        'quantitatEquipatgesFacturats',
        'tipusAsseguranca',
        'preuVol',
        'tipusChecking'
    ];
}
