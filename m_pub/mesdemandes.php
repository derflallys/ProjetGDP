<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;
$_SESSION['id']=1;
$sql = "SELECT * FROM $bd.demande_pub WHERE id_fournisseur=:id_four ORDER  BY date_demande DESC    ";
$resultat_demande = $connexion->prepare($sql);
$resultat_demande->execute(array('id_four' => $_SESSION['id']));
$res = $resultat_demande->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT * FROM $bd.donateurs where id_donateu=:id_dona";
$resultatdona=$connexion->prepare($sql);

$sql = "SELECT * FROM $bd.publication where id_publication=:id_pub";
$resultat_pub = $connexion->prepare($sql);


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
<!--footer -->
<?php include "../core/header.php" ;?>
<div class="container">
    <div class="row">
        <div class="col s8 offset-s2">
            <div class="col s12 ">
                <h2 class="header center">Demandes Reçues</h2>
                <?php
                foreach ($res as $key => $value) {
                $resultatdona->execute(array('id_dona'=>$value['id_donateur']));
                $res_dona = $resultatdona->fetch(PDO::FETCH_ASSOC);
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
                                  <p><b>Demandeur :</b>'.$res_dona['nom'].'<br>
                                     <b>Telephone : </b>'.$res_dona['telephone'].'
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
