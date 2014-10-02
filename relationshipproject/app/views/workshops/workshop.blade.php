<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        {{ HTML::style('css/bootstrap-theme.css') }}
            <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">

        <style>
            table form {margin-bottom:0;}
            form ul {margin-left: 0; list-style: none;}
            .error { color: red; font-style: italic; }
            body { padding-top: 20px }
        </style>
        <title>Workshops</title>
    </head>

    <body>
        <div class="container">
            @if (Session::has('message'))
            <div class="flash alert">
                <p>{{ Session::get('message') }}</p>
            </div>
            @endif

            @yield('main')
        </div>

        <!-- Scripts are placed here -->
        <!--{{ HTML::script('js/jquery-1.8.3.min.js') }}-->
        {{ HTML::script('http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
    </body>
</html>
