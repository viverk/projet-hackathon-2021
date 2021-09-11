<?php
    include 'cnx.php';

    $sql = $cnx->prepare(
        "UPDATE velo SET listenning_status = true"
    );

    $sql->execute();
?>