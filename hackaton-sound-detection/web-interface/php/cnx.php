<?php
//connexion a la base de données
// dsn = Data Source Name = driver MYSQL
$dsn='mysql:dbname=wello_assist;host=localhost:8889';
//login
$login='root';
// Mot de passe
$motDePasse='root';
// Connexion au serveur MySQL
try{
    $cnx = new PDO($dsn, $login, $motDePasse,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}
catch (PDOException $e){
	die('Erreur : ' . $e->getMessage());
}