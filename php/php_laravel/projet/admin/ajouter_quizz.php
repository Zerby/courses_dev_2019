<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 08/03/2018
 * Time: 18:58
 */
$title = "Onsign - Back end"; // titre de la page
$description = "écrire la meta description de la page"; // métadescription de la page
$main_color = "white";// background_color du main
$titre = "Quizz";
require_once('connect.php');

if(isset($_POST['submit'])){

    $sql = "INSERT INTO `quizz` ( `mot`, `video1`, `video2`, `video3`)
    VALUES (:id_cours, :mot, :video1, :video2, :video3)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':mot', $_POST['mot'], PDO::PARAM_STR);
    $stmt->bindValue(':video1', $_FILES['video1']['name']);
    $stmt->bindValue(':video2', $_FILES['video2']['name']);
    $stmt->bindValue(':video3', $_FILES['video3']['name']);
    $stmt->execute();
    //header('Location: back_cours.php');
var_dump($_POST);
}

	if(!empty($_POST['submit']) && isset($_FILES['video1']))
     {

         $destination = "../video/";

         $filename = basename($_FILES['video1']['name']);

         move_uploaded_file($_FILES['video1']['tmp_name'], $destination . $filename);
         //header('Location: back_cours.php');

   }
    if(!empty($_POST['submit']) && isset($_FILES['video2']))
    {

        $destination = "../video/";

        $filename = basename($_FILES['video2']['name']);

        move_uploaded_file($_FILES['video2']['tmp_name'], $destination . $filename);
        //header('Location: back_cours.php');

    }
    if(!empty($_POST['submit']) && isset($_FILES['video3']))
    {

        $destination = "../video/";

        $filename = basename($_FILES['video3']['name']);

        move_uploaded_file($_FILES['video3']['tmp_name'], $destination . $filename);
        header('Location: back_cours.php');

    }

include('../include/header_back.php');?>

<section class="white">
    <div class="container">
        <div class="row padding">
            <h2 class="center-align blue-text">Ajouter un Quizz</h2>
        </div>

        <form method="post" enctype="multipart/form-data" action="<?= $_SERVER['PHP_SELF'] ?>">

            <div class="row">
                <label for="mot" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Mot</label>
                <input type="text" name="mot" title="mot" class="browser-default col s10 offset-s1 m7 l7">
            </div>

            <div class="row">
                <label for="video1" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Vidéo des Quizz 1</label>
                <input type="file" title="video1" name="video1" class="browser-default col s10 offset-s1 m7 l7"/>
            </div>

            <div class="row">
                <label for="video2" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Vidéo des Quizz 2</label>
                <input type="file" title="video2" name="video2" class="browser-default col s10 offset-s1 m7 l7"/>
            </div>

            <div class="row">
                <label for="video3" class="browser-default col offset-m1 m3 offset-l1 l3 s10 offset-s1 p-10">Vidéo des Quizz 3</label>
                <input type="file" title="video3" name="video3" class="browser-default col s10 offset-s1 m7 l7"/>
            </div>

            <div class="flex-col-center-sa w-100 h-15">
                <input type="submit" name="submit" value="upload" class="button button_orange w-40 margin-0">
            </div>
            <p>Votre vidéo ne doit pas excéder 8M, si c'est le cas merci de la compresser avant de l'envoyer!</p>
        </form>

    </div>

</section>

<?php include('../include/footer_back.php');