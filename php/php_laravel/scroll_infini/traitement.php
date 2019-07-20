<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';
extract($_POST);

$req = Connexion()->prepare('SELECT * FROM posts LIMIT 2 OFFSET :offset');
$req->bindValue(':offset', intval($offset), PDO::PARAM_INT);
$req->execute();

$posts = $req->fetchAll();
$reponse = '';
if($posts){
  foreach ($posts as $post) {
    $reponse .= '<hr>';
    $reponse .= $post->title.'<br><br>';
  }
}
die(json_encode($reponse));
