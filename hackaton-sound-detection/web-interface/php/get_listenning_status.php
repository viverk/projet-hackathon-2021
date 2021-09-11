<?php
    include 'cnx.php';

    $sql = $cnx->prepare(
        "SELECT listenning_status FROM velo WHERE listenning_status = 1"
    );

    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_UNIQUE);
    echo $result['listenning_status'];

?>