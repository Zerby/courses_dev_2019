<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 28/03/2018
 * Time: 10:34
 */
require_once('init.inc.php');
include ('include/header.php');

// affichage de la table emprunt
$emprunt = $pdo->query('SELECT * FROM emprunt');
$emprunts = $emprunt->fetchAll(PDO::FETCH_ASSOC);

// recuperation des prenoms de la table abonne
$abonne = $pdo->query('SELECT * FROM abonne');
$abonnes = $abonne->fetchAll(PDO::FETCH_ASSOC);

// recuperation des auteurs et titres de la table livre
$livre = $pdo->query('SELECT * FROM livre');
$livres = $livre->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container">

    <?php if ($_GET['id'] == 1) { ?>

    <table style="margin-top: 50px;" class="table table-striped">
        <tr>
            <?php
            foreach ($abonnes[0] as $key => $value) :
                ?>
                <th><?= $key ?></th>
                <?php
            endforeach;
            ?>
            <th>modification</th>
            <th>suppression</th>
        </tr>
        <?php
        foreach ($abonnes as $key => $value) :
            ?>
            <tr>
                <td><?= $value['id_abonne']?></td>
                <td><?= $value['prenom']?></td>
                <td>
                    <a href="ajout_abonne.php?modif=<?= $value['id_abonne'] ?>">
                        <span><i class="material-icons">create</i></span>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer ?')" href="ajout_abonne.php?delete=<?= $value['id_abonne'] ?>">
                        <span><i class="material-icons text-danger">delete</i></span>
                    </a>
                </td>
            </tr>
            <?php
        endforeach;

        ?>
    </table>

    <?php } else if ($_GET['id'] == 2) { ?>

    <table style="margin-top: 50px;" class="table table-striped">
        <tr>
            <?php
            foreach ($livres[0] as $key => $value) :
                ?>
                <th><?= $key ?></th>
                <?php
            endforeach;
            ?>
            <th>modification</th>
            <th>suppression</th>
        </tr>
        <?php
        foreach ($livres as $key => $value) :
            ?>
            <tr>
                <td><?= $value['id_livre'] ?></td>
                <td><?= $value['titre'] ?></td>
                <td><?= $value['auteur'] ?></td>
                    <td><a href="ajout_livre.php?modif=<?= $value['id_livre'] ?>">
                        <span><i class="material-icons">create</i></span>
                    </a>
                </td>
                    <td><a onclick="return confirm('Etes-vous sur de vouloir supprimer ?')"
                       href="ajout_livre.php?delete=<?= $value['id_livre'] ?>">
                        <span><i class="material-icons text-danger">delete</i></span>
                    </a>
                </td>
            </tr>
            <?php
        endforeach;

        ?>
    </table>
    <?php } else if ($_GET['id'] == 3) { ?>

    <table style="margin-top: 50px;" class="table table-striped">
        <tr>
            <?php
            foreach ($emprunts[0] as $key => $value) :
                ?>
                <th><?= $key ?></th>
                <?php
            endforeach;
            ?>
            <th>modification</th>
            <th>suppression</th>
        </tr>
        <?php
        foreach ($emprunts as $key => $value) :
            ?>
            <tr>
                <td><?= $value['id_emprunt'] ?></td>
                <td><?= $value['id_livre'] ?></td>
                <td><?= $value['id_abonne'] ?></td>
                <td><?= $value['date_sortie'] ?></td>
                <td><?= $value['date_rendu'] ?></td>
                <td>
                    <a href="ajout_emprunt.php?modif=<?= $value['id_emprunt'] ?>">
                        <span><i class="material-icons">create</i></span>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer ?')"
                       href="ajout_emprunt.php?delete=<?= $value['id_emprunt'] ?>">
                        <span><i class="material-icons text-danger">delete</i></span>
                    </a>
                </td>
            </tr>
            <?php
        endforeach;

        ?>
    </table>
    <?php }  ?>
</div>

<?php include('include/footer.php');
