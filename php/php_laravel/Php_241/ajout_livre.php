<?php
// 1 connexion BDD
require_once('init.inc.php');


if(!empty($_GET['delete']) && is_numeric($_GET['delete'])) {
    // je prepare la requete
    $delete = $pdo->prepare('DELETE FROM livre WHERE id_livre = :id');

// j'indique a PDO, que :id correspond a $_GET['delete'], il va assainir le $_GET en s'assurant que c'est bien un INTEGER et rien d'autre.
    $delete->bindValue(':id', $_GET['delete'], PDO::PARAM_INT);

// j'execute la requete
    $delete->execute();
    header('location:affichage.php?id=2.php');
}
$msg = '';
if(isset($_POST['enregistrer']) && !empty($_POST['auteur']) && !empty($_POST['titre'])) {

        // 2 je prepare ma requete
        $insert = $pdo->prepare('INSERT INTO livre(auteur, titre) VALUES(:auteur, :titre)');
        // 3 je lie ma variable SQL a ma variable PHP $_POST
        $insert->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR);
        $insert->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
        // 4 j'execute ma requete
        $insert->execute();

    } else {
        $msg = '<p class="alert alert-danger">Il faut au moins une lettre pour les 2 champs</p>';
    }

if(!empty($_GET['modif']) && is_numeric($_GET['modif'])) {
    // requete de recuperation des donnees pour affichage
    $getRow = $pdo->prepare('SELECT * FROM livre WHERE id_livre = :id');
    $getRow->bindValue(':id', $_GET['modif'], PDO::PARAM_INT);
    $getRow->execute();
    $resultToModify = $getRow->fetch(PDO::FETCH_ASSOC);
}

// cas de modification
if(isset($_POST['modifier'])
    && !empty($_POST['auteur'])
    && !empty($_POST['titre'])
    && !empty($_POST['id_livre'])
    && is_numeric($_POST['id_livre'])
) {
    $update = $pdo->prepare('UPDATE livre SET auteur = :auteur, titre = :titre WHERE id_livre = :id');
    $update->bindValue(':auteur', $_POST['auteur'], PDO::PARAM_STR);
    $update->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
    $update->bindValue(':id', $_POST['id_livre'], PDO::PARAM_INT);
    $update->execute();

    header('location:affichage.php?id=2.php');
    exit();
}


// affichage de la table livre
$livre = $pdo->query('SELECT * FROM livre');
$livres = $livre->fetchAll(PDO::FETCH_ASSOC);

include('include/header.php') ?>

<div class="container">

    <h1><?php if (!empty($resultToModify)) { echo "Modifiaction du livre"; } else {
            echo "Ajout d'un livre";
        } ?></h1>

    <?php if (isset($_POST['enregistrer'])) {
    $auteur = $_POST['auteur'];
    $titre = $_POST['titre'];
    $msg = '<p class="alert alert-success">Auteur : '.$auteur.' Titre : '.$titre.'</p>';
    echo $msg;
    } else {
    echo $msg;
    }?>

    <form class="form" action="" method="post">
        <label for="auteur">auteur</label>
        <br>
        <input
                value="<?= (!empty($resultToModify)) ? $resultToModify['auteur'] : '' ?>"
                class="form-control"
                type="text"
                name="auteur">
        <br>
        <label for="titre">titre</label>
        <br>
        <input
                value="<?= (!empty($resultToModify)) ? $resultToModify['titre'] : '' ?>"
                class="form-control"
                type="text"
                name="titre">
        <br>
        <?php if(!empty($resultToModify)) : ?>
            <input type="hidden"
                   name="id_livre" value="<?= $resultToModify['id_livre'] ?>">
        <?php endif; ?>
        <button
                name="<?= (!empty($resultToModify)) ? 'modifier' : 'enregistrer' ?>"
                type="submit" class="btn btn-primary" >
            <?= (!empty($resultToModify)) ? 'modifier' : 'enregistrer' ?>
        </button>
    </form>

</div><!-- /.container -->
<?php include('include/footer.php') ?>