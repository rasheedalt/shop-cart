<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       <!-- CSRF Token -->
       <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>


                <!-- SCRIPTS -->
        <!-- Bootstrap core CSS -->
        <link href="css/app.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- font-awesome icons -->
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">


        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>

        <script src="{{ asset(mix('js/app.js')) }}" defer></script>
    </head>
    <body>
    <div id="app">
            <App />
       </div>
    </body>
</html>
