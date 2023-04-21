@extends('layouts.app')

@section('content')

    <div class="flash">
        @include('flash::message')
    </div>

    <ul class="profil">
        <li><strong><u>Nom</u></strong> : {{$user->name}}</li>
        <li><strong><u>Prénom</u></strong> : {{$user->firstname}}</li>
        <li><strong><u>Date de naissance</u></strong> : {{\Carbon\Carbon::parse($user->birthdaydate)->locale('fr_FR')->isoFormat('L')}}</li>
        <li><strong><u>Téléphone</u></strong> : {{$user->phone}}</li>
        <li><strong><u>Adresse</u></strong> : {{$user->address}}</li>
        <li><strong><u>Email</u></strong> : {{$user->email}}</li>
    </ul> 

    <a href="{{route('user.edit', ['user'=>auth()->user()->id])}}" class="button">{{ __('Modify profil') }}</a></li><br>
    <a href="{{ route('accueil')}}" class="button">{{ __('Return to home') }}</a>

@endsection