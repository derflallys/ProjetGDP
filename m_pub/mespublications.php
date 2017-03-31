<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;

$sql = "SELECT * FROM $bd.demande_pub WHERE id_donateur=:id_dona ORDER  BY date_demande DESC    ";
$resultat_demande = $connexion->prepare($sql);

$resultat_demande->execute(array('id_dona' => $_SESSION['id_donateur']));
$res = $resultat_demande->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM $bd.fournisseurs where id_restaurant=:id_four";
$resultatfour=$connexion->prepare($sql);

$sql = "SELECT * FROM $bd.publication where id_publication=:id_pub";
$resultat_pub = $connexion->prepare($sql);


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Mes Demandes</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../core/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<!--footer -->
<?php include "../core/header_donateurs.php" ;?>
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="col s12 ">
                <h2 class="header center">Demandes Effectuees</h2>
                <?php
                foreach ($res as $key => $value) {
                    $resultatfour->execute(array('id_four'=>$value['id_fournisseur']));
                    $res_four = $resultatfour->fetch(PDO::FETCH_ASSOC);
                    $resultat_pub->execute(array('id_pub' => $value['id_publication']));
                    $res_pub = $resultat_pub->fetch(PDO::FETCH_ASSOC);
                    echo '  
                 <div class="card horizontal hoverable">
                    <div class="card-image">
                        <img src='.$res_pub["image_publication"].'>
                    </div>
                    <div class="card-stacked">
                        <div class="card-content">
                            <p>'.$res_pub['contenu'].'</p>
                             <ul class="collection">
                                <li class="collection-item avatar">
                                  <i class="material-icons circle">grade</i>
                                  <span class="title">'.$res_pub['titre_publication'].'</span>
                                  <p><b>Fournisseur :</b>'.$res_four['nom_restaurant'].'<br>
                                     <b>Telephone : </b>'.$res_four['tel'].'
                                  </p>
                                </li>
                            </ul>
                        </div>
                        <div class="card-action">
                            <a href="#">Date de Demande : '.$value['date_demande'].'</a>
                        </div>
                    </div>
                </div> '; }?>
            </div>
        </div>
    </div>
</div>


<?php include "../core/footer.php" ;?>
</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>


</html>
