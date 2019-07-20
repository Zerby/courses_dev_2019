<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
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
            'content' => 'required | string',
            'author' => 'required | string | max:60',
            'image' => 'required | string',
            'type' => 'required | in:action,drama,comic,adventure',
        ]);

        $article = new Article([
        'title' => $request->get('title'),
        'content' => $request->get('content'),
        'author' => $request->get('author'),
        'image' => $request->get('image'),
        'type' => $request->get('type')
        ]);
        $article->save();
        return redirect('/articles')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);

        return view('articles.edit', compact('article'));
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
            'content' => 'required | string',
            'author' => 'required | string | max:60',
            'image' => 'nullable | string',
            'type' => 'required | in:action,drama,comic,adventure',
        ]);

        $article = Article::find($id);
        $article ->title = $request->get('title');
        $article ->content = $request->get('content');
        $article ->author = $request->get('author');
        $article ->image = $request->get('image');
        $article ->type = $request->get('type');
        $article ->save();

        return redirect('/articles')->with('success', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/articles')->with('success', 'Article has been deleted Successfully');
    }
}
