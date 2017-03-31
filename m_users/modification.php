<?php
session_start();
include "../core/connexionBd.php";
include "../core/utile.php";
$connexion = connexionBd();
$bd= BD;



//Donateurs
if(isset($_POST['action'])){

    $sql = "UPDATE $bd.donateurs SET nom=:nom ,email=:email,telephone=:telephone,codepostal=:codepostal,adresse=:adresse,type_donateurs=:type_donateurs, password=:password where id_donateu=:id ";
    $updatedona=$connexion->prepare($sql);
    
		if (empty($_POST['password'])) {
		
	    $updatedona->execute(array('nom'=>$_POST['nom'],'email'=>$_POST['email'],'telephone'=>$_POST['telephone'],'codepostal'=>$_POST['codepostal'],'adresse'=>$_POST['adresse'],'type_donateurs'=>$_POST['type_donateurs'],'password'=>$_SESSION['password'],'id'=>$_SESSION['id_donateur']));
		  }
		  else
		  {
		  	$mdp=hash('sha256',$_POST['password']);
		  	 $updatedona->execute(array('nom'=>$_POST['nom'],'email'=>$_POST['email'],'telephone'=>$_POST['telephone'],'codepostal'=>$_POST['codepostal'],'adresse'=>$_POST['adresse'],'type_donateurs'=>$_POST['type_donateurs'],'password'=>$mdp,'id'=>$_SESSION['id_donateur']));
		  }
		}
	
	


header('location:Informations.php');

   //print_r($res_dona);








