<?php

try {
    $bdd = new PDO('mysql:host=' . SERVER . ';dbname=' . DATABASE . ';charset=utf8', USER, PASSWORD);
    $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
