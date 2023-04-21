@extends('layouts.app')

@section('content')

<h1 class="stripeh1">Récapitulatif de comande</h1>
    <div class="stripe">
        <h2 class="stripeh2">Récapitulatif du panier</h2>
        @include('includes.recapPanier')
    </div>
    <div class="stripe">
        <h2 class="stripeh2">Récapitulatif de livraison</h2>
        <p>Votre commande sera livrée à l'adresse suivante : {{$user->address}}</p>
    </div>

    <form action="{{route('stripe.store')}}" method="POST">
    @csrf
    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{config('stripe.public_key')}}"
        data-amount={{round(\Cart::getTotal(),2) * 100}}
        data-name="{{config('app.name')}}"
        data-description="Vente de bijoux en ligne"
        data-image=""
        data-locale="auto"
        data-currency="eur"
        data-label="Payer par carte">
        </script>
    </form>
    <script src="https://checkout.stripe.com/checkout.js"></script>

@endsection