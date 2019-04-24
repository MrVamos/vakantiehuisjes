@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                    {{-- Laravel Form instead of HTML --}}
                    {!! Form::open(['action' => 'Auth\RegisterController@register', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="col-md-6"><h3>Vakantiehuisje boeken - Stap 1</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('voornaam', 'Voornaam:')}}</div>
                        <div class="col-md-4">{{Form::text('voornaam', '', ['class' => 'form-control', 'placeholder' => 'Voornaam'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('achternaam', 'Achternaam:')}}</div>
                        <div class="col-md-4">{{Form::text('achternaam', '', ['class' => 'form-control', 'placeholder' => 'Achternaam'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('email', 'E-mail:')}}</div>
                        <div class="col-md-4">{{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'E-mail'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('wachtwoord', 'Wachtwoord:')}}</label></div>

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
                            <div class="col-md-2 label">{{Form::label('wachtwoord-confirm', 'Wachtwoord bevestiging:')}}</div>

                        <div class="col-md-4">
                            {{Form::password('wachtwoord-conform', ['class' => 'form-control', 'name' => 'wachtwoord-confirm', 'autocomplete' => 'new-password'])}}
                            {{-- <input id="wachtwoord-confirm" type="password" class="form-control" name="wachtwoord_confirmation" required autocomplete="new-password"> --}}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('kaartnummer', 'ID kaartnummer hoofdboeker:')}}</div>
                         <div class="col-md-4">{{Form::text('kaartnummer', '', ['class' => 'form-control', 'placeholder' => '#########'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('postcode', 'Postcode:')}}</div>
                        <div class="col-md-4">{{Form::text('postcode', '', ['class' => 'form-control', 'placeholder' => 'Postcode'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('straatnaam', 'Straatnaam:')}}</div>
                        <div class="col-md-4">{{Form::text('straatnaam', '', ['class' => 'form-control', 'placeholder' => 'Straatnaam'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('huisnummer', 'Huisnummer:')}}</div>
                        <div class="col-md-4">{{Form::text('huisnummer', '', ['class' => 'form-control', 'placeholder' => 'Huisnummer'])}}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-2 label">{{Form::label('plaats', 'Plaats:')}}</div>
                        <div class="col-md-4">{{Form::text('plaats', '', ['class' => 'form-control', 'placeholder' => 'Plaats'])}}</div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{Form::submit('Registreren', ['class' => 'btn btn-primary'])}}
                        </div>
                    </div>
                {!! Form::close() !!}




















{{--


                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="wachtwoord" type="password" class="form-control @error('wachtwoord') is-invalid @enderror" name="wachtwoord" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="wachtwoord-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="wachtwoord-confirm" type="password" class="form-control" name="wachtwoord_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> --}}







                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
