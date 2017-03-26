<?php
session_start();
//Envoi mail

    $to = $_SESSION['mail_resto'];
    $subject = 'Demande à propos de la publication ' . $_SESSION['titre_pub'];
    $message = ''.$_SESSION['contenu'];
    $headers = 'From: ' . $_SESSION['mail_donateur'] . "\r\n";

    mail($to, $subject, $message, $headers);
    if (!mail($to, $subject, $message, $headers)) {
        $send_error = "Erreur lors de l'envoi de l'email :(";
        echo $send_error;
    } else {
        header('Location:affichePublication.php');
    }
