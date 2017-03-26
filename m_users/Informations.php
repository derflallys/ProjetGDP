<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;



//Donateurs
    $sql = "SELECT * FROM $bd.donateurs where id_donateu=:id";
    $resultatdona=$connexion->prepare($sql);
    $resultatdona->execute(array('id'=>$_SESSION['id_donateur']));
    $res_dona = $resultatdona->fetch(PDO::FETCH_ASSOC);
    //print_r($res_dona);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>Accueil</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../core/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>
<?php include "../core/header.php" ;?>
<?php echo '
 				<ul class="collection col s12 hoverable ">
                        <li class="collection-header"><h4>Information Donateurs</h4></li>

                        <li class="collection-item dismissable left-align"><div><b >Nom :</b><a href="#!" class="secondary-content"> <b>'.$res_dona["nom"].'</a></b></div></li>

                        <li class="collection-item dismissable left-align"><div><b >Email :</b><a href="#!" class="secondary-content"><b>'.$res_dona["email"].'</a></b></div></li>

						<li class="collection-item dismissable left-align"><div><b >Telephone:</b><a href="#!" class="secondary-content"><b>'.$res_dona["telephone"].'</a></b></div></li>
						                       
                        <li class="collection-item dismissable left-align"><div><b >CodePostal:</b><a href="#!" class="secondary-content"><b>'.$res_dona["codepostal"].'</a></b></div></li>
                       

                        <li class="collection-item dismissable left-align"><div><b >Type Donateurs:</b><a href="#!" class="secondary-content"><b>'.$res_dona["type_donateurs"].'</a></b></div></li>
						
						                       
                        <center>	<button class="btn waves-effect waves-light" type="modifier" name="modifier">Modifier Mon Compte
						    <i class="material-icons right">send</i>
						  </button></center>

                 

                           </ul> ' ?>

<?php include "../core/footer.php" ;?>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>
</body>



</html>
