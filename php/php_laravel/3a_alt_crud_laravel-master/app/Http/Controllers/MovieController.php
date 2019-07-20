<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\Request;
use App\Movie;

class MovieController extends Controller
{

    public function allMovies(){
        $movies = Movie::all()->toArray();
        return view('films', compact('movies'));
    }

    public function oneMovie($id){
        $movie = Movie::all()->where('id', $id);
        return view('preview-film', compact('movie'));
    }

    public function afficherFormulaire()
    {
        return view('formulaire-film');
    }

    public function enregistrerFilm(Request $request)
    {

        // Avant d'enregistrer il faut vérifier les champs

    $request->validate([
       'title' => 'required | string | max:60',
       'synopsis' => 'nullable | string',
       'director' => 'required | string | max:60',
       'producer' => 'required | string | max:60',
       'genre' => 'required | in:action,drama,comic,adventure',
       'release_date' => 'required | date',
       'active' => 'nullable | boolean',
    ]);

        // Enregistrement méthode save

        // dd($request->all());
//        $movie = new Movie();
//        $movie->title = $request ->title;
//        $movie->synopsis = $request ->synopsis;
//        $movie->director = $request ->director;
//        $movie->producer = $request ->producer;
//        $movie->genre = $request ->genre;
//        $movie->release_date = $request ->release_date;
//        $movie->active = $request ->active ?? 0;
//
//        $save = $movie->save();


// ------------------------------ Enregistrement méthode MassAssignement ---------------------------------
        try {
            $data = $request->all();
            $data['active'] = array_key_exists('active', $data) && $data['active'] == 1 ? 1 : 0;
            app(Movie::class)->create($data);
            flash('film enregistré avec succès')->success();
        } catch (MassAssignmentException $e) {
            flash('veuillez contacter l\'admin');
        }

//        if($save) {
//            // indiquer un message de succès
//        } else {
//            // indiquer un message d'erreur
//        }

        return redirect()->route('afficher-films');
    }

    public function afficherFormulaireModification($id){
        $data['movie'] = Movie::find($id);
        return view('formulaire-modification-film', $data);
    }

    public function enregistrerModificationFilm(Request $request, $id){
        $update = Movie::find($id);

        $update->title = $request->get('title');
        $update->genre = $request->get('genre');
        $update->synopsis = $request->get('synopsis');
        $update->Director = $request->get('director');
        $update->producer = $request->get('producer');
        $update->release_date = $request->get('release_date');
        $update->save();

        return redirect('afficher-films');
    }


    public function destroy($id) {

        $delete = Movie::find($id);

        $delete->delete();

        return redirect('afficher-films');

    }
}
