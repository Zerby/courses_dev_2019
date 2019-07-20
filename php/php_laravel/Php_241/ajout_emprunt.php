<?php
// 1 connexion BDD
require_once('init.inc.php');


if(!empty($_GET['delete']) && is_numeric($_GET['delete'])) {
    // je prepare la requete
    $delete = $pdo->prepare('DELETE FROM emprunt WHERE id_emprunt = :id');

// j'indique a PDO, que :id correspond a $_GET['delete'], il va assainir le $_GET en s'assurant que c'est bien un INTEGER et rien d'autre.
    $delete->bindValue(':id', $_GET['delete'], PDO::PARAM_INT);

// j'execute la requete
    $delete->execute();
    header('location:affichage.php?id=3.php');
}


// 1 je recupere les infos de mon $_POST
$msg = '';
if(
    isset($_POST['enregistrer'])
    && !empty($_POST['id_livre'])
    && !empty($_POST['id_abonne'])
    && !empty($_POST['date_sortie'])
) {

    // je verifie si mes 2 champs contiennent au moins une lettre
    if(is_numeric($_POST['id_livre']) && is_numeric($_POST['id_abonne'])){
        // 2 je prepare ma requete
        $insert = $pdo->prepare('INSERT INTO emprunt(id_livre, id_abonne, date_sortie, date_rendu) VALUES(:id_livre, :id_abonne, :date_sortie, :date_rendu)');
        // 3 je lie ma variable SQL a ma variable PHP $_POST
        $insert->bindValue(':id_livre', $_POST['id_livre'], PDO::PARAM_INT);
        $insert->bindValue(':id_abonne', $_POST['id_abonne'], PDO::PARAM_INT);
        $insert->bindValue(':date_sortie', $_POST['date_sortie'], PDO::PARAM_STR);
        $insert->bindValue(':date_rendu', $_POST['date_rendu'], PDO::PARAM_STR);
        // 4 j'execute ma requete
        $insert->execute();
    } else {
        $msg = '<p class="alert alert-danger">Erreur veuillez verifier vos champs</p>';
    }
}

if(!empty($_GET['modif']) && is_numeric($_GET['modif'])) {
    // requete de recuperation des donnees pour affichage
    $getRow = $pdo->prepare('SELECT * FROM emprunt WHERE id_emprunt = :id');
    $getRow->bindValue(':id', $_GET['modif'], PDO::PARAM_INT);
    $getRow->execute();
    $resultToModify = $getRow->fetch(PDO::FETCH_ASSOC);
}

// cas de modification
if(isset($_POST['modifier'])
    && !empty($_POST['id_emprunt'])
    && !empty($_POST['id_livre'])
    && !empty($_POST['id_abonne'])
    && !empty($_POST['date_sortie'])
    && is_numeric($_POST['id_emprunt'])
    && is_numeric($_POST['id_livre'])
    && is_numeric($_POST['id_abonne'])
) {
    $update = $pdo->prepare('UPDATE emprunt SET id_abonne = :id_abonne, id_livre = :id_livre, date_sortie = :date_sortie, date_rendu = :date_rendu WHERE id_emprunt = :id');
    $update->bindValue(':id_abonne', $_POST['id_abonne'], PDO::PARAM_INT);
    $update->bindValue(':id_livre', $_POST['id_livre'], PDO::PARAM_INT);
    $update->bindValue(':date_sortie', $_POST['date_sortie'], PDO::PARAM_STR);

    $date_rendu = (!empty($_POST['date_rendu'])) ? $_POST['date_rendu'] : 'NULL';
    $update->bindValue(':date_rendu', $date_rendu, PDO::PARAM_STR);

    $update->bindValue(':id', $_POST['id_emprunt'], PDO::PARAM_INT);
    $update->execute();

    header('location:affichage.php?id=3.php');
    exit();
}


// affichage de la table emprunt
$emprunt = $pdo->query('SELECT * FROM emprunt');
$emprunts = $emprunt->fetchAll(PDO::FETCH_ASSOC);

// recuperation des prenoms de la table abonne
$abonne = $pdo->query('SELECT * FROM abonne');
$abonnes = $abonne->fetchAll(PDO::FETCH_ASSOC);

// recuperation des auteurs et titres de la table livre
$livre = $pdo->query('SELECT * FROM livre');
$livres = $livre->fetchAll(PDO::FETCH_ASSOC);

include ('include/header.php');
?>

<div class="container">

    <h1><?php if (!empty($resultToModify)) { echo "Modifiaction de l'emprunt"; } else {
        echo "Ajout d'un emprunt";
        } ?></h1>

    <?php
    if (isset($_POST['enregistrer'])
        && !empty($_POST['id_livre'])
        && !empty($_POST['id_abonne'])
        && !empty($_POST['date_sortie'])) {
        $msg = '<p class="alert alert-success">id_livre : '.$_POST['id_livre'].' id_abonne : '.$_POST['id_abonne'].' date_sortie : '.$_POST['date_sortie'].' date_rendu : '.$_POST['date_rendu'].'</p>';
        echo $msg;
    } else {
        echo $msg = '<p class="alert alert-danger">Erreur veuillez verifier vos champs</p>';
    }?>

    <form class="form" action="" method="post">
        <label for="id_abonne">Abonné</label>
        <select name="id_abonne" class="form-control">
            <?php foreach ($abonnes as $key => $value) : ?>
                <option
                    <?=
                    (!empty($resultToModify)
                        && $resultToModify['id_abonne'] == $value['id_abonne']
                    ) ? 'selected': '' ?>
                    value="<?= $value['id_abonne'] ?>"><?= $value['id_abonne'] ?> - <?= $value['prenom'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="id_livre">Livre</label>
        <select name="id_livre" class="form-control">
            <?php foreach ($livres as $key => $value) : ?>
                <option
                    <?=
                    (!empty($resultToModify)
                        && $resultToModify['id_livre'] == $value['id_livre']
                    ) ? 'selected': '' ?>
                    value="<?= $value['id_livre'] ?>">
                    <?= $value['id_livre'] ?> - <?= $value['auteur'] ?> | <?= $value['titre'] ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="date_sortie">date sortie</label>
        <br>
        <input
            value="<?= (!empty($resultToModify)) ? $resultToModify['date_sortie'] : '' ?>"
            class="form-control"
            type="date"
            name="date_sortie">
        <br>
        <label for="date_rendu">date rendu</label>
        <br>
        <input
            value="<?= (!empty($resultToModify)) ? $resultToModify['date_rendu'] : '' ?>"
            class="form-control"
            type="date"
            name="date_rendu">
        <br>
        <?php if(!empty($resultToModify)) : ?>
            <input type="hidden"
                   name="id_emprunt" value="<?= $resultToModify['id_emprunt'] ?>">
        <?php endif; ?>
        <button
            name="<?= (!empty($resultToModify)) ? 'modifier' : 'enregistrer' ?>"
            type="submit" class="btn btn-primary" >
            <?= (!empty($resultToModify)) ? 'modifier' : 'enregistrer' ?>
        </button>
    </form>

</div><!-- /.container -->
<?php include('include/footer.php');