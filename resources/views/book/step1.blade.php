@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => 'BookHousesController@postStep1', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-6"><h3>{{ __('book.Book vacationhouse - Step 1') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('voornaam', __('book.Firstname'))}}</div>
            <div class="col-md-4">{{Form::text('voornaam', $customerData['voornaam'], ['class' => 'form-control', 'placeholder' => __('book.Firstname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('achternaam', __('book.Surname'))}}</div>
            <div class="col-md-4">{{Form::text('achternaam', $customerData['achternaam'], ['class' => 'form-control', 'placeholder' => __('book.Surname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', __('book.E-mail Address'))}}</div>
            <div class="col-md-4">{{Form::text('email', $customerData['email'], ['class' => 'form-control', 'placeholder' => __('book.E-mail Address')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('wachtwoord', __('book.Password'))}}</div>
            <div class="col-md-4">{{Form::password('wachtwoord', ['class' => 'form-control'])}}</div>
        </div>

        <div class=" row">
            <div class="col-md-2 label">{{Form::label('wachtwoord-confirm', __('book.Password Confirmation'))}}</div>
            <div class="col-md-4">
                {{Form::password('wachtwoord-confirm', ['class' => 'form-control', 'name' => 'wachtwoord_confirmation', 'autocomplete' => 'new-password', 'type' => 'password', 'required' => 'required'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kaartnummer', __('book.Cardnumber'))}}</div>
             <div class="col-md-4">{{Form::text('kaartnummer', $customerData['kaartnummer'], ['class' => 'form-control', 'placeholder' => '#########'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postcode', __('book.Postal Code'))}}</div>
            <div class="col-md-4">{{Form::text('postcode', $customerData['postcode'], ['class' => 'form-control', 'placeholder' => __('book.Postal Code')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('straatnaam', __('book.Streetname'))}}</div>
            <div class="col-md-4">{{Form::text('straatnaam', $customerData['straatnaam'], ['class' => 'form-control', 'placeholder' => __('book.Streetname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huisnummer', __('book.Housenumber'))}}</div>
            <div class="col-md-4">{{Form::text('huisnummer', $customerData['huisnummer'], ['class' => 'form-control', 'placeholder' => __('book.Housenumber')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('plaats', __('book.City'))}}</div>
            <div class="col-md-4">{{Form::text('plaats', $customerData['plaats'], ['class' => 'form-control', 'placeholder' => __('book.City')])}}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{Form::submit(__('book.Next'), ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}

@stop
