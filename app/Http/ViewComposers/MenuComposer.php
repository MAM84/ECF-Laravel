<?php
namespace App\Http\ViewComposers;
use Illuminate\View\View;
// LISTE DE TABLES QUE L'ON SOUHAITE UTILISER
use App\Section;
class MenuComposer {
    function compose(View $view) {
        $view->with('mSections', Section::all());
    }
}