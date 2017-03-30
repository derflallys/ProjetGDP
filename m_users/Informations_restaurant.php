<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;



//Donateurs
    $sql = "SELECT * FROM $bd.fournisseurs where id_restaurant=:id";
    $resultatdona=$connexion->prepare($sql);
    $resultatdona->execute(array('id'=>$_SESSION['id']));
    $res_dona = $resultatdona->fetch(PDO::FETCH_ASSOC);
    //print_r($res_dona);
    $_SESSION['password']=$res_dona["password"];
    $_SESSION['id_restaurant']=$res_dona["id_restaurant"];
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
<?php include "../core/header_fournisseurs.php" ;?>
<?php


 echo '
 

 				<ul class="collection col s8 offset-2 hoverable " id="info">
                        <li class="collection-header"><h4>Information Restaurant</h4></li>

                        <li class="collection-item dismissable left-align"><div><b >Nom :</b><a href="#!" class="secondary-content"> <b>'.$res_dona["nom_restaurant"].'</a></b></div></li>

                        <li class="collection-item dismissable left-align"><div><b >Email :</b><a href="#!" class="secondary-content"><b>'.$res_dona["email"].'</a></b></div></li>

						<li class="collection-item dismissable left-align"><div><b >Adresse:</b><a href="#!" class="secondary-content"><b>'.$res_dona["adresse_restaurant"].'</a></b></div></li>
						                       
                        <li class="collection-item dismissable left-align"><div><b >CodePostal:</b><a href="#!" class="secondary-content"><b>'.$res_dona["codepostal"].'</a></b></div></li>
                       

                        <li class="collection-item dismissable left-align"><div><b >Type Restaurant:</b><a href="#!" class="secondary-content"><b>'.$res_dona["type_restaurant"].'</a></b></div></li>
						
						                       
                        <center>	<button class="btn waves-effect waves-light" id="modif" >Modifier mes Informations
						    <i class="material-icons right">send</i>
						  </button></center>

                 

                           </ul> 
                          ' ;

 
 ?>	
 					<div class="row" id="modifInfo">
 					<form action="modification_restaurant.php" method="POST">
						<div class="input-field col s12">
					<?php echo 	'<input placeholder="Nom de votre Restaurant" id="nom"  name ="nom" type="text" value='.$res_dona["nom_restaurant"].' class="validate"> 
								<label for="nom">Nom Restaurant</label>
							</div>

							<div class="input-field col s6">
								<input id="telephone" type="text"  name ="telephone" class="validate" value='.$res_dona["adresse_restaurant"].'>
								<label for="telephone">Adresse</label>
							</div>


							 <div class="input-field col s6">
								<input id="codepostal" type="text"  name ="codepostal" class="validate" value='.$res_dona["codepostal"].'>
								<label for="codepostal">Code Postal</label>
							</div>
						
							
						
							<div class="input-field col s12">
								<input id="email" type="email"  name="email" class="validate" value='.$res_dona["email"].'>
								<label for="email">Email</label>
							</div>
						
							<div class="input-field col s12">
								<input id="password" type="password"  name="password" class="validate">
								<label for="password">Password</label>
							</div>

							<div class="input-field col s12"><input id="tyoe_restaurant"  restaurant" type="text" class="validate" value='.$res_dona["type_restaurant"].'>
								<label for="type_restaurant">Type Restaurant</label>
							</div>
				
							'?>
							
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit
						    <i class="material-icons right">send</i>
						  </button>
						 </form>
			</div>

<?php include "../core/footer.php" ;?>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>

</body>



</html>
