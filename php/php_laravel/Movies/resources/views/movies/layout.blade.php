<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movies & Article</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
<ul class="nav justify-content-end">
    <li class="nav-item">
        <a class="nav-link active" href="articles">Articles</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="movies">Movies</a>
    </li>
</ul>
<div class="container">
    @yield('content')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
