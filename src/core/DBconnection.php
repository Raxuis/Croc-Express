<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=croc_express;charset=utf8', 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //    $database = new ManagerCharacter($bdd);

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}