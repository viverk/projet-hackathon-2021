<?php
    include 'cnx.php';

    $sql = $cnx->prepare("SELECT start_wello FROM velo WHERE start_wello = 1");
    $sql->execute();

    $result = $sql->fetch(PDO::FETCH_UNIQUE);
    echo $result['start_wello'];
?>