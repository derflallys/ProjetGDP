<?php
include "../core/connexionBd.php";
include "../core/utile.php";
$connexion = connexionBd();
if(isset($_GET['pub'])) {
    $sql = "SELECT * FROM projetgdp.publication where id_publication=:id";
    $resultat_pub = $connexion->prepare($sql);
    $resultat_pub->execute(array('id' => $_GET['pub']));
    $res_pub = $resultat_pub->fetch(PDO::FETCH_ASSOC);
    //print_r($res);
    //Fournissseurs
    $sql = "SELECT * FROM projetgdp.fournisseurs where id_restaurant=:id";
    $resultatresto=$connexion->prepare($sql);
    $resultatresto->execute(array('id'=>$res_pub["publicateur"]));
    $resresto = $resultatresto->fetch(PDO::FETCH_ASSOC);
    //Calcul de la note
    $sql = "SELECT SUM(note) as note FROM projetgdp.note_fournisseurs where id_fournisseurs=:id";
    $resultatnote=$connexion->prepare($sql);
    $resultatnote->execute(array('id'=>$res_pub["publicateur"]));
    $resnote = $resultatnote->fetch(PDO::FETCH_ASSOC);
    if (!empty($resnote)) {

        $note=$resnote['note'];
    }
    else{
        $note=0;

    }
}
else
{
    header('Location:affichePublication.php');
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Creer Publication</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../core/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<!--header -->
<?php include "../core/header.php" ;?>


    <div class="container center">
        <h3 class="col s12 center-align blue-grey-text"> Details de la publication </h3>
        <div class="row">

            <div class="col s8 offset-s2 ">
                <?php echo '<h5 class="center-align blue-grey-text ">'.$res_pub["titre_publication"].'</h5>';
                 echo  '<img class="materialboxed hoverable  push-s2" width="650" src='.$res_pub["image_publication"].'>';

               echo ' <div class="card-panel col s12 hoverable  blue-grey">
                        <p class="card-title white-text"><u><b>Description</b></u></p>
                        <span class="white-text">
                        '.$res_pub['contenu'].'
                        </span>
                      </div>
                ';
                echo'
                    <ul class="collection col s12 hoverable ">
                        <li class="collection-header"><h4>Information Publication</h4></li>
                        <li class="collection-item dismissable"><div><b class=" left-align">Date Publication :</b><a href="#!" class="secondary-content"> <b>'.$res_pub["date_publication"].'</a></b></div></li>
                        <li class="collection-item dismissable"><div><b class="left-align">Quantite :</b><a href="#!" class="secondary-content"><b>'.$res_pub["quantite"].'</a></b></div></li>
                        <li class="collection-item dismissable"><div><b class="left-align">Etat :</b><a href="#!" class="secondary-content"><b>'.strtoupper($res_pub["etat"]).'</a></b></div></li>
                        <li class="collection-item dismissable"><div><b class="left-align">Duree de Validite :</b><a href="#!" class="secondary-content"><b>'.$res_pub["duree_validite"].'</a></b></div></li>
                    </ul> 
                    <ul class="collection col s12 hoverable ">
                        <li class="collection-header"><h4>Information Restaurant</h4></li>
                        <li class="collection-item dismissable"><div><b class=" left-align">Adresse :</b><a href="#!" class="secondary-content"> <b>'.$resresto["adresse_restaurant"].'</a></b></div></li>
                        <li class="collection-item dismissable"><div><b class="left-align">Type de Collaboration :</b><a href="#!" class="secondary-content"><b>'.$resresto["contrat"].'</a></b></div></li>
                        <li class="collection-item dismissable"><div><b class="left-align">Telephone :</b><a href="#!" class="secondary-content"><b>'.$resresto["tel"].'</a></b></div></li>
                        <li class="collection-item dismissable"><div><b class="left-align">Note :</b><a href="#!" class="secondary-content"><b>'.$note.'/10</a></b></div></li>
                    </ul> '
                ;?>
            </div>
        </div>
    </div>

<!--footer -->
<?php include "../core/footer.php" ;?>
</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>


</html>
