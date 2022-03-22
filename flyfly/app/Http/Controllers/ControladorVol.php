<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vol;
use PDF;
use App;
class ControladorVol extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vol = Vol::all();
        return view('vols/llista', compact('vol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vols/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouVol = $request->validate([
            'codiVol' => 'required|max:6',
            'codiAvio' => 'required|max:255',
            'ciutatOrigen' => 'required|max:255',
            'ciutatDestinacio' => 'required|max:255',
            'terminalOrigen' => 'required|max:255',
            'terminalDestinacio' => 'required|max:255',
            'dataSortida' => 'required|max:255',
            'horaSortida' => 'required|max:255',
            'dataArribada' => 'required|max:255',
            'horaArribada' => 'required|max:255',
            'classe' => 'required|max:255',
        ]);
        $dataSortida = $request->dataSortida . " " . $request->horaSortida;
        $dataArribada = $request->dataArribada . " " . $request->horaArribada;
        $nouVol["dataSortida"] = $dataSortida;
        $nouVol["dataArribada"] = $dataArribada;
        $vol = Vol::create($nouVol);
        return redirect('/vols')->with('completed', 'Vol creat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vol = Vol::findOrFail($id);
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
        <span>Codi Vol:</span> $vol->codiVol <br/>
        <span>Codi Avió:</span> $vol->codiAvio <br/>
        <span>Ciutat d'Origen:</span> $vol->ciutatOrigen <br/>
        <span>Terminal d'Origen:</span> $vol->terminalOrigen <br/>
        <span>Ciutat de Destinació:</span> $vol->ciutatDestinacio <br/>
        <span>Terminal de Destinació</span> $vol->terminalDestinacio <br/>
        <span>Data sortida:</span> $vol->dataSortida <br/>
        <span>Data arribada</span> $vol->dataArribada <br/>
        <span>Classe</span> $vol->classe <br/>
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
        $vol = Vol::findOrFail($id);
        return view('vols/actualitza', compact('vol'));
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
            'codiVol' => 'required|max:6',
            'codiAvio' => 'required|max:255',
            'ciutatOrigen' => 'required|max:255',
            'ciutatDestinacio' => 'required|max:255',
            'terminalOrigen' => 'required|max:255',
            'terminalDestinacio' => 'required|max:255',
            'dataSortida' => 'required|max:255',
            'dataArribada' => 'required|max:255',
            'classe' => 'required|max:255',
        ]);
        Vol::where('codiVol', $id)->update($dades);
        return redirect('/vols')->with('completed', 'Vol actualitzat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vol = Vol::findOrFail($id);
        $vol->delete();
        return redirect('/vols')->with('completed', 'Vol esborrat');
    }
}
