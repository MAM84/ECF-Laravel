@extends('layouts.app')

@section('content')

    <div class="flash">
        @include('flash::message')
    </div>

    @auth
        @if(Auth::user()->admin == true)
            <a href="{{route('article.create')}}" class="button">{{ __('Create article') }}</a>
        @endif
    @endauth

    <div class="section">
        <h1>{{$section->name}}</h1>
        <img src="{{asset('asset/img/sections/'.$section->picture)}}" alt="Photo du rayon {{$section->name}}">
        <p>Nombres de produit : {{$section->articles()->count()}}</p>
    </div>

    <div class="divarticle">
        @foreach($section->articles()->paginate(5) as $article)
            <article class="article">
                <h2>{{$article->name}}</h2>
                <img src="{{asset('asset/img/articles/'.$section->name.'/'.$article->picture)}}" alt="Photo de {{$article->name}}">
                <p><strong>{{$article->price}} €</strong></p>
                <a href="{{route('article.show', ['article'=>$article->id])}}">{{ __('See product detail') }}</a>
            </article>
        @endforeach
    </div>

    <div class="pagination">
        {{$section->articles()->paginate(5)->links()}}
    </div>

@endsection