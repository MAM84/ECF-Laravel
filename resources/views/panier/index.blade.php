@extends('layouts.app')

@section('content')

    @if(count($panier)==0)
        <p class="emptycard">Votre panier est vide</p>
    
    @else
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix HT</th>
                        <th>+</th>
                        <th>Quantité</th>
                        <th>-</th>
                        <th>Total HT</th>
                        <th>Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($panier as $article) 
                        <tr>
                            <td><a href="{{route('article.show', ['article'=>$article->id])}}">
                                <img src="{{asset('asset/img/articles/'.$article->associatedModel->section->name.'/'.$article->associatedModel->picture)}}" alt="Photo de {{$article->name}}" width="50px" height="50px"/> {{$article->name}}</a></td>
                            <td>{{Round($article->price,2)}} €</td>
                            <td>@if($article->model->quantity > $article->quantity)<a href="{{route('panier.updatePlus', ['id' => $article->id])}}">+</a>@endif</td>
                            <td>{{$article->quantity}}</td>
                            <td>@if(($article->quantity)>1)<a href="{{route('panier.updateMoins', ['id' => $article->id])}}">-</a>@endif</td>
                            <td>{{$article->quantity*Round($article->price,2)}} €</>
                            <td><a href="{{route('panier.remove', ['id' => $article->id])}}">X</a></td>
                        </tr>
                    @endforeach  
                    <tr>
                        <td><strong>Total HT</strong></td>
                        <td><strong>{{round(\Cart::getSubTotal(),2)}} €</strong></td>
                    </tr>
                    <tr>
                        <td><strong>TVA 20%</strong></td>
                        <td><strong>{{round(\Cart::getTotal()-\Cart::getSubTotal(),2)}} €</strong></td>
                    </tr>
                    <tr>
                        <td><strong>Total TTC</strong></td>
                        <td><strong>{{round(\Cart::getTotal(),2)}} €</strong></td>
                    </tr>
                </tbody>
            </table>
            <a href="{{route('panier.destroy')}}" class="button">{{ __('Clean cart') }}</a>
        </div>	

        <div class="delivery">
            <p>Choix du mode de livraison</p>
            <form id="form" name="form">
                <label for="delivery">A domicile</label>
                <input type="checkbox" id="delivery" name="delivery">  
            </form>
            <p id='message'>Veuillez sélectionner un mode de livraison</p>
            <a href="{{route('stripe.index')}}" hidden id="payButton" class="button">{{ __('Validate cart') }}</a>
        </div>
    @endif

    <!-- Scripts -->
    <script src="{{ asset('asset/js/delivery.js') }}"></script>
    
@endsection

