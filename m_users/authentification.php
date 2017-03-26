<?php


session_start();



include "../core/connexionBd.php";


$connexion = connexionBd();
$bd=BD;

if (isset($_POST['connect'])) 
{
	$sql="SELECT * from $bd.donateurs where email=:email AND password=:password";
	$resultat=$connexion->prepare($sql);
	$mdp=hash('sha256',$_POST['password']);
	echo $mdp;

	 $resultat->execute(array('email'=>$_POST['email'] ,'password'=>$mdp ));
	$res = $resultat->fetchAll(PDO::FETCH_ASSOC);


		if (!empty($res)) {

            foreach ($res as $key => $value) {

                $_SESSION['id'] = $value['id'];
                $_SESSION['email'] = $value['email'];
                $_SESSION['password'] = $value['password'];
                
            }
            echo "bon";
            header('Location:../m_pub/affichePublication.php');
		}
		else {

			$_SESSION['donateurs']['error']="Login ou Mot de passe Incorrect";
			echo "mauvais login";
		}
}
else
{
	echo "mauvais";
}
?>