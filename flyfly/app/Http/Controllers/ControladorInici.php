<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorInici extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}
