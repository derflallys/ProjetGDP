<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;
$sql = "SELECT * FROM $bd.publication WHERE publicateur=:id_four ORDER  BY publication.date_publication DESC ";
$resultatpub = $connexion->prepare($sql);
$resultatpub->execute(array('id_four' => $_SESSION['id_four']));
$res = $resultatpub->fetchAll(PDO::FETCH_ASSOC);





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

<?php
if (strcmp($_SESSION['user'],'donateurs')==0) {
    include "../core/header_donateurs.php";
}
if (strcmp($_SESSION['user'],'fournisseurs')==0)
{
    include "../core/header_fournisseurs.php";
}

?>
<!--Affichage des publications -->
<h1 class="center grey-text"> Mes Publications </h1>
<div class="container">
    <?php
    foreach ($res as $key => $value) {

        echo '<div class="row">
        <div class="col s1 "> </div>
        <div class="col s10 ">
            <div class="card large hoverable">
                <div class="card-image">';
        echo '<img src=' . $value["image_publication"] . '>';
        echo '<span class="card-title red-text"><b>' . $value["titre_publication"] . '</b></span>';
        echo '</div>
                <div class="card-content grey lighten-2">
                    <p class="truncate flow-text">' .$value["contenu"]. '</p>
                    <p class="right"><i class="material-icons left">date_range</i> Date Publication : ' . $value["date_publication"] . '</p>
                    <p><i class="material-icons left">shopping_basket</i>Quantite: ' . $value["quantite"] . '</p>
                    <p class="left"><i class="material-icons">stars</i> Etat: '. strtoupper($value["etat"]) . '</p>
                </div>
                <div class="card-action grey lighten-1">
                    <form method="get">                  
                        <a href=supprimer_pub.php?pub='.$value["id_publication"].' class="btn-floating  waves-effect waves-light red right"><i class="material-icons ">delete</i>Voir plus d\'information</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col s1 "> </div>
    </div>';
    }
    ?>
</div>
<?php include "../core/footer.php" ;?>
</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>


</html>
