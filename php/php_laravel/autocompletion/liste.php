<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 26/03/2018
 * Time: 19:17
 */

/* veillez bien à vous connecter à votre base de données */
try {
    $pdo = new PDO('mysql:host=localhost; dbname=autocomplet','root','root');
    $pdo->exec('SET NAMES UTF8');
} catch (PDOException $exception) {
    die($exception->getMessage());
}

$term = $_GET['term'];

$requete = $bdd->prepare('SELECT * FROM membres WHERE pseudo LIKE :term'); // j'effectue ma requête SQL grâce au mot-clé LIKE
$requete->execute(array('term' => '%'.$term.'%'));

$array = array(); // on créé le tableau

while($donnee = $requete->fetch()) // on effectue une boucle pour obtenir les données
{
    array_push($array, $donnee['pseudo']); // et on ajoute celles-ci à notre tableau
}

echo json_encode($array); // il n'y a plus qu'à convertir en JSON

?>