<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AccueilController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->admin){
            $notifications = Auth::user()->unreadNotifications()->get();
            Auth::user()->unreadNotifications->markAsRead();
            return view('index', compact('notifications'));
        }
        return view('index');
    }
}
