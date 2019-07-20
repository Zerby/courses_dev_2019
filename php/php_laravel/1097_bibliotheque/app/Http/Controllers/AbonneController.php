<?php

namespace App\Http\Controllers;

use App\Abonne;
use Illuminate\Http\Request;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abonnes = Abonne::all();

        return view('abonnes.index', compact('abonnes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abonnes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['prenom' => 'required|string|max:25']);

        $abonne = new Abonne(['prenom' => $request->get('prenom')]);
        $abonne->save();
        return redirect('/abonnes')->with('success', 'Abonné enregistré !');
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
        $abonne = Abonne::find($id);
        return view('abonnes.edit', compact('abonne'));
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
        $request->validate(['prenom' => 'required|string|max:25']);

        $abonne = Abonne::find($id);
        $abonne->prenom = $request->get('prenom');
        $abonne->save();
        return redirect('/abonnes')->with('success', 'Abonné mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $abonne = Abonne::find($id);
        $abonne->delete();

        return redirect('/abonnes')->with('success', 'Abonné supprimé !');
    }
}
