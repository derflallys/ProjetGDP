<?php
session_start();
include "../core/connexionBd.php";
$connexion=connexionBd();
$bd= BD;
//Envoi mail
if(isset($_GET['demande'])) {
    $to = $_SESSION['mail_resto'];
    $subject = 'Demande à propos de la publication ' . $_SESSION['titre_pub'];
    $message = '
    Bonjour ' . $_SESSION['nom_fourn'] . ', 
    Je suis interesse par le produit que vous donnez à savoir ' . $_SESSION['titre_pub'] . '.
    A ce sujet j\'aurai besoin d\'informations supplementaires . 
    Merci d\'avance de vos reponses et vous prie de croire,Madame,Monsieur, en l\'assurance de mes salutions 
    distinguées.
    Cordialement .
    ' . $_SESSION['nom_donateur'] . '
    Email : ' . $_SESSION['mail_donateur'];

    $headers = 'From:'.$_SESSION['mail_donateur'];

    mail($to, $subject, $message, $headers);
    if (!mail($to, $subject, $message, $headers)) {
        $send_error = "Erreur lors de l'envoi de l'email :(";
        echo $send_error;
    } else {
        $sql1 = "SELECT *  FROM $bd.demande_pub where id_fournisseur=:id_four AND id_donateur=:id_dona AND id_publication=:id_pub";
        $resultatdemand = $connexion->prepare($sql1);
        $resultatdemand->execute(array('id_four' => $_SESSION['id_resto'], 'id_dona' => $_SESSION['id_donateur'], 'id_pub' => $_SESSION['id_pub']));
        $resdemand = $resultatdemand->fetch(PDO::FETCH_ASSOC);
        if (empty($resdemand)) {
            $sql = "INSERT INTO  $bd.demande_pub (id_publication, id_donateur, id_fournisseur,date_demande)
            VALUES (:id_pub,:id_dona,:idfour,:date_d)";
            $demande = $connexion->prepare($sql);
            $demande->execute(array('id_pub' => $_SESSION['id_pub'], 'id_dona' => $_SESSION['id_donateur'], 'idfour' => $_SESSION['id_resto'], 'date_d' => date("Y-m-d H:i:s")));
            echo "affichePublication.php";
        } else {
            echo "affichePublication.php";
        }
    }
}