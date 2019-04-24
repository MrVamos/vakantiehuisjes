@extends('layouts.app')

@section('content')

    {{-- Laravel Form --}}
    {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-6"><h3>{{ __('auth.Register') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('voornaam', __('auth.Firstname'))}}</div>
            <div class="col-md-4">{{Form::text('voornaam', '', ['class' => 'form-control', 'placeholder' => __('auth.Firstname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('achternaam', __('auth.Surname'))}}</div>
            <div class="col-md-4">{{Form::text('achternaam', '', ['class' => 'form-control', 'placeholder' => __('auth.Surname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', __('auth.E-mail Address'))}}</div>
            <div class="col-md-4">{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => __('auth.E-mail Address')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('wachtwoord', __('auth.Password'))}}</label></div>

            <div class="col-md-4">
                {{Form::password('wachtwoord', ['class' => 'form-control', 'name' => 'wachtwoord'])}}

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class=" row">
            <div class="col-md-2 label">{{Form::label('wachtwoord-confirm', __('auth.Password Confirmation'))}}</div>
            <div class="col-md-4">
                {{Form::password('wachtwoord-confirm', ['class' => 'form-control', 'name' => 'wachtwoord_confirmation', 'autocomplete' => 'new-password', 'type' => 'password', 'required' => 'required'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('kaartnummer', __('auth.Cardnumber'))}}</div>
                <div class="col-md-4">{{Form::text('kaartnummer', '', ['class' => 'form-control', 'placeholder' => '#########'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postcode', __('auth.Postal Code'))}}</div>
            <div class="col-md-4">{{Form::text('postcode', '', ['class' => 'form-control', 'placeholder' => __('auth.Postal Code')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('straatnaam', __('auth.Streetname'))}}</div>
            <div class="col-md-4">{{Form::text('straatnaam', '', ['class' => 'form-control', 'placeholder' => __('auth.Streetname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('huisnummer', __('auth.Housenumber'))}}</div>
            <div class="col-md-4">{{Form::text('huisnummer', '', ['class' => 'form-control', 'placeholder' => __('auth.Housenumber')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('plaats', __('auth.City'))}}</div>
            <div class="col-md-4">{{Form::text('plaats', '', ['class' => 'form-control', 'placeholder' =>  __('auth.City')])}}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{Form::submit(__('auth.Register'), ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}

@endsection
