<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="/css/app.css" rel="stylesheet">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <meta name="csrf-token" content="{{ csrf_token() }}">



    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content">
            <div id="app">
            <form-component></form-component>
            </div>
            <script type="text/javascript" src="/js/app.js"></script>

            </div>
        </div>
    </body>
</html>
