<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 09/03/2018
 * Time: 09:32
 */
$title = "Onsign - Back end"; // titre de la page
$description = "écrire la meta description de la page"; // métadescription de la page
$main_color = "white";// background_color du main
$titre = "Comptes";

require_once "connect.php";

if(isset($_POST['submit'])){

    $sql = "UPDATE `users` SET `nom`= :nom,`prenom`= :prenom, `mail`= :mail ,`adresse`= :adresse,`complement_adresse`= :complement_adresse,`telephone` = :telephone,`niveau_forfait`= :niveau_forfait, `niveau_formation`= :niveau_formation WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
    $stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
    $stmt->bindValue(':adresse', $_POST['adresse'], PDO::PARAM_STR);
    $stmt->bindValue(':complement_adresse', $_POST['complement_adresse'], PDO::PARAM_STR);
    $stmt->bindValue(':niveau_forfait', $_POST['niveau_forfait'], PDO::PARAM_STR);
    $stmt->bindValue(':niveau_formation', $_POST['niveau_formation'], PDO::PARAM_STR);
    $stmt->bindValue(':telephone', $_POST['telephone'], PDO::PARAM_STR);
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
    if($stmt->errorCode() !== '00000'){
        die($stmt->errorInfo()[2]);
    }
    header('Location: back_users.php');
    die();
}
// si pas d'id dans l'URL, on arrete
if(!isset($_GET['id'])){
    die('L\'id pas spécifiée!');
}
// requete SQL
$sql = "SELECT `id`, `nom`, `prenom`, `mail`, `adresse`, `complement_adresse`, `telephone`, `niveau_forfait`, `niveau_formation` FROM `users` WHERE id = :id";
// prepare
$stmt = $pdo->prepare($sql);
// bind
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
// execute
$stmt->execute();
// gestion des erreurs
if($stmt->errorCode() !== '00000'){
    die($stmt->errorInfo()[2]);
}
// fetch (solo parce que un seul enregistrement renvoyé!)
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// si le row est false, pas de données retournées par la requete
if(false === $row){
    die('L\'id n\'existe pas!');
}
include('../include/header_back.php');
?>

<section class="white">
    <div class="container">
        <div class="row padding">
            <h2 class="center-align blue-text">Modifier un Compte</h2>
        </div>

        <form class="" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

            <div class="row hidden">
                <label for="id" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">id</label>
                <input type="text" name="id" title="id" value="<?=$row['id']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="nom" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Nom</label>
                <input type="text" name="nom" title="nom" value="<?=$row['nom']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="prenom" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Prénom</label>
                <input type="text" name="prenom" title="prenom" value="<?=$row['prenom']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="mail" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Mail</label>
                <input type="mail" name="mail" title="mail" value="<?=$row['mail']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="adresse" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Adresse</label>
                <input type="text" name="adresse" title="adresse" value="<?=$row['adresse']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="complement_adresse" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Complement Adresse</label>
                <input type="text" name="complement_adresse" title="complement_adresse" value="<?=$row['complement_adresse']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="telephone" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Telephone</label>
                <input type="tel" name="telephone" title="telephone" value="<?=$row['telephone']?>" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="niveau_formation" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Niveau Formation</label>
                <select title="niveau_formation" name="niveau_formation" class="browser-default col s10 offset-s1 m7 l7">
                    <option value="A">A</option>
                    <option value="B">B</option>
                </select>
            </div>

            <div class="row">
                <label for="niveau_forfait" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Niveau Forfait</label>
                <select title="niveau_forfait" name="niveau_forfait" class="browser-default col s10 offset-s1 m7 l7">
                    <option value="1">3 mois</option>
                    <option value="2">6 mois</option>
                    <option value="3">12 mois</option>
                </select>
            </div>

            <div class="flex-col-center-sa w-100 h-15">
                <input type="submit" name="submit" value="Envoyer" class="button orange text-white w-40 margin-0">
            </div>
        </form>

    </div>

</section>
<?php include('../include/footer_back.php');?>
