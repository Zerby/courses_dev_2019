<?php 
require_once 'functions.php';

$pdo = connexion();

$req = $pdo->prepare('SELECT * FROM modele WHERE id_marque = ?');
$req->execute(array($_GET['action']));
$modeles = $req->fetchAll();
foreach ($modeles as $modele) :
?>
	<option value="<?php echo $modele->id_modele;?>"><?php echo $modele->name;?></option>
<?php 
endforeach;