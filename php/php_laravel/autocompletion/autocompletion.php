<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form>
    <input type="text" id="recherche" />
</form>

<script
    src="https://code.jquery.com/jquery-3.3.0.min.js"
    integrity="sha256-RTQy8VOmNlT6b2PIRur37p6JEBZUE7o8wPgMvu18MC4="
    crossorigin="anonymous">
    $('#recherche').autocomplete({
        source : 'liste.php'
    });
</script>

</body>
</html>