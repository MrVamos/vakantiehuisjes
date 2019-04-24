@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => 'BookHousesController@postStep1', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-6"><h3>Vakantiehuisje boeken - Stap 1</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('voornaam', 'Voornaam:')}}</div>
            <div class="col-md-4">{{Form::text('voornaam', $customerData['voornaam'], ['class' => 'form-control', 'placeholder' => 'Voornaam'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('achternaam', 'Achternaam:')}}</div>
            <div class="col-md-4">{{Form::text('achternaam', $customerData['achternaam'], ['class' => 'form-control', 'placeholder' => 'Achternaam'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kaartnummer', 'ID kaartnummer hoofdboeker:')}}</div>
             <div class="col-md-4">{{Form::text('kaartnummer', $customerData['kaartnummer'], ['class' => 'form-control', 'placeholder' => '#########'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postcode', 'Postcode:')}}</div>
            <div class="col-md-4">{{Form::text('postcode', $customerData['postcode'], ['class' => 'form-control', 'placeholder' => 'Postcode'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('straatnaam', 'Straatnaam:')}}</div>
            <div class="col-md-4">{{Form::text('straatnaam', $customerData['straatnaam'], ['class' => 'form-control', 'placeholder' => 'Straatnaam'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huisnummer', 'Huisnummer:')}}</div>
            <div class="col-md-4">{{Form::text('huisnummer', $customerData['huisnummer'], ['class' => 'form-control', 'placeholder' => 'Huisnummer'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('plaats', 'Plaats:')}}</div>
            <div class="col-md-4">{{Form::text('plaats', $customerData['plaats'], ['class' => 'form-control', 'placeholder' => 'Plaats'])}}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{Form::submit('Volgende', ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}

@stop
