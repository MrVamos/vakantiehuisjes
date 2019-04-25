@extends('layouts.app')

@section('content')

    {!! Form::open(['action' => 'BookHousesController@postStep1', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-6"><h3>{{ __('book.Book vacationhouse') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('firstname', __('book.Firstname'))}}</div>
            <div class="col-md-4">{{Form::text('firstname', $customerData['firstname'], ['class' => 'form-control', 'placeholder' => __('book.Firstname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('surname', __('book.Surname'))}}</div>
            <div class="col-md-4">{{Form::text('surname', $customerData['surname'], ['class' => 'form-control', 'placeholder' => __('book.Surname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', __('book.E-mail Address'))}}</div>
            <div class="col-md-4">{{Form::text('email', $customerData['email'], ['class' => 'form-control', 'placeholder' => __('book.E-mail Address')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('password', __('book.Password'))}}</div>
            <div class="col-md-4">{{Form::password('password', ['class' => 'form-control'])}}</div>
        </div>

        <div class=" row">
            <div class="col-md-2 label">{{Form::label('password-confirm', __('book.Password Confirmation'))}}</div>
            <div class="col-md-4">
                {{Form::password('password-confirm', ['class' => 'form-control', 'name' => 'password_confirmation', 'autocomplete' => 'new-password', 'type' => 'password', 'required' => 'required'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('cardnumber', __('book.Cardnumber'))}}</div>
             <div class="col-md-4">{{Form::text('cardnumber', $customerData['cardnumber'], ['class' => 'form-control', 'placeholder' => '#########'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postal_code', __('book.Postal Code'))}}</div>
            <div class="col-md-4">{{Form::text('postal_code', $customerData['postal_code'], ['class' => 'form-control', 'placeholder' => __('book.Postal Code')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('streetname', __('book.Streetname'))}}</div>
            <div class="col-md-4">{{Form::text('streetname', $customerData['streetname'], ['class' => 'form-control', 'placeholder' => __('book.Streetname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('housenumber', __('book.Housenumber'))}}</div>
            <div class="col-md-4">{{Form::text('housenumber', $customerData['housenumber'], ['class' => 'form-control', 'placeholder' => __('book.Housenumber')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('city', __('book.City'))}}</div>
            <div class="col-md-4">{{Form::text('city', $customerData['city'], ['class' => 'form-control', 'placeholder' => __('book.City')])}}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{Form::submit(__('book.Next'), ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}

@stop
