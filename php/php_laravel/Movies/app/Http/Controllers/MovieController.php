<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
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
            'title' => 'required | string | max:60',
            'synopsis' => 'nullable | string',
            'director' => 'required | string | max:60',
            'producer' => 'required | string | max:60',
            'genre' => 'required | in:action,drama,comic,adventure',
            'release_date' => 'required | date',
        ]);
        $movie = new Movie([
            'title' => $request->get('title'),
            'synopsis'=> $request->get('synopsis'),
            'director'=> $request->get('director'),
            'producer'=> $request->get('producer'),
            'genre'=> $request->get('genre'),
            'release_date'=> $request->get('release_date')
        ]);
        $movie->save();
        return redirect('/movies')->with('success', 'Stock has been added');
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
        $movie = Movie::find($id);

        return view('movies.edit', compact('movie'));
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
            'title' => 'required | string | max:60',
            'synopsis' => 'nullable | string',
            'director' => 'required | string | max:60',
            'producer' => 'required | string | max:60',
            'genre' => 'required | in:action,drama,comic,adventure',
            'release_date' => 'required | date',
        ]);

        $movie = Movie::find($id);
        $movie->title = $request->get('title');
        $movie->synopsis = $request->get('synopsis');
        $movie->director = $request->get('director');
        $movie->producer = $request->get('producer');
        $movie->genre = $request->get('genre');
        $movie->release_date = $request->get('release_date');
        $movie->save();

        return redirect('/movies')->with('success', 'Movie has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();

        return redirect('/movies')->with('success', 'Movie has been deleted Successfully');
    }
}
