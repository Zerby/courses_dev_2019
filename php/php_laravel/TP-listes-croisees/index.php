<?php 
require_once 'functions.php';
$pdo = Connexion();
$req = $pdo->query('SELECT * FROM marque');
$marques = $req->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listes croisées</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container-fluid">
    <h1>La Centrale</h1><br>
    <form action="#" method="POST" id="form">
    	<div class="row">
    		<div class="col">
    			<select id="marque" class="col form-control">
		        	<option selected disabled="disabled">Marque</option>
		            <?php foreach ($marques as $marque) : ?>
		            <option value="<?php echo $marque->id_marque;?>"><?php echo $marque->name;?></option>
		        	<?php endforeach;?>
		        </select>
    		</div>
	    	
    		<div class="col">
		        <select id="modele" class="col form-control">
		            <option selected disabled="disabled">Modèle</option>
		        </select>
		    </div>

		    <div class="col">
	        	<button id="rechercher" class="btn btn-primary" disabled="disabled">Rechercher</button>
	        </div>
    	</div>
	</form>

    <hr><br>

    <div id="resultat"></div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready( function (){
            $("#marque").change( function() {
                $('#modele').load("showModele.php?action="+$("#marque").val());
                $('#rechercher').attr('disabled', false);
            });
            $('#rechercher').click(function(e){
            	e.preventDefault();
                $('#resultat').load("showAnnonce.php?modele="+$("#modele").val());
            });
        });
    </script>
</body>
</html>