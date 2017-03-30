<?php
session_start();
include "../core/connexionBd.php";
include "../core/utile.php";
$connexion = connexionBd();
$bd= BD;



//Donateurs
if(isset($_POST['action'])){

    $sql = "UPDATE $bd.fournisseurs SET nom_restaurant=:nom_restaurant ,adresse_restaurant=:adresse_restaurant,codepostal=:codepostal,email=:email,contrat=:contrat, password=:password where id_restaurant=:id ";
    $updatedona=$connexion->prepare($sql);
    
		if (empty($_POST['password'])) {
		
	    $updatedona->execute(array('nom_restaurant'=>$_POST['nom_restaurant'],'adresse_restaurant'=>$_POST['adresse_restaurant'],'codepostal'=>$_POST['codepostal'],'email'=>$_POST['email'],'contrat'=>$_POST['contrat'],'password'=>$_SESSION['password'],'id'=>$_SESSION['id_restaurant']));
		  }
		  else
		  {
		  	$mdp=hash('sha256',$_POST['password']);
		  	 $updatedona->execute(array('nom_restaurant'=>$_POST['nom_restaurant'],'adresse_restaurant'=>$_POST['adresse_restaurant'],'codepostal'=>$_POST['codepostal'],'email'=>$_POST['email'],'contrat'=>$_POST['contrat'],'password'=>$_SESSION['password'],'id'=>$_SESSION['id_restaurant']));
		  }
		
	



header('location:Informations_restaurant.php');

}    //print_r($res_dona);
?>

