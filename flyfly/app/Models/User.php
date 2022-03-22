<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'email'; // Para que pille la columna email como primary key
    public $incrementing = false; // Para que no devuelva 0 en el email
    public $timestamps = false; // Per a que no intenti modificar la data de creacio ni modificacio

    protected $fillable = [
        'nom',
        'cognoms',
        'email',
        'password',
        'isCapDepartament',
        'horaEntrada',
        'horaSortida'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [];
}
