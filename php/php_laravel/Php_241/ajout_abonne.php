<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 28/03/2018
 * Time: 09:17
 */

// 1 connexion BDD
require_once('init.inc.php');

if(!empty($_GET['delete']) && is_numeric($_GET['delete'])) {
    // je prepare la requete
    $delete = $pdo->prepare('DELETE FROM abonne WHERE id_abonne = :id');

// j'indique a PDO, que :id correspond a $_GET['delete'], il va assainir le $_GET en s'assurant que c'est bien un INTEGER et rien d'autre.
    $delete->bindValue(':id', $_GET['delete'], PDO::PARAM_INT);

// j'execute la requete
    $delete->execute();
    header('location:affichage.php?id=1.php');
}


// 1 je recupere les infos de mon $_POST

if(isset($_POST['enregistrer']) && !empty($_POST['prenom'])) {

        // 2 je prepare ma requete
        $insert = $pdo->prepare('INSERT INTO abonne(prenom) VALUES(:prenom)');
        // 3 je lie ma variable SQL a ma variable PHP $_POST
        $insert->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        // 4 j'execute ma requete
        $insert->execute();
    } else {
        $msg = '<p class="alert alert-danger">Il faut au moins une lettre</p>';

}

if(!empty($_GET['modif']) && is_numeric($_GET['modif'])) {
    // requete de recuperation des donnees pour affichage
    $getRow = $pdo->prepare('SELECT * FROM abonne WHERE id_abonne = :id');
    $getRow->bindValue(':id', $_GET['modif'], PDO::PARAM_INT);
    $getRow->execute();
    $resultToModify = $getRow->fetch(PDO::FETCH_ASSOC);
}

// cas de modification
if(isset($_POST['modifier'])
    && !empty($_POST['prenom'])
    && !empty($_POST['id_abonne'])
    && is_numeric($_POST['id_abonne'])
) {
    $update = $pdo->prepare('UPDATE abonne SET prenom = :prenom WHERE id_abonne = :id');
    $update->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
    $update->bindValue(':id', $_POST['id_abonne'], PDO::PARAM_INT);
    $update->execute();

    header('location:affichage.php?id=1.php');
    exit();
}


// affichage de la table abonne
$abonne = $pdo->query('SELECT * FROM abonne');
$abonnes = $abonne->fetchAll(PDO::FETCH_ASSOC);

include('include/header.php');
?>

<div class="container">

    <h1><?php if (!empty($resultToModify)) { echo "Modifiaction de l'abonné"; } else {
            echo "Ajout d'un abonné";
        } ?></h1>

    <?php
    if (!empty($_POST['prenom']) && isset($_POST['enregistrer'])) {
        $prenom = $_POST['prenom'];
        $msg = '<p class="alert alert-success">Titre : '.$prenom.'</p>';
        echo $msg;
    } else {
        echo $msg;
    }?>

    <form class="form" action="" method="post">
        <label for="prenom">Prenom</label>
        <br>
        <input
                value="<?= (!empty($resultToModify)) ? $resultToModify['prenom'] : '' ?>"
                class="form-control"
                type="text"
                name="prenom">
        <br>
        <?php if(!empty($resultToModify)) : ?>
            <input type="hidden"
                   name="id_abonne" value="<?= $resultToModify['id_abonne'] ?>">
        <?php endif; ?>
        <button
                name="<?= (!empty($resultToModify)) ? 'modifier' : 'enregistrer' ?>"
                type="submit" class="btn btn-primary" >
            <?= (!empty($resultToModify)) ? 'modifier' : 'enregistrer' ?>
        </button>
    </form>

</div><!-- /.container -->
<?php include('include/footer.php');

