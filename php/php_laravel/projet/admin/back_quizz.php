<?php
$title = "Onsign - Back end"; // titre de la page
$description = "écrire la meta description de la page"; // métadescription de la page
$main_color = "white";// background_color du main
$titre = "Quizz";

include('../include/header_back.php');// nav + pop up
require_once('../admin/connect.php');
// systeme de grid en 12 colonnes fait avec le css de materialize

// LE CSS ACTUELL QUI FONCTIONNE EST STYLE2.CSS

// NE PAS SUPPRIMER STYLE.CSS POUR L'INSTANT

$sql = "SELECT `id_cours`, `id_quizz`, `mot`, `video1`, `video2`, `video3`, `niveau` FROM `quizz`";
// premiere etape, le prepare
$stmt = $pdo->prepare($sql);
$stmt->execute();
$quizz = $stmt -> fetchAll();


?>

<section class="white flex-col-center">
    <div class="container">
        <h4><a href="ajouter_quizz.php">Ajouter un quizz</a></h4>
        <table class="responsive-table highlight">
            <thead>
            <tr>
                <th>id_cours</th>
                <th>Mot</th>
                <th>Vidéo 1</th>
                <th>Vidéo 2</th>
                <th>Vidéo 3</th>
                <th>Niveau</th>
                <th>Mod</th>
                <th>Sup</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ( $quizz as $value ) : ?>
            <tr>
                <td><?= $value['id_cours'] ?></td>
                <td><?= $value['mot'] ?></td>
                <td><?= $value['video1'] ?></td>
                <td><?= $value['video2'] ?></td>
                <td><?= $value['video3'] ?></td>
                <td><?= $value['niveau'] ?></td>
                <td>
                    <a href="modifier_quizz.php?id=<?=$value['id_cours']?>">
                        <i class="material-icons">create</i>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('T sûr ??')" href="supprimer_quizz.php?id=<?=$value['id_cours']?>">
                        <i class="material-icons text-orange">delete</i>
                    </a>
                </td>
            </tr>
            <?endforeach;?>
            </tbody>
        </table>

    </div>
</section>

<?php include('../include/footer_back.php');


