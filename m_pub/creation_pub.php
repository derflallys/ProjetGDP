<?php session_start();
    $_SERVER['nom']="SYLLA";
    $_SERVER['adresse']="111 Rue de Coureilles";
    $_SERVER['codepostal']="17000";
    $_SERVER['email']="resto@gmail.com";
    $_SERVER['contrat']="true";
    $_SERVER['type_resto']="Fast-Food";
    $_SERVER['id_restaurant']=1;
    include "../core/connexionBd.php";
    $connexion=connexionBd();
    if(isset($_POST['valider']))
    {
        echo $_FILES['image']['name'];
        $sql="INSERT INTO projetgdp.publication(contenu, titre_publication, image_publication, date_publication, quantite, etat, duree_validite, publicateur)
        VALUES (:contenu,:titre,:image,:date_pub,:quantite,:etat,:duree,:idpub)";
        $pub=$connexion->prepare($sql);
        $pub->execute(array('contenu'=>$_POST['contenu'],'titre'=>$_POST['titre'],'image'=>"img/".$_FILES['image']['name'],'date_pub'=>date("Y-m-d H:i:s"),'quantite'=>$_POST['quantite'],'etat'=>$_POST['etat'],'duree'=>$_POST['duree'],'idpub'=>$_SERVER['id_restaurant']));
    }

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Creer Publication</title>

    <!-- CSS  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../core/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="../core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
<!--footer -->
<?php include "../core/header.php" ;?>
    <div class="container">
        <div class="row">
            <form class="col s12" action="#" method="post">
                <div class="col s2"></div>
                <div class="col s8">
                    <div class="row">
                        <h3> Creer votre publication </h3>
                        <div class="input-field col s12">
                            <input id="titre" type="text" name="titre" class="validate" required>
                            <label class="active" for="titre">Titre</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="quantite" type="number" name="quantite" min="0" class="validate" required>
                            <label class="active" for="quantite">Quantite</label>
                        </div>

                        <div class="input-field col s12">
                            <input id="validite" type="number" name="duree" min="0" placeholder="Duree en Jour" class="validate" required>
                            <label class="active" for="validite">Duree de Validite</label>
                        </div>
                        <div class="input-field col s12">
                            <select name="etat">
                                <option value="" disabled selected>Choisir un etat</option>
                                <option value="tres_bon">Tres Bon</option>
                                <option value="bon">Bon</option>
                                <option value="mauvais">Mauvais</option>
                            </select>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Image</span>
                                <input type="file" name="image" accept="image/*" >
                            </div><!--
                            <div class="file-path-wrapper">
                                <input class="file-path validate" name="image" type="text">
                            </div> -->
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description" name="contenu" class="materialize-textarea" required></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="input-field col s12">
                            <div class="col s6">
                                <button class="btn waves-effect waves-light grey darken-2" type="submit" name="valider">Publier
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div class="col s6">
                                <button class="btn waves-effect waves-light grey darken-2" type="reset" name="reset">Reset
                                    <i class="material-icons">eject</i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s2"></div>
            </form>
        </div>
    </div>

<?php include "../core/footer.php" ;?>
</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="../core/js/materialize.js"></script>
<script src="../core/js/init.js"></script>
<script src="../core/js/monjs.js"></script>


</html>
