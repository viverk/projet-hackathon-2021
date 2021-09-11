<?php
session_start();

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

    <?php include_once("../php/connecter.php"); ?>
    
    <h1>Vous êtes à bord du Wello immatriculé : <?php echo $_SESSION['immatriculation']; ?></h1><br>
    
    <div id="content">
        <p class="cercle-main"></p>
        <img id="microphone" class="micro-inactif" src="../img/microphone.png" alt="">
    </div>

    <a href="/php/set_user_confirmation.php" id="submit" type="submit" value="Confirmer le signalement">Confirmer le signalement</a>
    <a href="" id="submit-fa" type="submit" value="Fausse alerte">Fausse alerte</a>

    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/fonctions.js"></script>
</body>
</html>