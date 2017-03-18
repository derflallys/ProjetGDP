<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Parallax Template - Materialize</title>

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
            <form class="col s12">
                <div class="col s2"></div>
                <div class="col s8">
                    <div class="row">
                        <div class="input-field col s12" hidden="true">
                            <input id="titre" type="text" class="validate" >
                            <label for="titre">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input type="date" class="datepicker" name="date">
                            <label class="active" for="quantite">Date</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="quantite" type="number" min="0" class="validate" >
                            <label class="active" for="quantite">Quantite</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="validite" type="number" min="0" placeholder="Duree en Jour" class="validate" >
                            <label class="active" for="validite">Duree de Validite</label>
                        </div>
                        <div class="file-field input-field col s12">
                            <div class="btn">
                                <span>Image</span>
                                <input type="file" name="image" accept="image/*" >
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="description" class="materialize-textarea" ></textarea>
                            <label for="description">Description</label>
                        </div>
                        <div class="input-field col s12">
                            <div class="col s6">
                                <button class="btn waves-effect waves-light grey darken-2" type="submit" name="action">Publier
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>
                            <div class="col s6">
                                <button class="btn waves-effect waves-light grey darken-2" type="reset" name="action">Reset
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
