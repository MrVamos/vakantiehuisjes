<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('inc.header')

    <body>
        <div id="app">

            @include('inc.navbar')

            <div class="container py-4">
                @include('inc.messages')
                @yield('content')
            </div>
        </div>

        <!-- scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
