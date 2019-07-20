<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 05/03/2018
 * Time: 22:02
 */
//require ('controle-de-session.php');
// on se connecte a la base de donnée.
$title = "Onsign"; // titre de la page
$titre = "Compte";
$description = "écrire la meta description de la page"; // métadescription de la page
$main_color = "white"; // background_color du main

require_once('connect.php');
include('../include/header_back.php');

if (isset($_POST['submit'])) {

    if (!empty($_POST['nom']) && is_string($_POST['nom']) &&
        !empty($_POST['prenom']) && is_string($_POST['prenom']) &&
        !empty($_POST['mail']) && is_string($_POST['mail']) &&
        !empty($_POST['mdp']) && is_string($_POST['mdp']) &&
        !empty($_POST['tel']) && is_string($_POST['tel']) &&
        !empty($_POST['adresse']) && is_string($_POST['adresse'])
    ) {
        $sql = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `adresse`, `complement_adresse`, `telephone`, `date_inscription`, `niveau_forfait`, `niveau_formation`,`mdp`, `admin`) 
                VALUES (:nom, :prenom, :mail, :adresse, :complement_adresse, :tel, NOW(), :niveau_forfait, :niveau_formation, :mdp, NULL)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nom', $_POST['nom']);
        $stmt->bindValue(':prenom', $_POST['prenom']);
        $stmt->bindValue(':mail', $_POST['mail']);
        $stmt->bindValue(':tel', $_POST['tel']);
        $stmt->bindValue(':adresse', $_POST['adresse']);
        $stmt->bindValue(':complement_adresse', $_POST['complement_adresse']);
        $stmt->bindValue(':mdp', $_POST['mdp']);
        $stmt->bindValue(':niveau_forfait', $_POST['niveau_forfait']);
        $stmt->bindValue(':niveau_formation', $_POST['niveau_formation']);
        $stmt->execute();
        //var_dump($_POST);
        header('location: back_users.php');
} } ?>
<section class="white">
    <div class="container">
        <div class="row padding">
            <h2 class="center-align blue-text">Ajouter un Compte</h2>
        </div>

        <form class="" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">

            <div class="row">
                <label for="nom" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Nom</label>
                <input type="text" name="nom" title="nom" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="prenom" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Prénom</label>
                <input type="text" name="prenom" title="prenom" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="mail" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Mail</label>
                <input type="mail" name="mail" title="mail" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="mdp" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Mot de Passe</label>
                <input type="text" name="mdp" title="mdp" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="adresse" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Adresse</label>
                <input type="text" name="adresse" title="adresse" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="complement_adresse" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Complement Adresse</label>
                <input type="text" name="complement_adresse" title="complement_adresse" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="tel" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Telephone</label>
                <input type="tel" name="tel" title="tel" class="browser-default col s10 offset-s1 m7 l7">
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



