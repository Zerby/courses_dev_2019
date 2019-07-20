<?php

namespace App\Http\Controllers;

use App\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();

        return view('livres.index', compact('livres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            ['auteur' => 'required|string|max:25'],
            ['titre' => 'required|string|max:50']
        );

        $livre = new Livre([
            'auteur' => $request->get('auteur'),
            'titre' => $request->get('titre')
        ]);
        $livre->save();
        return redirect('/livres')->with('success', 'Livre enregistré !');
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
        $livre = Livre::find($id);
        return view('livres.edit', compact('livre'));
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

        $request->validate(
            ['auteur' => 'required|string|max:25'],
            ['titre' => 'required|string|max:50']
        );

        $livre = Livre::find($id);
        $livre->auteur = $request->get('auteur');
        $livre->titre = $request->get('titre');
        $livre->save();
        return redirect('/livres')->with('success', 'Livre mise à jour !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $livre = Livre::find($id);
        $livre->delete();

        return redirect('/livres')->with('success', 'Livre supprimé !');
    }
}
