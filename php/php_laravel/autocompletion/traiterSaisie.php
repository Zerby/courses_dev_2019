<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 24/03/2018
 * Time: 19:10
 */
$saisie = $_POST["saisie"];
if ($saisie == 'cz') {
    $saisie = "Clément Zerbi";
}
echo "2 = $saisie";