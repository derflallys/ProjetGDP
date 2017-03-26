<?php
function tronquer_texte($texte,$longueur_max =100)
{
	if(strlen($texte)>$longueur_max)
	{
		$texte= substr($texte,0,$longueur_max);
		$texte .="...";
	}
	return $texte;
}
function MaildansBase($mail,$table)
{
	$connexion = connexionBd();
	$bd=BD;
	$sql="SELECT email from $bd.$table ";
	$resultat=$connexion->query($sql);

	

	$res = $resultat->fetchAll(PDO::FETCH_ASSOC);
		//print_r($res);
	 $verif=true;
	foreach ($res as $key => $value) {
		
		if(strcmp($value['email'],$mail)==0)
		{	
			//print_r("false");
			$verif =false ;
		}

	}

	return $verif;
}
?>