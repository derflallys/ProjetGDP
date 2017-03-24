<?php
/**
 * Created by PhpStorm.
 * User: ABOUBACAR
 * Date: 18/03/2017
 * Time: 20:50
 */
setlocale(LC_ALL, 'en_US.UTF8');
define("SERVEUR","localhost:8080");
define("USER","root");
define("MDP","");
define("BD","projetgdp");

function connexionBd ($hote=SERVEUR,$username=USER,$mdp=MDP,$bd=BD){
    try {
        $connex= new PDO('mysql:host'.$hote.';dbname='.$bd,$username,$mdp);
        $connex->exec("SET CHARCTER SET utf8");
        $connex->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connex;
    } catch (Exception $e) {
        echo'Erreur : '.$e->getMessage().'<br/>';
        echo 'N° :'.$e->getCode();
        return null;
    }
}