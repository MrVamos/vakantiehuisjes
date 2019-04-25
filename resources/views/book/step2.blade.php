@extends('layouts.app')

@section('content')

<h3>{{ __('book.Book vacationhouse') }}</h3>
    {!! Form::open(['action' => 'BookHousesController@postStep2', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-2 label">{{Form::label('housetype', __('book.Vacationhouse type'))}}</div>
            <div class="col-md-4">
                {{Form::select('housetype', $houses, $bookingData['housetype'], ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('arrival', __('book.Date of arrival'))}}</div>
            <div class="col-md-4">{{Form::text('arrival', $bookingData['arrival'], ['class' => 'form-control date', 'placeholder' => __('book.mm-dd-YYYY')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('departure', __('book.Date of departure'))}}</div>
             <div class="col-md-4">{{Form::text('departure', $bookingData['departure'], ['class' => 'form-control date', 'placeholder' => __('book.mm-dd-YYYY')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('adults', __('book.Amount of adults'))}}</div>
            <div class="col-md-4">{{Form::text('adults', $bookingData['adults'], ['class' => 'form-control'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('children', __('book.Amount of children from 1 year old'))}}</div>
            <div class="col-md-4">{{Form::text('children', $bookingData['children'], ['class' => 'form-control'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('babys', __('book.Amount of baby\'s'))}}</div>
            <div class="col-md-4">{{Form::text('babys', $bookingData['babys'], ['class' => 'form-control'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5 label">{{ Form::checkbox('privacystatement', null, $bookingData['privacystatement']) }} {{Form::label('privacystatement', __('book.I have read the privacystatement and agree'))}}</div>
        </div>

        @guest
            <a href="/book/step1" class="btn btn-outline-secondary" role="button">{{ __('book.Previous') }}</a>
        @endguest

        {{Form::submit(__('book.Next'), ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}


@endsection
