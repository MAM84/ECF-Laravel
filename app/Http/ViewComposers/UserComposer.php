<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;

// LISTE DE TABLES QUE L'ON SOUHAITE UTILISER

class UserComposer {
    function compose(View $view) {
        $view->with('user', auth()->user());
    }
}
