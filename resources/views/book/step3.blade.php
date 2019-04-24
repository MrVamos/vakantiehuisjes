@extends('layouts.app')

@section('content')
    <h3>{{ __('book.Book vacationhouse - Step 3') }}</h3>
    <p><strong>{{ __('book.Check your booking:')}}</strong></p>
    {!! Form::open(['action' => 'BookHousesController@postStep3', 'method' => 'POST']) !!}

        <div class="row">
                <div class="col-md-2">&nbsp;</div>
        <div class="col-md-4">{{ __('book.Personal data:') }}</div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('voornaam', __('book.Firstname'))}}</div>
            <div class="col-md-4">{{Form::text('voornaam', $customerData['voornaam'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('achternaam', __('book.Surname'))}}</div>
            <div class="col-md-4">{{Form::text('achternaam', $customerData['achternaam'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', __('book.E-mail Address'))}}</div>
            <div class="col-md-4">{{Form::text('email', $customerData['email'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kaartnummer', __('book.Cardnumber'))}}</div>
             <div class="col-md-4">{{Form::text('kaartnummer', $customerData['kaartnummer'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postcode', __('book.Postal Code'))}}</div>
            <div class="col-md-4">{{Form::text('postcode', $customerData['postcode'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('straatnaam', __('book.Streetname'))}}</div>
            <div class="col-md-4">{{Form::text('straatnaam', $customerData['straatnaam'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huisnummer', __('book.Housenumber'))}}</div>
            <div class="col-md-4">{{Form::text('huisnummer', $customerData['huisnummer'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('plaats', __('book.City'))}}</div>
            <div class="col-md-4">{{Form::text('plaats', $customerData['plaats'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>
        <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">{{ __('book.Booking data:') }}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huistype', __('book.Vacationhouse type'))}}</div>
            <div class="col-md-4">
                {{Form::select('huistype', $houses, $bookingData['huistype'], ['class' => 'form-control','disabled'=>'disabled'])}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('aankomst', __('book.Date of arrival'))}}</div>
            <div class="col-md-4">{{Form::text('aankomst', $bookingData['aankomst'], ['class' => 'form-control date', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('vertrek', __('book.Date of departure'))}}</div>
             <div class="col-md-4">{{Form::text('vertrek', $bookingData['vertrek'], ['class' => 'form-control date', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('volwassenen', __('book.Amount of adults'))}}</div>
            <div class="col-md-4">{{Form::text('volwassenen', $bookingData['volwassenen'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kinderen', __('book.Amount of children from 1 year old'))}}</div>
            <div class="col-md-4">{{Form::text('kinderen', $bookingData['kinderen'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('babys', __('book.Amount of baby\'s'))}}</div>
            <div class="col-md-4">{{Form::text('babys', $bookingData['babys'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>
        <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">{{ __('book.Costs:') }}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('dagen', __('book.Amount of days'))}}</div>
            <div class="col-md-4">
                    {{Form::text('dagen', $days, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('prijsPerDag', __('book.Price per day'))}}</div>
            <div class="col-md-4">
                {{Form::text('prijsPerDag', '€ '.$price, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('prijs', __('book.Total price'))}}</div>
            <div class="col-md-4">
                    {{Form::text('prijs', '€ '.$price * $days, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>

        <a href="/book/step1" class="btn btn-outline-secondary" role="button">{{ __('book.Step 1') }}</a>
        <a href="/book/step2" class="btn btn-outline-secondary" role="button">{{ __('book.Step 2') }}</a>
        {{Form::submit('Bevestig', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


@stop
