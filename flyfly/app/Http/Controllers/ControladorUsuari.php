<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuari;

class ControladorUsuari extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuari = Usuari::all();
        return view('index', compact('usuari'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('welcome');
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
            'horaEntrada' => 'required|max:255',
            'horaSortida' => 'required|max:255',
        ]);
        $usuari = Usuari::create($nouUsuari);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuari = Usuari::findOrFail($id);
        return view('actualitza', compact('usuari'));
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
            'password' => 'required|max:255',
            'isCapDepartament' => 'required|max:255',
            'horaEntrada' => 'required|max:255',
            'horaSortida' => 'required|max:255',
        ]);
        Usuari::whereId($id)->update($dades);
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
        $usuari = Usuari::findOrFail($id);
        $usuari->delete();
        return redirect('/usuaris')->with('completed', 'Usuari esborrat');
    }
}
