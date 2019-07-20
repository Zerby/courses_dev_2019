<?php
/**
 * Created by PhpStorm.
 * User: zerbiclement
 * Date: 28/03/2018
 * Time: 09:15
 */
$pdo = new PDO('mysql:host=localhost;dbname=bibliotheque', 'root', 'root',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
    ]);
