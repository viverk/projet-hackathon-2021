<?php

    include 'cnx.php';

    if (!empty($_POST)) {
        // handle post data
        $sound_nature = $_POST['sound_nature'];
        echo $sound_nature;
    
        $immatriculation = '';
        $sql = $cnx->prepare(
                        "INSERT INTO 
                            alert(wello_plate, `datetime`, sound_nature, user_alert, user_confirmation, user_comment) 
                          VALUES ('".$immatriculation."', NOW(), '".$sound_nature."', false, false, NULL)"
        );

        $sql->execute();
    }

?>