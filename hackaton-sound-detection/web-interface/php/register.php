<?php
session_start();
    include 'cnx.php';

/*Verification de l'immatriculation avec la base de donnée */
/*Vérification que quelque chose est bien écrit dans le champ texte*/ 
if (isset($_GET['immatriculation'])){
        /*Aller chercher toute les plaque dans la base de données*/ 
        $status = $cnx->prepare('SELECT plaque FROM velo');
        $status->execute();

        foreach ($status->fetchAll(PDO::FETCH_ASSOC) as $user) {
            /*On vérifie si l'immatriculation rentrer est bien dans la base de donnée */
            if($_GET['immatriculation'] == $user['plaque']){
                /*Si elle fait bien partis de la base de donnée. On stock cette immatriculation dans la variable Session et on affiche la page suivante*/
                $_SESSION['immatriculation'] = $user['plaque'];

                $sql = $cnx->prepare(
                    "UPDATE velo SET start_wello = true WHERE plaque='".$_SESSION['immatriculation']."'"
                );

                $sql->execute();
                

                header('Location: /views/main.php');
                exit();
            } else {
                header('Location: /index.php');
                exit();
            }
        }
    }

else {
    header('Location: /');
    exit();
}

$status->CloseCursor();
?>