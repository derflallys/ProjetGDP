
<?php 
session_start();
require_once("../core/connexionBd.php");
include "../core/utile.php";
$connexion = connexionBd();
$bd=BD;


if(isset($_POST['action'])){

$nom_restaurant=$_POST['nom_restaurant'];
$adresse_restaurant=$_POST['adresse_restaurant'];
$codepostal=$_POST['codepostal'];
    $password=hash('sha256',$_POST['password']);
$email=$_POST['email'];
    $tel=$_POST['telephone'];
$type_restaurant=$_POST['type_restaurant'];
//$tel=$_POST['tel'];
$contrat=$_POST['contrat'];




$veriff=MaildansBase($email,"fournisseurs");
$mdp=hash('sha256',$_POST['password']);

if ($veriff) {

$insert=$connexion->prepare(" INSERT INTO $bd.fournisseurs(nom_restaurant, adresse_restaurant, codepostal, email, contrat,type_restaurant,password,tel) VALUES (?,?,?,?,?,?,?,?)");
$insert->execute(array($nom_restaurant,$adresse_restaurant,$codepostal,$email,$contrat,$type_restaurant,$password,$tel));
}
else{
	$_SESSION['erreur_ins']="Cet email appartient deja à quelqu'un !";
	//echo "<h1>Ce Mot de Passe Existe Deja </h1>";
	}
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<title>Inscription Fournisseurs</title>

	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="../core/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	<link href="../core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>
	<!--footer -->
	<?php include "../core/header_ins.php" ;
		echo '<h1>'; 
		if(isset($_SESSION['erreur_ins']))
			{
				echo $_SESSION['erreur_ins'];
				 unset($_SESSION['erreur_ins']);
			} 
		echo '</h1>';
	?>
<div class="container">
	 <div class="col s8 offset-s2">
             <form class="col s12" method="POST" action="#">
			<div class="row">
                <h4 class="center">Inscription Fournisseurs</h4>
				<div class="input-field col s12">
					<input placeholder="Nom Fournisseur" id="nom_restaurant"  name ="nom_restaurant" type="text" class="validate" required>
					<label for="nom">Nom</label>
				</div>
				
				<div class="input-field col s6">
					<input  id="adresse_restaurant"  name ="adresse_restaurant" type="text" class="validate" required>
					<label for="adresse">Adresse</label>
				</div>
				<div class="input-field col s6">
					<input id="codepostal" type="text"  name ="codepostal" class="validate" required>
					<label for="codepostal">Code Postal</label>
				</div>
                <div class="input-field col s12">
                    <input id="telephone" type="text"  name ="telephone" class="validate" required>
                    <label for="codepostal">Telephone</label>
                </div>
                <div class="input-field col s6">
                    <input id="email" type="email"  name="email" class="validate" required>
                    <label for="email">Email</label>
                </div>
				<div class="input-field col s6">
					<input id="password" type="password"  name="password" class="validate" required>
					<label for="password">Password</label>
				</div>

				<div class="input-field col s12">
					<input id="type_restaurant" name ="type_restaurant" type="text" class="validate" required>
					<label for="type_restaurant">Type de Restaurant</label>
                </div>
                <div class="input-field col s12">
                    <select name="contrat" required>
                        <option value="" disabled selected>Comment donnez vous ?</option>
                        <option value="true">Avec Contrat</option>
                        <option value="false">Sans Contrat</option>
                    </select>
                </div>
                <div class="col s12 center">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
                    <i class="material-icons right">send</i>
                    </button>
                </div>
			</div>
             </form>
         </div>
</div>
    <!--Modal Connexion -->
    <?php include "../core/mes_modals.php";?>
        

<?php include "../core/footer.php" ;?>

<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>
</body>



</html>