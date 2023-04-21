<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('section/{id}', 'SectionController@show')->name('section.show');
// Route::get('article/{id}', 'ArticleController@show')->name('article.show');
Route::resource('article', 'ArticleController');

Route::prefix('panier')->group(function () {
    Route::get('', 'PanierController@index')->name('panier.index');
    Route::get('/add/{id?}', 'PanierController@add')->name('panier.add');
    Route::get('/remove/{id?}', 'PanierController@remove')->name('panier.remove');
    Route::get('/updatePlus/{id?}', 'PanierController@updatePlus')->name('panier.updatePlus');
    Route::get('/updateMoins/{id?}', 'PanierController@updateMoins')->name('panier.updateMoins');
    Route::get('/destroy', 'PanierController@destroy')->name('panier.destroy');
});

Auth::routes();
Route::group(['middleware' => ['auth']], function() {
    Route::get('stripe', 'StripeController@index')->name('stripe.index');
    Route::post('store', 'StripeController@store')->name('stripe.store');
    Route::resource('user', 'UserController')->except('destroy');
});

Route::get('/', 'AccueilController@index')->name('accueil');
