@extends('layouts.app')

@section('content')

    <div class="flash">
        @include('flash::message')
    </div>

    @auth
        @if(Auth::user()->admin == true)
            <div>
                <a href="{{route('article.edit', ['article' => $article->id])}}" class="button">{{ __('Modify article') }}</a>
                {!! Form::open(['route' => ['article.destroy',$article->id ]] ) !!}
                @method('DELETE')
                {!! Form::submit("Supprimer l'article", ['class' => 'button']) !!}
                {!! Form::close() !!}
            </div>
        @endif
    @endauth

    <div class="articlesingle">
        <h1>{{$article->name}}</h1>
        <p>{{$article->description}}</p>
        <img src="{{asset('asset/img/articles/'.$article->section->name.'/'.$article->picture)}}" alt="Photo de {{$article->name}}">
        <p><strong>{{$article->price}} €</strong></p>
        <ul><u>Détail du produit</u>
            <li>Genre : {{$article->genre->name}}</li>
            <li>Matière : {{$article->substance->name}}</li>
            <li>Couleur du métal : {{$article->color->name}}</li>
        </ul>
        @if($stock === 'Disponible')
            <p class="stockdispo">{{$stock}}</p>
            <a href="{{route('panier.add', ['id' => $article->id])}}" class="button">{{ __('Add to cart') }}</a>
        @else
            <p class="stockindispo">{{$stock}}</p>
        @endif
        
        <a href="{{ route('section.show', ['id' => $article->section_id ])}}" class="button">{{ __('Return') }}</a>
    </div>

@endsection