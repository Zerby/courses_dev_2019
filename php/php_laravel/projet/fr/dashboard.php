<?php
$title = "Onsign"; // titre de la page
$description = "écrire la meta description de la page"; // métadescription de la page
$main_color = "grey"; // background_color du main

require_once('../admin/controle-de-session.php');

include('../include/header_cours.php');// nav + pop up

require_once('../admin/connect.php');
//affchage                              
$key = "SELECT id, niveau_formation FROM users WHERE id = :id";
$stmt = $pdo->prepare($key);
$stmt->bindValue(':id', $_SESSION['id']);
$stmt->execute();
$value = $stmt->fetch();
//var_dump($value);


$sql = "SELECT `id_cours`, `titre`, `niveau`, `texte_cours`, `video` FROM cours WHERE niveau = :niveau";
$stmt2 = $pdo->prepare($sql);
$stmt2->bindValue(':niveau', $value['niveau_formation']);
$stmt2->execute();
$elements = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$sql2 = "SELECT `id_cours` FROM quizz WHERE id_cours = :id";
$quizz = $pdo->prepare($sql2);
$quizz->bindValue(':id', $value['id']);
$quizz->execute();
$quizzAll = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$quizz = "SELECT `reussi1`, `id`, `id_quizz` FROM reussi WHERE id = :id";
$stmt3 = $pdo->prepare($quizz);
$stmt3->bindValue(':id', $_SESSION['id']);
$stmt3->execute();
$quizzz = $stmt3->fetchAll();


$reussi = "SELECT `reussi1`, `id`, `id_quizz` FROM reussi WHERE id = :id AND reussi1 = 1";
$reussi1 = $pdo->prepare($reussi);
$reussi1->bindValue(':id', $_SESSION['id']);
$reussi1->execute();
$reussis = $reussi1->fetchAll();


$nul = "SELECT `niveau`, id_cours FROM quizz WHERE niveau = :niveau";
$ok = $pdo->prepare($nul);
$ok->bindValue(':niveau', $value['niveau_formation']);
$ok->execute();
$null = $ok->fetchAll(PDO::FETCH_ASSOC);
//var_dump($null); 
$result = count($quizzz);
//var_dump($result); 
$result2 = count($reussis);
//var_dump($result2);


foreach ($null as $key => $null2) {
    if ($result == 0) {
        $nouvelleligne = "INSERT INTO `reussi`(`reussi1`, `id`, `id_quizz`) VALUES (0, :id, :id_quizz)";
        $ligne = $pdo->prepare($nouvelleligne);
        $ligne->bindValue(':id', $_SESSION['id']);
        $ligne->bindValue(':id_quizz', $null2['id_cours']);
        $ligne->execute();
        header('location:dashboard.php');
    } else {
//	echo "rien";
    }
}


if ($result == $result2) {
    echo '<div class="row container orange white-text padding-2">Vous avez terminé, pour continuer cliquez <a href="certification_irl.php">  içi </a></div>';


};

?>

<section class="white flex-col-center grey">
    <div class="container">
        <div class="row"></div>
        <h2>Niveau <?= $value['niveau_formation'] ?> </h2>
        <div class="w-40 flex-sa padding-2">
            <div>Progression dans le niveau :</div>
            <?php


            foreach ($quizzz as $key => $result) {
                if ($result['reussi1'] == 1) {
                    echo '<div class="col w-10 h-1 bloc_bordered orange"></div>';
                } else {
                    echo '<div class="col w-10 h-1 bloc_bordered blue"></div>';
                }
            }

            ?>


        </div>
        <div class="row">
            <?php foreach ($elements as $key => $value) : ?>
                <div class="col s10 offset-s1 m4 l4">
                    <div class="card hoverable z-depth-3">
                        <div class="card-image">
                            <img src="../images/home_section_certif.jpg" alt="cours">
                            <a href="cours.php?id=<?= $value['id_cours'] ?>"
                               class="card-title underline"><?= $value['titre'] ?></a>
                        </div>
                        <div class="card-content">
                            <p><?php
                                if (strlen($value['texte_cours']) > 100) {
                                    $value['texte_cours'] = substr($value['texte_cours'], 0, 100);
                                }
                                echo htmlentities($value['texte_cours']); ?>...</p>
                        </div>
                        <div class="card-action blue center-align">
                            <a href="quizz.php?id=<?= $value['id_cours'] ?>" class="text-white margin-auto">Faire le
                                Quizz</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <!--
                        <div class="col s10 offset-s1 m4 l4">
                            <div class="card hoverable z-depth-3">
                                <div class="card-image">
                                    <img src="../images/home_section_certif.jpg">
                                    <span class="card-title">Les bases de la lsf</span>
                                </div>
                                <div class="card-content">
                                    <p>I am a very simple card. I am good at containing small bits of information.</p>
                                </div>
                                <div class="card-action orange center-align">
                                    <a href="#" class="text-white margin-auto">Faire le Quizz</a>
                                </div>
                            </div>
                        </div>
            -->

        </div>
    </div>
</section>

<?php include('../include/footer.php') // footer du site ?>
