<?php
    $mysqli = new mysqli("localhost", "root", "", "wb_shopping");//pour connecter la bdd

    if ($mysqli->connect_error){//en cas erreur
        die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
    }

    require_once("fonctions.php");
?>