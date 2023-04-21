<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class PanierController extends Controller
{
    public function index(){
        //condition de TVA
        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'TVA 20%',
            'type' => 'tax',
            'target' => 'total',
            'value' => '20%',
        ));

        \Cart::condition($condition);

        return view('panier.index'); //données intervue pour panier
    }

    public function add($id = null){
        if ($id!= null){
            $article = Article::findOrFail($id);

            \Cart::add(array(
                'id' => $article->id,
                'name' => $article->name,
                'price' => $article->priceHT(),
                'quantity' => 1,
                'associatedModel' => $article 
            ));

            flash('Le produit "'.$article->name. '" a bien été ajouté au panier.')->success();

            return redirect()->route('section.show', ['id' => $article->section_id ]);
        }
    }

    public function updatePlus($id){
        if ($id!= null){
            \Cart::update($id, array(
                'quantity' => 1,
            ));
            return redirect()->route('panier.index');
        }
    }

    public function updateMoins($id){
        if ($id!= null){
            \Cart::update($id, array(
                'quantity' => -1,
            ));
            return redirect()->route('panier.index');
        }
    }

    public function remove($id = null){
        if ($id!= null){
            \Cart::remove($id);
            return redirect()->route('panier.index');
        }
    }

    public function destroy(){
        \Cart::clear();
        return redirect()->route('panier.index');
    }
}
