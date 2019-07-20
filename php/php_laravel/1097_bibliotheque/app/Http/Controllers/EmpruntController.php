<?php

namespace App\Http\Controllers;

use App\Abonne;
use App\Emprunts;
use App\Livre;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunts::all();

        return view('emprunts.index', compact('emprunts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $abonnes = Abonne::All('id', 'prenom');
        $livres = Livre::All('id', 'titre', 'auteur');

        //dump($abonnes, $livres);
        return view('emprunts.create', compact('abonnes', 'livres'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'abonnes_id'=>'required',
            'livres_id'=>'required',
            'date_sortie'=>'required',
            'date_rendu',
        ]);

        $emprunt = new Emprunts([
            'abonnes_id' => $request->get('abonnes_id'),
            'livres_id' => $request->get('livres_id'),
            'date_sortie' => $request->get('date_sortie'),
            'date_rendu' => $request->get('date_rendu'),
        ]);

        $emprunt->save();
        return redirect('/emprunts')->with('success', 'Emprunt enregistré !');
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
        $emprunt = Emprunts::find($id);
        $abonnes = Abonne::All('id', 'prenom');
        $livres = Livre::All('id', 'titre', 'auteur');

        return view('emprunts.edit', [
            'emprunt' => $emprunt,
            'abonnes' => $abonnes,
            'livres' => $livres
        ]);
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

        $request->validate([
            'abonnes_id'=>'required',
            'livres_id'=>'required',
            'date_sortie'=>'required',
            'date_rendu',
        ]);
        $emprunt = Emprunts::find($id);
        $emprunt->abonnes_id =  $request->get('abonnes_id');
        $emprunt->livres_id =  $request->get('livres_id');
        $emprunt->date_sortie =  $request->get('date_sortie');
        $emprunt->date_rendu =  $request->get('date_rendu');
        $emprunt->save();

        return redirect('/emprunts')->with('success', 'Emprunt mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emprunt = Emprunts::find($id);
        $emprunt->delete();

        return redirect('/emprunts')->with('success', 'Emprunt supprimé !');
    }
}
