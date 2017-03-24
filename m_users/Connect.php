<?php

try {

$db = new PDO('mysql:host=localhost;dbname=projetgdp','root','');
$db->exec("SET CHARACTER SET utf8");
//$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
echo "connexion reussi sur la base de donnée";

//$db->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_WARNING);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
//$db->setAttribute(PDO::ATTR_DEFAULT_ERRMODE,PDO::ERRORMODE_WARNING);
return $db;

} 
catch (Exception $e) {
	echo 'Impossible de se connecter a la base de donnees';
	//echo $e->getMessage();
die();
}

?>