<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Vente en ligne de bijoux">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

     <!-- Scripts -->
     <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link href="{{ asset('asset/css/base.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
    
</head>
<body>
    <header class="containerb">
        <nav class="first-nav">
            <a href="{{route('accueil')}}">{{ config('app.name', 'Laravel') }}</a>
            <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li>
                    <a href="{{ route('login') }}">{{ __('My account') }}</a>
                </li>

            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->firstname }} {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="except" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        </br>
                        <a class="except" href="{{ route('user.show', ['user'=>auth()->user()->id]) }}"
                            onclick="event.preventDefault();
                                            document.getElementById('user-form').submit();">
                            {{ __('See my profil') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <form id="user-form" action="{{ route('user.show', ['user'=>auth()->user()->id]) }}" method="GET" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            </ul>
            <a href="{{route('panier.index')}}">{{ __('Cart') }} ({{\Cart::getTotalQuantity()}})</a>
        </nav>
        <nav class="second-nav">
            <ul>
                @foreach($mSections as $mSection)
                    <li><a href="{{route('section.show', ['id'=>$mSection->id])}}">{{$mSection->name}} </a></li>
                @endforeach
            </ul>
        </nav>
    </header>