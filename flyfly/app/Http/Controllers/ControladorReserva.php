<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use PDF;
use App;
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
            'passaportClient' => 'required|max:9',
            'codiVol' => 'required|max:6',
            'numeroSeient' => 'required|max:255',
            'isEquipatgeMa' => 'required|max:255',
            'isEquipatgeCabinaMenor20' => 'required|max:255',
            'quantitatEquipatgesFacturats' => 'required|max:255',
            'tipusAsseguranca' => 'required|max:255',
            'preuVol' => 'required|max:255',
            'tipusChecking' => 'required|max:255'
        ]);

        $loc = $request->passaportClient . $request->codiVol;
        $localitzadorReserva = substr(strtoupper(sha1($loc)), 0, 9);
        $nouReserva["localitzadorReserva"] = $localitzadorReserva;
        echo var_dump($nouReserva);

        $reserva = Reserva::create($nouReserva);
        return redirect('/reservas')->with('completed', 'Reserva creada!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = json_decode($id);
        $passaportClient = $id[0];
        $codiVol = $id[1];
        $reserva = Reserva::where('passaportClient', '=', $passaportClient)->where('codiVol', '=', $codiVol)->first();
        $EquipatgeMa = "No";
        if($reserva->isEquipatgeMa == 1){
            $EquipatgeMa = "Sí";
        }
        $EquipatgeCabina = "No";
        if($reserva->isEquipatgeCabinaMenor20 == 1){
            $EquipatgeCabina = "Sí";
        }
        $HTML = "
        <style>
        *{
            font-family: 'Nunito', sans-serif;
            font-size: 18px;
        }
        span{
            color: #1565c0;
            font-weight: bold;
        }
        </style>
        <span>Passaport Client:</span> $reserva->passaportClient <br/>
        <span>Codi Vol:</span> $reserva->codiVol <br/>
        <span>Número de Seient:</span> $reserva->numeroSeient <br/>
        <span>Equipatge de mà:</span> $EquipatgeMa <br/>
        <span>Equipatge de Cabina menys 20kg:</span> $EquipatgeCabina <br/>
        <span>Quantitat d'equipatges Facturats:</span> $reserva->quantitatEquipatgesFacturats <br/>
        <span>Tipus d'Assegurança:</span> $reserva->tipusAsseguranca <br/>
        <span>Preu Vol:</span> $reserva->preuVol <br/>
        <span>Tipus de Checking:</span> $reserva->tipusChecking <br/>
        ";
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($HTML);
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = json_decode($id);
        $passaportClient = $id[0];
        $codiVol = $id[1];
        $reserva = Reserva::where('passaportClient', '=', $passaportClient)->where('codiVol', '=', $codiVol)->first();
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
            'passaportClient' => 'max:9',
            'codiVol' => 'max:6',
            'localitzadorReserva' => 'max:255',
            'numeroSeient' => 'required|max:255',
            'isEquipatgeMa' => 'required|max:255',
            'isEquipatgeCabinaMenor20' => 'required|max:255',
            'quantitatEquipatgesFacturats' => 'required|max:255',
            'tipusAsseguranca' => 'required|max:255',
            'preuVol' => 'required|max:255',
            'tipusChecking' => 'required|max:255',
        ]);
        //
        $id = json_decode($id);
        $passaportClient = $id[0];
        $codiVol = $id[1];
        Reserva::where('passaportClient', '=', $passaportClient)->where('codiVol', '=', $codiVol)->update($dades);
        return redirect('/reservas')->with('completed', 'Reserva actualitzada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = json_decode($id);
        $passaportClient = $id[0];
        $codiVol = $id[1];
        Reserva::where('passaportClient', '=', $passaportClient)->where('codiVol', '=', $codiVol)->delete();
        return redirect('/reservas')->with('completed', 'Reserva esborrada');
    }
}
