<?php

include 'cnx.php';
$rqt = $cnx->prepare("UPDATE alert SET user_comment='".$_POST['valeur']."' WHERE user_confirmation = true ORDER BY datetime DESC LIMIT 1");
$rqt->execute();


$typeApel = $_POST["types"];  
$from = "aanglio@lerebours.org";
$to = "aanglio@lerebours.org";

if ($typeApel == "1") {

    $subject = "Signalement d'une explosion";
    $message = "Une explosion a été signalée !!";

} else if ($typeApel == "2") {

    
    $subject = "Signalement d'un coup de feu";
    $message = "Un coup de feu a été signalé !!";

} else if ($typeApel == "3") {

    $subject = "Signalement d'un bruit suspect non identifié";
    $message = "Des bruits suspects ont été signalés !!";

} else if ($typeApel == "4") {

    $subject = "Signalement d'un cri inquiétant";
    $message = "Des cris inquiétants on été signalés !!";

}

$headers = "De :" . $from;
ini_set('SMTP', 'smtp.free.fr');
error_reporting(E_ALL);
echo $subject;
mail($to, $subject, $message, $headers);

?>