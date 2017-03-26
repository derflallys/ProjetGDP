
<?php
include "../core/header_home.php"
//include 'authentification.php';

?>

<?php 
session_start();
require_once("../core/connexionBd.php");
include "../core/utile.php";
$connexion = connexionBd();
$bd=BD;
if(isset($_POST['action'])){
	$nom=$_POST['nom'];
	//$adresse=$_POST['adresse'];
	$codepostal=$_POST['codepostal'];
	
	$email=$_POST['email'];
	$type_donateurs=$_POST['type_donateurs'];
	$telephone=$_POST['telephone'];
	$photo_user=$_POST['photo_user'];

	$veriff=MaildansBase($email,"donateurs");
	$mdp=hash('sha256',$_POST['password']);

	if ($veriff) {
		$insert=$connexion->prepare(" INSERT INTO $bd.donateurs(nom,email,telephone,codepostal,type_donateurs,photo_user,password) VALUES (?,?,?,?,?,?,?)");
		$insert->execute(array($nom,$email,$telephone,$codepostal,$type_donateurs,$photo_user,$mdp));
	}
	else
	{
		//header('Location: creer_compte.php');
		echo "<h1>Ce Mot de Passe Existe Deja </h1>";
	}	
}
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
	<!--footer -->
	

	<div class="row">
		<form class="col s12" method="POST" action="#">

		 <div class="col s2"></div>
		 <div class="col s8">
			<div class="row">
			<div class="input-field col s6">
					<input placeholder="Placeholder" id="nom"  name ="nom" type="text" class="validate">
					<label for="nom">Nom</label>
				</div>
				
				<div class="input-field col s6">
					<input placeholder="Placeholder" id="photo_user"  name ="photo_user" type="text" class="validate">
					<label for="photo_user">photo_user</label>
				</div>

				<div class="input-field col s6">
					<input id="telephone" type="text"  name ="telephone" class="validate">
					<label for="telephone">Telephone</label>
				</div>


				 <div class="input-field col s6">
					<input id="codepostal" type="text"  name ="codepostal" class="validate">
					<label for="codepostal">Code Postal</label>
				</div>
			
				<div class="input-field col s12">
					<input id="password" type="password"  name="password" class="validate">
					<label for="password">Password</label>
				</div>
			
			
				<div class="input-field col s12">
					<input id="email" type="email"  name="email" class="validate">
					<label for="email">Email</label>
				</div>
			
				

				<div class="input-field col s12">
					<input id="type_donateurs" name ="type_donateurs" type="text" class="validate">
					<label for="type_donateurst">Type Donateur</label>
				</div>
	
				
	<button class="btn waves-effect waves-light" type="submit" name="action">Submit
    <i class="material-icons right">send</i>
  </button>
			</div>
			</div>
			<div class="col s2"></div>
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
