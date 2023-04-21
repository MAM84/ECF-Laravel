<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Mail\MailFromSite;
use Storage;
use App\Order;
use App\Article_order;
use App\User_order;
use App\Notifications\NewOrder;
use App\User;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.index'); //données intervue pour panier et adresse client
    }

    public function store(Request $request)
    {
        try{
            //Paiement
            Stripe::setApiKey(config('stripe.secret_key'));     
            $customer = Customer::create([
                'email' => $request->stripeEmail,
                'source' => $request->stripeToken
            ]);
            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => round(\Cart::getTotal(),2) * 100,
                'currency' => 'eur'
            ]);   
            $error = '';

            //Enregistrement de la réponse du paiement
            Storage::disk('files')->put('paymentResponse'.$request->stripeToken.'.txt', $charge);

            //Création de la commande dans la table Order et ajout de ses principales caractéristiques
            $totalHT = \Cart::getSubTotal();
            $tva = \Cart::getTotal()-\Cart::getSubTotal();
            $totalTTC = \Cart::getTotal();

            $order = new Order;
            $order->totalHT = $totalHT;
            $order->tva = $tva;
            $order->totalTTC =  $totalTTC;
            $order->save();

            //Création de la relation des articles avec la commande dans la table Article_order
            $panier = \Cart::getContent();
            foreach($panier as $article){
                $relationA_O = new Article_order;
                $relationA_O->article_id = $article->id;
                $relationA_O->order_id = $order->id;
                $relationA_O->quantity = $article->quantity;
                $relationA_O->save();
            }

            //Mise à jour du stock
            foreach($panier as $article){
                $baseArticle = $article->model;
                $baseArticle->quantity -= $article->quantity;
                $baseArticle->save();
            }

            //Création de la relation du client avec la commande dans la table User_order
            $relationU_O = new User_order;
            $relationU_O->user_id = auth()->user()->id;
            $relationU_O->order_id = $order->id;
            $relationU_O->save();

            //Envoi d'un mail de confirmation au client
            $message['amount'] = round(\Cart::getTotal(),2);
            $message['subject'] = 'Confirmation de commande';
            $userAddress = auth()->user()->address;
            $message['content'] = "Votre commande a bien été enregistrée pour un montant de ".$message['amount']." €. 
            Votre commande sera livrée à l'adresse suivante : ".$userAddress.",sous un délai de 8 jours.";
            $userEmail = auth()->user()->email;
            \Mail::to($userEmail)->send(new MailFromSite($message));

            //Envoi d'une notification de commande aux administrateurs
            $admins = User::whereAdmin(true)->get();
            foreach($admins as $admin) {
                $admin->notify(new NewOrder($order));
            }

            //Vider le panier
            \Cart::clear();
            
        }    
        catch (Exception $e) {
            $error = $e->getMessage();
            Storage::disk('files')->put('paymentResponse.txt', $error);
        }    

        return view('stripe.confirmation', compact('charge', 'error')); //données intervue pour adresse client
    }
}
