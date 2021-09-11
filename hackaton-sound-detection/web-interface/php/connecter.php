<?php 
    include 'cnx.php';

    /*Utilise la plaque d'immatricualtion qu se trouve dans la variable Session afin d'aller chercher le numéro du wello dans la base de donnée */
    $status = $cnx->prepare('SELECT plaque FROM velo WHERE plaque ="'.$_SESSION['immatriculation'].'"');
    $status->execute();
    $result = $status->fetch(PDO::FETCH_ASSOC);
    //echo "<p>".$result['plaque']."</p>";
?>