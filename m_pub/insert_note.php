<?php
session_start();
include "../core/connexionBd.php";
$connexion=connexionBd();
$bd= BD;
if(isset($_GET['insert']))
{
    $sql="INSERT INTO  $bd.note_fournisseurs (id_fournisseurs, id_donateur, note, id_publication)
        VALUES (:id_four,:id_dona,:note,:idpub)";
    $pub=$connexion->prepare($sql);
    $pub->execute(array('id_four'=>$_SESSION['id_resto'],'id_dona'=>$_SESSION['id_donateur'],'note'=>$_GET['note'],'idpub'=>$_SESSION['id_pub']));
   // header('Location:detailspub.php?pub='.$_SESSION["id_pub"]);
    echo 'detailspub.php?pub='.$_SESSION["id_pub"];
}
else
{
    echo 'mauvais';
}