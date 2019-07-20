<?php
//  Récupération de l'utilisateur et de son pass hashé
// inclusion du fichier de connexion mysql PDO
require_once "connect.php";
// requete SQL simple, un SELECT
$sql = "SELECT `id`, `prenom`, `mail`, `mdp`, `admin` FROM `users` WHERE mail = :email";
// premiere etape, le prepare
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $_POST['email']);
$stmt->execute();
$resultat = $stmt -> fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    $pass = password_verify($_POST['password'], $resultat['mdp']);
    if ($pass) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['email'] = $resultat['mail'];
        $_SESSION['mdp'] = $resultat['mdp'];
        $_SESSION['admin'] = $resultat['admin'];
        header('location:../fr/dashboard.php');
    } else {
        echo 'Mauvais identifiant ou mot de passe ! aaaaaaa';
    }
}