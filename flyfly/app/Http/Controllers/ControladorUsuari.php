<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
use App;
class ControladorUsuari extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuari = User::all();
        return view('usuaris/llista', compact('usuari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuaris/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouUsuari = $request->validate([
            'nom' => 'required|max:255',
            'cognoms' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'isCapDepartament' => 'required|max:255',
        ]);
        $nouUsuari["password"] = password_hash($nouUsuari["password"], PASSWORD_DEFAULT);
        $usuari = User::create($nouUsuari);
        return redirect('/usuaris')->with('completed', 'Usuari creat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuari = User::findOrFail($id);
        $isAdmin = "No";
        if($usuari->isCapDepartament == 1){
            $isAdmin = "Sí";
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
        <span>Nom Complet:</span> $usuari->nom $usuari->cognoms <br/>
        <span>Email:</span> $usuari->email <br/>
        <span>Es cap de departament?:</span> $isAdmin <br/>
        <span>Hora Entrada:</span> $usuari->horaEntrada <br/>
        <span>Hora Sortida:</span> $usuari->horaSortida <br/>
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
        $usuari = User::findOrFail($id);
        return view('usuaris/actualitza', compact('usuari'));
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
            'nom' => 'required|max:255',
            'cognoms' => 'required|max:255',
            'email' => 'required|max:255',
            'isCapDepartament' => 'required|max:255',
        ]);
        User::where('email', $id)->update($dades);
        return redirect('/usuaris')->with('completed', 'Usuari actualitzat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuari = User::findOrFail($id);
        $usuari->delete();
        return redirect('/usuaris')->with('completed', 'Usuari esborrat');
    }
    public function login()
    {
        echo "foo";
        //$usuari = User::findOrFail();
        //echo $usuari;
    }
}
