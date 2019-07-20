<?php
$title = "Onsign - Back end"; // titre de la page
$description = "écrire la meta description de la page"; // métadescription de la page
$main_color = "white";// background_color du main
$titre = "Comptes";

include('../include/header_back.php');// nav + pop up
require_once('connect.php');
// systeme de grid en 12 colonnes fait avec le css de materialize

// LE CSS ACTUELL QUI FONCTIONNE EST STYLE2.CSS

// NE PAS SUPPRIMER STYLE.CSS POUR L'INSTANT

$sql = "SELECT `id`, `nom`, `prenom`, `mail`, `adresse`, `telephone`, `niveau_forfait`, `niveau_formation`, `admin` FROM `users`";
// premiere etape, le prepare
$stmt = $pdo->prepare($sql);
$stmt->execute();
$users = $stmt -> fetchAll();

?>

<section class="white flex-col-center">
    <div class="container">
        <h4><a href="ajouter_users.php">Ajouter un utilisateur</a></h4>
        <table class="responsive-table highlight">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Mail</th>
                <th>Adresse</th>
                <th>Tél</th>
                <th>forfait</th>
                <th>formation</th>
                <th>Mod</th>
                <th>Sup</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ( $users as $value ) : ?>
            <tr>
                <td><?=$value['nom'] ?></td>
                <td><?=$value['prenom'] ?></td>
                <td><?=$value['mail'] ?></td>
                <td><?=$value['adresse'] ?></td>
                <td><?=$value['telephone'] ?></td>
                <td><?php if ($value['niveau_forfait'] === "1") {
                            echo "3 mois";
                        } elseif ($value['niveau_forfait'] === "2") {
                            echo "6 mois";
                        } elseif ($value['niveau_forfait'] === "3") {
                            echo "12 mois";
                        } ?></td>
                <td><?=$value['niveau_formation'] ?></td>
                <td>
                    <a href="modifier_users.php?id=<?=$value['id']?>">
                        <i class="material-icons">create</i>
                    </a>
                </td>
                <td>
                    <a onclick="return confirm('Etes-vous sur de vouloir supprimer ?')" href="supprimer_users.php?id=<?=$value['id']?>">
                        <i class="material-icons text-orange">delete</i>
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</section>

<?php include('../include/footer_back.php');


