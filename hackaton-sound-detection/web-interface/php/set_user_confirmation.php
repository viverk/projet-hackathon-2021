<?php
    include 'cnx.php';

    $sql = $cnx->prepare(
        "UPDATE alert SET user_alert = true, user_confirmation = true ORDER BY datetime DESC LIMIT 1"
    );

    $sql->execute();

    header('Location: /views/confirm-alert.php');
?>