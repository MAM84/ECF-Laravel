@extends('layouts.app')

@section('content')

<div class="notif">
  @if(isset($notifications) && $notifications->count())
    @foreach($notifications as $notification)
      <ul>
        <li>{{ $notification->type}}</li><br>
        <li>Commande n°{{ $notification->data['id']}}</li><br>
        <li>Total HT {{ $notification->data['totalHT']}} €</li><br>
        <li>TVA {{ $notification->data['tva']}} €</li><br>
        <li>TOTAL TTC {{ $notification->data['totalTTC']}} €</li><br>
      </ul>
    @endforeach
  @endif
</div>

<h1 class="indexh1">{{ config('app.name', 'Laravel') }}</h1>

<ul class="ulindex">
    @foreach($mSections as $mSection)
        <li><a href="{{route('section.show', ['id'=>$mSection->id])}}">{{$mSection->name}} <img src="{{asset('asset/img/sections/'.$mSection->picture)}}" alt="Photo du rayon {{$mSection->name}}"></a></li>
    @endforeach
</ul>

@endsection