@extends('layouts.app')

@section('content')

<h3>{{ __('book.Book vacationhouse - Step 2') }}</h3>
    {!! Form::open(['action' => 'BookHousesController@postStep2', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-2 label">{{Form::label('huistype', __('book.Vacationhouse type'))}}</div>
            <div class="col-md-4">
                {{Form::select('huistype', $houses, $bookingData['huistype'], ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('aankomst', __('book.Date of arrival'))}}</div>
            <div class="col-md-4">{{Form::text('aankomst', $bookingData['aankomst'], ['class' => 'form-control date', 'placeholder' => __('book.mm-dd-YYYY')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('vertrek', __('book.Date of departure'))}}</div>
             <div class="col-md-4">{{Form::text('vertrek', $bookingData['vertrek'], ['class' => 'form-control date', 'placeholder' => __('book.mm-dd-YYYY')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('volwassenen', __('book.Amount of adults'))}}</div>
            <div class="col-md-4">{{Form::text('volwassenen', $bookingData['volwassenen'], ['class' => 'form-control'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kinderen', __('book.Amount of children from 1 year old'))}}</div>
            <div class="col-md-4">{{Form::text('kinderen', $bookingData['kinderen'], ['class' => 'form-control'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('babys', __('book.Amount of baby\'s'))}}</div>
            <div class="col-md-4">{{Form::text('babys', $bookingData['babys'], ['class' => 'form-control'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5 label">{{ Form::checkbox('privacystatement', null, $bookingData['privacystatement']) }} {{Form::label('privacystatement', __('book.I have read the privacystatement and agree'))}}</div>
        </div>

        <a href="/book/step1" class="btn btn-outline-secondary" role="button">{{ __('book.Previous') }}</a>
        {{Form::submit(__('book.Next'), ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


@endsection
