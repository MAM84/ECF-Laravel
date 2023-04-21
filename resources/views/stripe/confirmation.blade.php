@extends('layouts.app')

@section('content')

    @if($charge->statuts = "succeeded")
    <div class=confirmation>
        Votre commande a été validée.<br>
        Un e-mail de confirmation vous a été envoyé à l'adresse suivante : {{$user->email}}.

        @elseif($charge->statuts = "pending")
        Votre paiement est en attente de confirmation.

        @elseif($charge->statuts = "failed")
        Votre paiement a été refusé.
    </div>
    @endif

    <a href="{{route('accueil')}}" class="button">{{ __('Return to home') }}</a>

@endsection