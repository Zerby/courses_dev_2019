<?php 
function Connexion()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=alliot_listes', 'alliot', '20al4p');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ);
        $bdd->query('SET NAMES UTF8');
        return $bdd;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}