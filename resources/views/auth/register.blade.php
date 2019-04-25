@extends('layouts.app')

@section('content')

    {{-- Laravel Form --}}
    {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
        <div class="row">
            <div class="col-md-6"><h3>{{ __('auth.Register') }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2 label">{{Form::label('firstname', __('auth.Firstname'))}}</div>
            <div class="col-md-4">{{Form::text('firstname', '', ['class' => 'form-control', 'placeholder' => __('auth.Firstname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('surname', __('auth.Surname'))}}</div>
            <div class="col-md-4">{{Form::text('surname', '', ['class' => 'form-control', 'placeholder' => __('auth.Surname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('email', __('auth.E-mail Address'))}}</div>
            <div class="col-md-4">{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => __('auth.E-mail Address')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('password', __('auth.Password'))}}</label></div>

            <div class="col-md-4">
                {{Form::password('password', ['class' => 'form-control', 'name' => 'password'])}}

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class=" row">
            <div class="col-md-2 label">{{Form::label('password-confirm', __('auth.Password Confirmation'))}}</div>
            <div class="col-md-4">
                {{Form::password('password-confirm', ['class' => 'form-control', 'name' => 'password_confirmation', 'autocomplete' => 'new-password', 'type' => 'password', 'required' => 'required'])}}
            </div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('cardnumber', __('auth.Cardnumber'))}}</div>
                <div class="col-md-4">{{Form::text('cardnumber', '', ['class' => 'form-control', 'placeholder' => '#########'])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('postal_code', __('auth.Postal Code'))}}</div>
            <div class="col-md-4">{{Form::text('postal_code', '', ['class' => 'form-control', 'placeholder' => __('auth.Postal Code')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('streetname', __('auth.Streetname'))}}</div>
            <div class="col-md-4">{{Form::text('streetname', '', ['class' => 'form-control', 'placeholder' => __('auth.Streetname')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('housenumber', __('auth.Housenumber'))}}</div>
            <div class="col-md-4">{{Form::text('housenumber', '', ['class' => 'form-control', 'placeholder' => __('auth.Housenumber')])}}</div>
        </div>

        <div class="row">
            <div class="col-md-2 label">{{Form::label('city', __('auth.City'))}}</div>
            <div class="col-md-4">{{Form::text('city', '', ['class' => 'form-control', 'placeholder' =>  __('auth.City')])}}</div>
        </div>
        <div class="row">
            <div class="col-md-6">
                {{Form::submit(__('auth.Register'), ['class' => 'btn btn-primary'])}}
            </div>
        </div>
    {!! Form::close() !!}

@endsection
