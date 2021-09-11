<?php
    include 'cnx.php';

    $sql = $cnx->prepare(
        "SELECT * FROM alert
            WHERE user_alert IS NOT true
            ORDER BY `datetime` DESC 
            LIMIT 1"
    ); 

    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_UNIQUE);
    echo json_encode($result);

?>