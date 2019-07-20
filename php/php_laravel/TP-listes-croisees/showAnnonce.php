<?php 
require_once 'functions.php';

$pdo = connexion();

$req = $pdo->prepare('SELECT * FROM annonce WHERE id_modele = ?');
$req->execute(array($_GET['modele']));
$annonces = $req->fetchAll();
if($annonces) {
	?>
	<table class="table table-hover">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Titre</th>
	      <th scope="col">Prix</th>
	    </tr>
	  </thead>
	  <tbody>
	<?php 
	foreach ($annonces as $annonce) :
	?>
		<tr>
			<td><?php echo $annonce->id_annonce;?></td>
			<td><?php echo $annonce->titre;?></td>
			<td><?php echo $annonce->prix;?>€</td>
		</tr>
	<?php 
	endforeach;
	?>
		</tbody>
	</table>
	<?php 
} else {
	echo '<div class="alert alert-danger">Aucune annonce enregistrée pour ce modèle.</div>';
}