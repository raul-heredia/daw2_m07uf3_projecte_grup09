<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ControladorClient extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view('clients/llista', compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients/crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nouClient = $request->validate([
            'passaportClient' => 'required|max:255',
            'nom' => 'required|max:255',
            'cognoms' => 'required|max:255',
            'edat' => 'required|max:255',
            'telefon' => 'required|max:255',
            'direccio' => 'required|max:255',
            'ciutat' => 'required|max:255',
            'pais' => 'required|max:255',
            'email' => 'required|max:255',
            'tipusTarjeta' => 'required|max:255',
            'numTarjeta' => 'required|max:255',
        ]);
        $client = Client::create($nouClient);
        return redirect('/clients')->with('completed', 'Client creat!');
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
        $client = Client::findOrFail($id);
        return view('clients/actualitza', compact('client'));
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
            'passaportClient' => 'required|max:255',
            'nom' => 'required|max:255',
            'cognoms' => 'required|max:255',
            'edat' => 'required|max:255',
            'telefon' => 'required|max:255',
            'direccio' => 'required|max:255',
            'ciutat' => 'required|max:255',
            'pais' => 'required|max:255',
            'email' => 'required|max:255',
            'tipusTarjeta' => 'required|max:255',
            'numTarjeta' => 'required|max:255',
        ]);
        Client::where('passaportClient', $id)->update($dades);
        return redirect('/clients')->with('completed', 'Client actualitzat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/clients')->with('completed', 'Client esborrat');
    }
}
