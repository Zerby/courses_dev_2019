<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Preview Film</title>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a href="/3a_alt_crud_laravel-master/public/afficher-films">Films</a>

    </nav>

        <h1>Preview Film</h1>

        <a class="btn btn-primary" href="afficher-formulaire-film" role="button">Add</a>

        <ul class="list-group list-group-flush">
            @foreach($movie as $row)
            <li class="list-group-item">Title : {{ $row['title'] }}</li>
            <li class="list-group-item">Genre : {{ $row['genre'] }}</li>
            <li class="list-group-item">Director : {{ $row['Director'] }}</li>
            <li class="list-group-item">Producer : {{ $row['producer'] }}</li>
            <li class="list-group-item">Synopsis : {{ $row['synopsis'] }}</li>
            <li class="list-group-item">release date : {{ $row['release_date'] }}</li>
            <li><a href="modifier-film/{{$row['id']}}">Edit</a>
                <a href="delete/{{$row['id']}}">Delete</a>
            @endforeach
        </ul>

    </body>
</html>
