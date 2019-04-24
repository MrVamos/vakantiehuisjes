@extends('layouts.app')

@section('content')

    <h3>Vakantiehuisje boeken - Stap 2</h3>
    {!! Form::open(['action' => 'BookHousesController@postStep2', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-2 label">{{Form::label('huistype', 'Type vakantiehuisje:')}}</div>
            <div class="col-md-4">
                {{Form::select('huistype', $houses, $bookingData['huistype'], ['class' => 'form-control'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('aankomst', 'Datum aankomst:')}}</div>
            <div class="col-md-4">{{Form::text('aankomst', $bookingData['aankomst'], ['class' => 'form-control date', 'placeholder' => date('d-m-Y', strtotime(date('d-m-Y'). ' + 1 days'))])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('vertrek', 'Datum vertrek:')}}</div>
             <div class="col-md-4">{{Form::text('vertrek', $bookingData['vertrek'], ['class' => 'form-control date', 'placeholder' => date('d-m-Y', strtotime(date('d-m-Y'). ' + 3 days'))])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('volwassenen', 'Aantal volwassenen:')}}</div>
            <div class="col-md-4">{{Form::text('volwassenen', $bookingData['volwassenen'], ['class' => 'form-control', 'placeholder' => 0])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kinderen', 'Aantal kinderen vanaf 1 jaar:')}}</div>
            <div class="col-md-4">{{Form::text('kinderen', $bookingData['kinderen'], ['class' => 'form-control', 'placeholder' => 0])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('babys', 'Aantal baby\'s:')}}</div>
            <div class="col-md-4">{{Form::text('babys', $bookingData['babys'], ['class' => 'form-control', 'placeholder' => 0])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-5 label">{{ Form::checkbox('privacystatement') }} {{Form::label('privacystatement', 'Ik heb de privacystatement gelezen en ga akkoord.')}}</div>
        </div>

        <a href="/book/step1" class="btn btn-outline-secondary" role="button">Vorige</a>
        {{Form::submit('Volgende', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


@endsection
