@extends('layouts.app')

@section('content')
    <h3>{{ __('book.Book vacationhouse') }} - {{ __('book.Verification') }}</h3>
    <p><strong>{{ __('book.Check your booking:')}}</strong></p>
    {!! Form::open(['action' => 'BookHousesController@postStep3', 'method' => 'POST']) !!}

        <div class="row">
                <div class="col-md-2">&nbsp;</div>
        <div class="col-md-4">{{ __('book.Personal data:') }}</div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('firstname', __('book.Firstname'))}}</div>
            <div class="col-md-4">{{Form::text('firstname', $customerData['firstname'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('surname', __('book.Surname'))}}</div>
            <div class="col-md-4">{{Form::text('surname', $customerData['surname'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', __('book.E-mail Address'))}}</div>
            <div class="col-md-4">{{Form::text('email', $customerData['email'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('cardnumber', __('book.Cardnumber'))}}</div>
             <div class="col-md-4">{{Form::text('cardnumber', $customerData['cardnumber'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postal_code', __('book.Postal Code'))}}</div>
            <div class="col-md-4">{{Form::text('postal_code', $customerData['postal_code'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('streetname', __('book.Streetname'))}}</div>
            <div class="col-md-4">{{Form::text('streetname', $customerData['streetname'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('housenumber', __('book.Housenumber'))}}</div>
            <div class="col-md-4">{{Form::text('housenumber', $customerData['housenumber'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('city', __('book.City'))}}</div>
            <div class="col-md-4">{{Form::text('city', $customerData['city'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>
        <div class="row">
                <div class="col-md-2">&nbsp;</div>
                <div class="col-md-4">{{ __('book.Booking data:') }}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('housetype', __('book.Vacationhouse type'))}}</div>
            <div class="col-md-4">
                {{Form::select('housetype', $houses, $bookingData['housetype'], ['class' => 'form-control','disabled'=>'disabled'])}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('arrival', __('book.Date of arrival'))}}</div>
            <div class="col-md-4">{{Form::text('arrival', $bookingData['arrival'], ['class' => 'form-control date', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('departure', __('book.Date of departure'))}}</div>
             <div class="col-md-4">{{Form::text('departure', $bookingData['departure'], ['class' => 'form-control date', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('adults', __('book.Amount of adults'))}}</div>
            <div class="col-md-4">{{Form::text('adults', $bookingData['adults'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('children', __('book.Amount of children from 1 year old'))}}</div>
            <div class="col-md-4">{{Form::text('children', $bookingData['children'], ['class' => 'form-control', 'disabled'=>'disabled'])}}</div>
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
                    {{Form::text('days', $days, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('pricePerDay', __('book.Price per day'))}}</div>
            <div class="col-md-4">
                {{Form::text('pricePerDay', '€ '.$price, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('price', __('book.Total price'))}}</div>
            <div class="col-md-4">
                    {{Form::text('price', '€ '.$price * $days, ['class' => 'form-control', 'disabled'=>'disabled'])}}
            </div>
        </div>

        <div class="row">
                <div class="col-md-6">&nbsp;</div>
        </div>
        @guest
            <a href="/book/step1" class="btn btn-outline-secondary" role="button">{{ __('book.Step 1') }}</a>
            <a href="/book/step2" class="btn btn-outline-secondary" role="button">{{ __('book.Step 2') }}</a>
        @else
            <a href="/book/step2" class="btn btn-outline-secondary" role="button">{{ __('book.Previous') }}</a>
        @endguest
        {{Form::submit('Bevestig', ['class' => 'btn btn-primary'])}}

    {!! Form::close() !!}


@stop
