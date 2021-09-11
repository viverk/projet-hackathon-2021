<?php
    include 'cnx.php';
    $request = "UPDATE alert SET user_alert = true, user_confirmation = false where id=".$_POST['id_alerte'];
    echo $request;
    $sql = $cnx->prepare(
        $request
    );

    $sql->execute();

?>