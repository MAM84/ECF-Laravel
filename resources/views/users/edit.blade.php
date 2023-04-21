@extends('layouts.app')

@section('content')
{!! Form::open(['route' => ['user.update', $user->id ]]) !!}
    @method('PUT')
    <div class="row">
        <div class="col s12">
            <div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
                <b>Nom</b>
                {!! Form::text('name', $user->name) !!}
                {!! $errors->first('name', '<small class="error">:message</small>') !!}</>
            </div>
            <div class="form-group {!! $errors->has('firstname') ? 'has-error' : '' !!}">
                <b>Prénom</b>
                {!! Form::text ('firstname', $user->firstname) !!}
                {!! $errors->first('firstname', '<small class="error">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('birthdaydate') ? 'has-error' : '' !!}">
                <b>Date de naissance</b>
                {!! Form::date ('birthdaydate', $user->birthdaydate) !!}
                {!! $errors->first('birthdaydate', '<small class="error">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('phone') ? 'has-error' : '' !!}">
                <b>Téléphone</b>
                {!! Form::text ('phone', $user->phone) !!}
                {!! $errors->first('phone', '<small class="error">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('address') ? 'has-error' : '' !!}">
                <b>Adresse</b>
                {!! Form::text ('address', $user->address) !!}
                {!! $errors->first('address', '<small class="error">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('email') ? 'has-error' : '' !!}">
                <b>Email</b>
                {!! Form::email ('email', $user->email) !!}
                {!! $errors->first('email', '<small class="error">:message</small>') !!}
            </div>
            <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                <b>Mot de passe</b>
                {!! Form::password ('password', null) !!}
                {!! $errors->first('password', '<small class="error">:message</small>') !!}
            </div>

            {!! Form::submit('Modifier',['class' => 'button']) !!}
        
        {!! Form::close() !!}<br>
        <a href="{{ route('user.show', ['user' => auth()->user()->id ])}}" class="button">{{ __('Return') }}</a>
        </div>
    </div>
@endsection





