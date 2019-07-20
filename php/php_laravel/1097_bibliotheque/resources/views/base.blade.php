<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1097 - Partiel Bibliothèque</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="bg-white">


<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="margin-bottom: 25px">
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto container">
        <li>
            <h2 class="text-white">1097 </h2>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('abonnes.index')}}">Abonnés</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('livres.index')}}">Livres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('emprunts.index')}}">Emprunts</a>
        </li>
    </ul>
</div>
</nav>

<div class="container">
    @yield('main')
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
