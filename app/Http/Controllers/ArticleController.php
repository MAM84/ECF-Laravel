<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Http\Requests\ArticleRequest;
use Carbon\Carbon;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleRequest $request)
    {
        $article = new Article;
        $article->name = $request->name;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->genre_id = $request->genre;
        $article->substance_id = $request->substance;
        $article->color_id = $request->color;
        $article->section_id = $request->section;
        $article->quantity = $request->quantity;

        $picture = $request->file('picture');
        $nomPicture = Carbon::now()->timestamp.$article->section->name.'.'.$picture->getClientOriginalExtension();
        $article->picture = $nomPicture;
        $article->save();

        //Ajout de l'id à l'intitulé de la photo.
        $nomPicture2 = Carbon::now()->timestamp.$article->section->name.$article->id.'.'.$picture->getClientOriginalExtension();
        $picture->move(public_path('asset/img/articles/'.$article->section->name), $nomPicture2);
        $article->picture = $nomPicture2;
        $article->save();

        flash('La création de "'.$request->name. '" a été effectuée')->success();

        return redirect()->route('article.show', ['article' => $article->id ]);
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
        if($article->quantity > 0){
            $stock = "Disponible";
        }else{
            $stock = "Indisponible";
        }
        return view('articles.show',compact('article', 'stock'));
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
        return view('articles.form',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
        $article->name = $request->name;
        $article->description = $request->description;
        $article->price = $request->price;
        $article->genre_id = $request->genre;
        $article->substance_id = $request->substance;
        $article->color_id = $request->color;
        $article->section_id = $request->section;
        $article->quantity = $request->quantity;

        if($request->file('picture')){
            $picture = $request->file('picture');
            $nomPicture = Carbon::now()->timestamp.$article->section->name.$article->id.'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path('asset/img/articles/'.$article->section->name), $nomPicture);
            $article->picture = $nomPicture;
        }

        $article->save();

        flash('La mise à jour de "'.$request->name. '" a été effectuée')->success();

        return redirect()->route('article.show', ['article' => $article->id ]);
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

        flash("L'article ".'"'.$article->name.'"'." a été supprimé")->success();

        return redirect()->route('section.show', ['id' => $article->section->id]);
        
    }
}
