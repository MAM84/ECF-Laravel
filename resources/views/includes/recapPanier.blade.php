<table class="table">
    <thead>
        <tr>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Total HT</th>
        </tr>
    </thead>
    <tbody>
        @foreach($panier as $article) 
            <tr>
                <td><img src="{{asset('asset/img/articles/'.$article->associatedModel->section->name.'/'.$article->associatedModel->picture)}}" alt="Photo de {{$article->name}}" width="50px" height="50px"/> {{$article->name}}</td>                         
                <td>{{$article->quantity}}</td>
                <td>{{$article->quantity*Round($article->price,2)}} €</>
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