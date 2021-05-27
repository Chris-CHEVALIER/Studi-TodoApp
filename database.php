<?php

function connect() { // Connecte le site web à la BDD
    $dbName = 'TodoApp'; // Nom de la BDD
    $dbHost = 'localhost'; // Nom de l'hôte
    $port = '3306'; // ou '8889' 
    $dbUsername = 'root'; // Nom d'utilisateur MySQL
    $dbUserPassword = 'root'; // Mot de passe MySQL
    $cont = null;

    try {
        // On créé un objet PDO à l'aide des identifiants de connexion à la BDD
        $cont = new PDO(
            "mysql:host=$dbHost;dbname=$dbName;port=$port",
            $dbUsername, $dbUserPassword
        );
    } catch(PDOException $e) {
        die($e->getMessage());
    }

    return $cont; // Renvoie un objet issue de la connection PDO à la BDD
}

