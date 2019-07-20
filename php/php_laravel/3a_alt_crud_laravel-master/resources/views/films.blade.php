<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Films</title>
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

        <h1>Films</h1>

        <a class="btn btn-primary" href="afficher-formulaire-film" role="button">Add</a>

        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">title</th>
                <th scope="col">genre</th>
                <th scope="col">Director</th>
                <th scope="col">release date</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Preview</th>
            </tr>
            </thead>
            @foreach($movies as $row)
            <tbody>
            <tr>
                <th>{{ $row['title'] }}</th>
                <td>{{ $row['genre'] }}</td>
                <td>{{ $row['Director'] }}</td>
                <td>{{ $row['release_date'] }}</td>
                <td><a href="modifier-film/{{$row['id']}}">Edit</a></td>
                <td><a href="delete/{{$row['id']}}">Delete</a></td>
                <td><a href="preview-film/{{$row['id']}}">Preview</a></td>
            </tr>
            </tbody>
            @endforeach
        </table>
    </body>
</html>
