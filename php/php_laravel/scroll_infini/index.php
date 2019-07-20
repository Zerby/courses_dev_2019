<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test scroll</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body class="container-fluid">
  <h1>Contenu</h1>
  <div id="page">
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div><hr>
    <div>Contenu 1</div>
  </div>
  <p class="alert alert-primary">FOOTER</p>
  <p class="alert alert-primary">FOOTER</p>
  <p class="alert alert-primary">FOOTER</p>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script>
    $(document).ready(function(){
      $offset = 1;
      $(window).scroll(function(){
        if($(document).height() - $(window).height() - $(window).scrollTop() < 30){
          $.post(
            "traitement.php",
            {
              offset: $offset
            },
            function(texte){
              $offset+=2;
              $('#page').append(texte);
            },
            'JSON'
          );
        }
        return false;
      });
    });
  </script>
</body>
</html>
