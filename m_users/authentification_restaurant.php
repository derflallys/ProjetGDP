<?php


session_start();



include "../core/connexionBd.php";


$connexion = connexionBd();
$bd=BD;

if (isset($_POST['connect'])) 
{
	$sql="SELECT * from $bd.fournisseurs where email=:email AND password=:password";
	$resultat=$connexion->prepare($sql);
	$mdp=hash('sha256',$_POST['password']);
	//echo $mdp;

	 $resultat->execute(array('email'=>$_POST['email'] ,'password'=>$mdp ));
	$res = $resultat->fetchAll(PDO::FETCH_ASSOC);


		if (!empty($res)) {

            foreach ($res as $key => $value) {

                $_SESSION['id_four'] = $value['id_restaurant'];
                $_SESSION['id_restaurant'] = $value['id_restaurant'];
                $_SESSION['email'] = $value['email'];
                $_SESSION['password'] = $value['password'];
                $_SESSION['user'] = 'fournisseurs';
            }
            echo "bon";
            header('Location:../m_pub/mesdemandes.php');
		}
		else {

			$_SESSION['fournisseurs']['error']="Login ou Mot de passe Incorrect";
			echo "mauvais login";
		}
}
else
{
	echo "mauvais";
}
?>




