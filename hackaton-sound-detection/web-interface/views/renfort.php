<?php
/*Connection à une base de donnée*/
        include_once("../php/cnx.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <title>WelloAssist</title>
</head>
<header>
    <img id="logo" src="../img/logo.png" alt="logo" style="width:100px;height:80px;">
    <a id="déco" href="../index.php"><img src="../img/deco2.png" alt="deconection" style="width:60px;height:42px;"></a>
</header>
<body>
    <h1>Vous êtes à bord du Wello immatriculé :</h1><br>
    <?php include_once("../php/connecter.php"); ?>
    <p id="cercle-renfort"></p>
    <img id="micro-inactif" src="../img/micro_renfort.png" alt="">
    <p id="text">enregistrement de votre signalement en cours</p> 
    <section class="point">
    <p id="p1">.</p>
    <p id="p2">.</p>
    <p id="p3">.</p>
    </section>
    <input id="submit" type="submit" value="Prévenir les renforts">


</body>
</html>