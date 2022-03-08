<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ControladorReserva extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reserva = Reserva::all();
        return view('reservas/llista', compact('reserva'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouReserva = $request->validate([
            'passaportClient' => 'required|max:6',
            'codiVol' => 'required|max:255',
            'numeroSeient' => 'required|max:255',
            'isEquipatgeMa' => 'required|max:255',
            'isEquipatgeCabinaMenor20' => 'required|max:255',
            'quantitatEquipatgesFacturats' => 'required|max:255',
            'tipusAsseguranca' => 'required|max:255',
            'preuVol' => 'required|max:255',
            'tipusChecking' => 'required|max:255',
        ]);
        $nouReserva["localitzadorReserva"] = "foo";

        echo var_dump($nouReserva);

        $reserva = Reserva::create($nouReserva);
        return redirect('/nouReservas')->with('completed', 'Reserva creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        return view('reservas/actualitza', compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dades = $request->validate([
            'passaportClient' => 'required|max:6',
            'codiVol' => 'required|max:255',
            'numeroSeient' => 'required|max:255',
            'isEquipatgeMa' => 'required|max:255',
            'isEquipatgeCabinaMenor20' => 'required|max:255',
            'quantitatEquipatgesFacturats' => 'required|max:255',
            'tipusAsseguranca' => 'required|max:255',
            'preuVol' => 'required|max:255',
            'tipusChecking' => 'required|max:255',
        ]);
        //
        
        
        
        
        Reserva::where('codiVol', $id)->update($dades);
        //return redirect('/reservas')->with('completed', 'Reserva actualitzada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
