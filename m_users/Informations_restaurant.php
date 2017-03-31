<?php
session_start();
include "../core/connexionBd.php";

$connexion = connexionBd();
$bd= BD;



//Donateurs
    $sql = "SELECT * FROM $bd.fournisseurs where id_restaurant=:id";
    $resultatdona=$connexion->prepare($sql);
    $resultatdona->execute(array('id'=>$_SESSION['id_four']));
    $res_dona = $resultatdona->fetch(PDO::FETCH_ASSOC);
if($res_dona["contrat"])
{
    $contrat="Avec Contrat";
}
else
{
    $contrat="Sans Contrat";
}
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
<div class="container">
    <div class="row" id="info">
        <div class="col s8 offset-s2">
<?php

 echo '
        

 				<ul class="collection col s12  hoverable " 
                        <li class="collection-header"><h4>Information Restaurant</h4></li>

                        <li class="collection-item dismissable left-align"><div><b >Nom :</b><a href="#!" class="secondary-content"> <b>'.$res_dona["nom_restaurant"].'</a></b></div></li>

                        <li class="collection-item dismissable left-align"><div><b >Email :</b><a href="#!" class="secondary-content"><b>'.$res_dona["email"].'</a></b></div></li>

						<li class="collection-item dismissable left-align"><div><b >Adresse:</b><a href="#!" class="secondary-content"><b>'.$res_dona["adresse_restaurant"].'</a></b></div></li>
						<li class="collection-item dismissable left-align"><div><b >Telephone:</b><a href="#!" class="secondary-content"><b>'.$res_dona["tel"].'</a></b></div></li>
						<li class="collection-item dismissable left-align"><div><b >Type de Collaboration:</b><a href="#!" class="secondary-content"><b>'.$contrat.'</a></b></div></li>
						                       
                        <li class="collection-item dismissable left-align"><div><b >CodePostal:</b><a href="#!" class="secondary-content"><b>'.$res_dona["codepostal"].'</a></b></div></li>
                        <li class="collection-item dismissable left-align"><div><b >Type Restaurant:</b><a href="#!" class="secondary-content"><b>'.$res_dona["type_restaurant"].'</a></b></div></li>
                </ul> 
                          ' ;


 ?>
            <div class="col s12 center">
                <button class="btn waves-effect waves-light" id="modif" >Modifier mes Informations
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>
    </div>
 					<div class="row" id="modifInfo">
 					<form action="modification_restaurant.php" method="POST">
						<div class="input-field col s12">
					<?php echo 	'<input placeholder="Nom Fournisseur" id="nom"  name ="nom" type="text"  class="validate" value='.$res_dona["nom_restaurant"].'> 
								<label for="nom">Nom Fournisseur</label>
							</div>

							<div class="input-field col s6">
								<input id="adresse" type="text"  name ="adresse" class="validate" value='.$res_dona["adresse_restaurant"].'>
								<label for="adresse">Adresse</label>
							</div>


							 <div class="input-field col s6">
								<input id="codepostal" type="text"  name ="codepostal" class="validate" value='.$res_dona["codepostal"].'>
								<label for="codepostal">Code Postal</label>
							</div>
						    <div class="input-field col s12">
                                <input id="telephone" type="text"  name ="telephone" class="validate" required value='.$res_dona["tel"].'>
                                <label for="codepostal">Telephone</label>
                            </div>
							
						
							<div class="input-field col s6">
								<input id="email" type="email"  name="email" class="validate" value='.$res_dona["email"].'>
								<label for="email">Email</label>
							</div>
						
							<div class="input-field col s6">
								<input id="password" type="password"  name="password" class="validate">
								<label for="password">Password</label>
							</div>

							<div class="input-field col s12"><input id="tyoe_restaurant"  restaurant" type="text" class="validate" value='.$res_dona["type_restaurant"].'>
								<label for="type_restaurant">Type Restaurant</label>
							</div>
							<div class="input-field col s12">
                                <select name="contrat" required>
                                    <option value="" disabled selected>Comment donnez vous ?</option>
                                    <option value="true">Avec Contrat</option>
                                    <option value="false">Sans Contrat</option>
                                </select>
                            </div>
				
							'?>
							
							<button class="btn waves-effect waves-light" type="submit" name="action">Modifier
						    <i class="material-icons right">send</i>
						  </button>
						 </form>
			</div>
</div>
<?php include "../core/footer.php" ;?>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>

</body>



</html>
