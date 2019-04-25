@extends('layouts.app')


@section('content')
    <div class="jumbotron text-center">
        <div class="row">
            @foreach ($houseInfo as $house)

                <div class="col-md-4">
                    <p>{{ $house->name }}</p>
                    <p><img width="250px" src="/images/houses/{{ $house->image }}"></p>
                    <p>
                        {{ __('book.Max persons:') }} {{ $house->max_persons }}<br>
                        {{ __('book.Price per day:') }} € {{ $house->price }},-
                    </p>

                </div>

            @endforeach
        </div>



        <div class="row"><div class="col-md-9">&nbsp;</div></div>

        <div class="row">
            <div class="col-md-12">
                <h1>{{ __('book.Book vacationhouse') }}</h1>
                <p>
                    <a class="btn btn-primary btn-lg" href="/book/step1" role="button">{{ __('book.Book') }}</a>
                </p>
            </div>
        </div>

    </div>
@endsection
