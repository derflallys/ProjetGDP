<?php
session_start();
var_dump($_SESSION);
$id=isset($_SESSION['id'])? $_SESDION['id'] :'' ;
$password=isset($_SESSION['password'])? $_SESDION['password'] :'' ;
$email=isset($_SESSION['email'])? $_SESDION['email'] :'' ;




?>