<?php
require_once ('include/init.inc.php');
require ('include/haut.inc.php');


/*if (isset($_POST['enregistrer'])) {
    if ($_POST['nom'] < 3 || $_POST['prenom'] < 3 || $_POST['tel'] > 10) {
        echo '<div class="alert alert-danger" role="alert">
            Le prénom et le nom doivent faire plus de 3 caractères.
            Le téléphone doit avoir max 10 chiffres.
            </div>';
    }

    else {

        echo '<div class="alert alert-success" role="alert">
                C\'est envoyé
                <?= var_dump($_POST) ?>
              </div>';
    }
}*/

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['enregistrer'])){

        $sql = "INSERT INTO `annuaire` (`id_annuaire`, `nom`, `prenom`, `telephone`, `profession`, `ville`, `codepostal`, `adresse`, `date_de_naissance`, `sexe`, `description`) 
        VALUES 
        (:nom, :prenom, :tel, :profession, :ville, :cp, :adresse, :date_de_naissance, :sexe, :description)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR);
        $stmt->bindValue(':nom', $_POST['nom'],PDO::PARAM_STR );
        $stmt->bindValue(':tel', $_POST['telephone'],PDO::PARAM_INT );
        $stmt->bindValue(':profession', $_POST['profession'],PDO::PARAM_STR );
        $stmt->bindValue(':ville', $_POST['ville'],PDO::PARAM_STR );
        $stmt->bindValue(':cp', $_POST['codepostal'],PDO::PARAM_INT );
        $stmt->bindValue(':adresse', $_POST['adresse'],PDO::PARAM_STR );
        $stmt->bindValue(':date_de_naissance', $_POST['date_de_naissance'] );
        $stmt->bindValue(':sexe', $_POST['sexe']);
        $stmt->bindValue(':description', $_POST['description'],PDO::PARAM_STR );
        $stmt->execute();
        var_dump($_POST);
        var_dump($stmt);
}

$sql = "SELECT * FROM `annuaire` WHERE 1";
// premiere etape, le prepare
$stmt = $pdo->prepare($sql);
// deuxieme etape, le bind
// ici, pas de bind 😖
// troisieme etape, execution de la requete
$stmt->execute();
var_dump($stmt);
?>

    <form class="col-6" method="post" action="<?= $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nom</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="votre nom" name="nom">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Prénom</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="votre prénom" name="prenom">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Téléphone</label>
            <input type="tel" class="form-control" id="exampleFormControlInput1" placeholder="060606060" name="tel">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Profession</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="métier" name="profession">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Ville</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Paris" name="ville">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Code Postal</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="75002" name="cp">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Adresse</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="adresse"></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Date de naissance</label>
            <select class="form-control" id="exampleFormControlSelect1" name="date_de_naissance">
                <option>11/11/2011</option>
                <option>22/06/1998</option>
                <option>30/07/1970</option>
                <option>14/04/1969</option>
                <option>24/09/1959</option>
            </select>
        </div>

        <div class="form-check form-check-inline">
            Sexe :
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="sexe" id="inlineRadio1" value="option1" > m
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="sexe" id="inlineRadio2" value="option2"> f
            </label>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="adresse"></textarea>
        </div>

        <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrement</button>
    </form>

<?php
require ('include/bas.inc.php');