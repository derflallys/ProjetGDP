<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;

if (isset($_GET['pub']))
{
    $sql = "DELETE  FROM $bd.publication WHERE id_publication=:id_four  ";
    $resultatpub = $connexion->prepare($sql);
    $resultatpub->execute(array('id_four' => $_GET['pub']));
    header('Location:../m_pub/mespub_fournisseurs.php');
}