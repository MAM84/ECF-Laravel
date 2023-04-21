<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;

// LISTE DE TABLES QUE L'ON SOUHAITE UTILISER

class PanierComposer {
    function compose(View $view) {
        $view->with('panier', \Cart::getContent());
    }
}
