<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Laravel quicktask</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <!-- CSS And JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    </head>
    <body>
        <div class="mt-3">
            <div class="text-center">
                {{ trans('message.selectlang') }}
                <a href="{!! route('user.change-language', ['en']) !!}"><img src = {{ asset('images/eng.png') }} width = "25px" height = "25px"></a>
                <a href="{!! route('user.change-language', ['vi']) !!}"><img src = {{ asset('images/vi.png') }} width = "25px" height = "25px"></a>
                {{-- {{ $lang }} --}}
            </div>
        </div>
        @yield('content')        
    </body>
</html>
