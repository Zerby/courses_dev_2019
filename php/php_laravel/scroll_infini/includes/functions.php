<?php

// établie une connexion avec la BDD
function Connexion(){
    try
    {
        $bdd = new PDO(DSN, USERNAME, PASSWORD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        $bdd->query('SET NAMES utf8');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur lors de la connexion : '.$e->getMessage());
    }
}

// genère les messages flash
function flashMsg(){
    if(isset($_SESSION['flash']))
    {
        foreach ($_SESSION['flash'] as $class => $message)
        {
            ?>
                <div class="alert alert-<?php echo $class; ?>" role="alert">
                    <i class="fa fa-times-circle-o" aria-hidden="true"></i>
                    <?php echo $message; ?>
                </div>
            <?php
        }

        unset($_SESSION['flash']);
    }
}

function dd($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
    die();
}

