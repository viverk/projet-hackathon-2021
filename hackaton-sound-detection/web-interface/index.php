<?php
session_start();

    /*Connection à une base de donnée*/
    include_once("./php/cnx.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" type="image/png" href="./img/logo.png">
    <title>Wello Assist</title>
</head>
<header>
    <h1>Bonjour</h1>
</header>
<body>
    <!-- Le formulaire dans lequel vous entrer votre immatriculation et que vous validé-->
    <form action="php/register.php" method="get">
        <input type="text" id="immatriculation" name="immatriculation"  placeholder="Votre immatriculation" autofocus><br>
        <input id="submit" type="submit" value="Commencer">
    </form>

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="./js/fonctions.js"></script>
</body>

</html>