<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ trans('message.title') }}</title>
        <!-- CSS And JavaScript -->
        <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/all.css') }}" type='text/css'>
        <script src="{{ asset('bower_components/js/jquery.js') }}"></script>

    </head>
    <body>
        <div class="mt-3">
            <div class="text-center">
                {{ trans('message.selectlang') }}
                <a href="{{ route('user.change-language', ['en']) }}"><img src = {{ asset('images/eng.png') }} ></a>
                <a href="{{ route('user.change-language', ['vi']) }}"><img src = {{ asset('images/vi.png') }} ></a>
            </div>
        </div>
        @yield('content')        
    </body>
</html>
