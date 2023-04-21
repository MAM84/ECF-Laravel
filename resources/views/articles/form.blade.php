@extends('layouts.app')

@section('content')

    @isset($article)
        {!! Form::open(['route' => ['article.update', $article->id ], 'files'=> true ]) !!}
        @method('PUT')
    @else
        {!! Form::open(['route' => 'article.store', 'files'=> true ]) !!}
    @endisset

    <div class="row">    
        <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
            <b>Nom</b>
            {!! Form::text('name', isset($article->name) ? $article->name : null) !!}
            {!! $errors->first('name', '<small class="error">:message</small>') !!}</>
        </div>
        <div class="form-group {!! $errors->has('prenom') ? 'has-error' : '' !!}">
            <b>Description</b>
            {!! Form::text ('description', isset($article->description) ? $article->description : null) !!}
            {!! $errors->first('description', '<small class="error">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('price') ? 'has-error' : '' !!}">
            <b>Prix</b>
            {!! Form::number ('price', isset($article->price) ? $article->price : null) !!}
            {!! $errors->first('price', '<small class="error">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('genre') ? 'has-error' : '' !!}">
            <b>Genre</b>
            {!! Form::select ('genre', array('1' => 'Femme', 
                                            '2' => 'Homme', 
                                            '3' => 'Enfant'), 
                                            isset($article->genre->id) ? $article->genre->id : null) !!}
            {!! $errors->first('genre', '<small class="error">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('substance') ? 'has-error' : '' !!}">
            <b>Matière</b>
            {!! Form::select ('substance', array('1' => 'Argent', 
                                            '2' => 'Or 375/1000 Eme', 
                                            '3' => 'Or 750/1000 Eme',
                                            '4' => 'Plaqué Or', 
                                            '5' => 'Acier', 
                                            '6' => 'Céramique', 
                                            '7' => 'Platine', 
                                            '8' => 'Or Acier', 
                                            '9' => 'Laiton', 
                                            '10' => 'Autre'), 
                                            isset($article->substance->id) ? $article->substance->id : null) !!}
            {!! $errors->first('substance', '<small class="error">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('color') ? 'has-error' : '' !!}">
            <b>Couleur</b>
            {!! Form::select ('color', array('1' => 'Blanc', 
                                            '2' => 'Jaune', 
                                            '3' => 'Rose',
                                            '4' => 'Bicolore', 
                                            '5' => 'Tricolore', 
                                            '6' => 'Jaune/Blanc', 
                                            '7' => 'Blanc/Jaune', 
                                            '8' => 'Noir', 
                                            '9' => 'Rose/Blanc', 
                                            '10' => 'Blanc/Rose',
                                            '11' => 'Gris',
                                            '12' => 'Autres'), 
                                            isset($article->color->id) ? $article->color->id : null) !!}
            {!! $errors->first('color', '<small class="error">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('section') ? 'has-error' : '' !!}">
            <b>Rayon</b>
            {!! Form::select ('section', array('1' => 'Bagues', 
                                            '2' => "Boucles d'oreilles", 
                                            '3' => 'Bracelets',
                                            '4' => 'Colliers'), 
                                            isset($article->section->id) ? $article->section->id : null) !!}
            {!! $errors->first('section', '<small class="error">:message</small>') !!}
        </div>
        <div class="form-group {!! $errors->has('quantity') ? 'has-error' : '' !!}">
            <b>Quantités stock</b>
            {!! Form::number ('quantity', isset($article->quantity) ? $article->quantity : null) !!}
            {!! $errors->first('quantity', '<small class="error">:message</small>') !!}
        </div>

        @isset($article)
            <div class="form-group {!! $errors->has('picture') ? 'has-error' : '' !!}">
                <img src="{{asset('asset/img/articles/'.$article->section->name.'/'.$article->picture)}}">
            </div>
        @endisset

        <div class="form-group {!! $errors->has('picture') ? 'has-error' : '' !!}">
            <b>Photo</b>
            {!! Form::file ('picture', null) !!}
            {!! $errors->first('picture', '<small class="error">:message</small>') !!}
        </div>
        
        @isset($article)
            {!! Form::submit('Modifier',['class' => 'button']) !!}
        @else
            {!! Form::submit('Créer',['class' => 'button']) !!}
        @endisset

        {!! Form::close() !!}<br>

        @isset($article)
            <a href="{{ route('article.show', ['article' => $article->id ])}}" class="button">Retour</a>
        @else
            <a href="{{ route('accueil')}}" class="button">Retour</a>
        @endisset
    </div>
@endsection





