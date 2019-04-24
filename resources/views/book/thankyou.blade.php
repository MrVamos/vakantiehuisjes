@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>{{ __('book.Thank you for booking') }}</h1>
        <a href="/" class="btn btn-primary btn-lg" role="button">{{ __('book.Home') }}</a>
    </div>
@endsection
