@extends('layouts.app')

@section('content')
    <h3>Vakantiehuisje boeken - Stap 3</h3>
    <p><strong>Controleer uw gegevens</strong></p>
    {!! Form::open(['action' => 'BookHousesController@postStep3', 'method' => 'POST']) !!}

    <div class="row">
            <div class="col-md-2">&nbsp;</div>
            <div class="col-md-4">Persoonsgegevens:</div>
    </div>
    <div class="row">
            <div class="col-md-2 label">{{Form::label('voornaam', 'Voornaam:')}}</div>
            <div class="col-md-4">{{Form::text('voornaam', $customerData['voornaam'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('achternaam', 'Achternaam:')}}</div>
            <div class="col-md-4">{{Form::text('achternaam', $customerData['achternaam'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', 'E-mail:')}}</div>
            <div class="col-md-4">{{Form::text('email', $customerData['email'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kaartnummer', 'ID kaartnummer hoofdboeker:')}}</div>
             <div class="col-md-4">{{Form::text('kaartnummer', $customerData['kaartnummer'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postcode', 'Postcode:')}}</div>
            <div class="col-md-4">{{Form::text('postcode', $customerData['postcode'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('straatnaam', 'Straatnaam:')}}</div>
            <div class="col-md-4">{{Form::text('straatnaam', $customerData['straatnaam'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huisnummer', 'Huisnummer:')}}</div>
            <div class="col-md-4">{{Form::text('huisnummer', $customerData['huisnummer'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('plaats', 'Plaats:')}}</div>
            <div class="col-md-4">{{Form::text('plaats', $customerData['plaats'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>
        <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">Boeking-informatie:</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huistype', 'Type vakantiehuisje:')}}</div>
            <div class="col-md-4">
                {{Form::select('huistype', $houses, $bookingData['huistype'], ['class' => 'form-control','disabled'=>'disabled'])}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('aankomst', 'Datum aankomst:')}}</div>
            <div class="col-md-4">{{Form::text('aankomst', $bookingData['aankomst'], ['class' => 'form-control date', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('vertrek', 'Datum vertrek:')}}</div>
             <div class="col-md-4">{{Form::text('vertrek', $bookingData['vertrek'], ['class' => 'form-control date', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('volwassenen', 'Aantal volwassenen:')}}</div>
            <div class="col-md-4">{{Form::text('volwassenen', $bookingData['volwassenen'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kinderen', 'Aantal kinderen vanaf 1 jaar:')}}</div>
            <div class="col-md-4">{{Form::text('kinderen', $bookingData['kinderen'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('babys', 'Aantal baby\'s:')}}</div>
            <div class="col-md-4">{{Form::text('babys', $bookingData['babys'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>
        <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">Kosten:</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('dagen', 'Aantal dagen:')}}</div>
            <div class="col-md-4">
                    {{Form::text('dagen', $days, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('prijsPerDag', 'Prijs per dag:')}}</div>
            <div class="col-md-4">
                {{Form::text('prijsPerDag', '€ '.$price, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('prijs', 'Totale prijs:')}}</div>
            <div class="col-md-4">
                    {{Form::text('prijs', '€ '.$price * $days, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>

        <a href="/book/step1" class="btn btn-outline-secondary" role="button">Stap 1</a>
        <a href="/book/step2" class="btn btn-outline-secondary" role="button">Stap 2</a>
        {{Form::submit('Bevestig', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


@stop
