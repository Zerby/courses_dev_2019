<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 05/03/2018
 * Time: 22:02
 */
//require ('controle-de-session.php');
// on se connecte a la base de donnée.

require_once('connect.php');

if (isset($_POST['submit'])) {

    if (!empty($_POST['nom']) && is_string($_POST['nom']) &&
        !empty($_POST['prenom']) && is_string($_POST['prenom']) &&
        !empty($_POST['email']) && is_string($_POST['email']) &&
        !empty($_POST['password']) && is_string($_POST['password']) &&
        !empty($_POST['tel']) && is_string($_POST['tel']) &&
        !empty($_POST['adresse']) && is_string($_POST['adresse'])
    ) {
        $sql = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `adresse`, `complement_adresse`, `telephone`, `date_inscription`, `niveau_forfait`, `niveau_formation`,`mdp`, `admin`) 
                VALUES (:nom, :prenom, :email, :adresse, :complement_adresse, :tel, NOW(), :niveau_forfait, :niveau_formation, :password, NULL)";

        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':nom', $_POST['nom']);
        $stmt->bindValue(':prenom', $_POST['prenom']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':password', $pass_hache);
        $stmt->bindValue(':tel', $_POST['tel']);
        $stmt->bindValue(':adresse', $_POST['adresse']);
        $stmt->bindValue(':complement_adresse', $_POST['complement_adresse']);
        $stmt->bindValue(':niveau_forfait', $_POST['niveau_forfait']);
        $stmt->bindValue(':niveau_formation', $_POST['niveau_formation']);
        $stmt->execute();
        //var_dump($_POST); 

        if ($_POST['niveau_forfait'] === "12" ) {
            header('location:OnSign_pay/abonnement_annuel.php');
        } elseif ($_POST['niveau_forfait'] === "6" ) {
            header('location:OnSign_pay/abonnement_six_mois.php');
        } elseif ($_POST['niveau_forfait'] === "3" ) {
            header('location:OnSign_pay/abonnement_trois_mois.php');
        } else {
            echo "Une erreur s'est proudite, merci de bien vouloir ressayer plus tard.";
        }

    }
} else {
    echo "Veuillez remplir tous les champs correctement.";
}



