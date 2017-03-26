<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Accueil</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="core/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="core/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>


</head>
<body>
<!--footer -->
<?php include "core/header_home.php" ;?>

<!-- -->
  <div id="index-banner" class="parallax-container">
    <div class="section no-pad-bot">
      <div class="container">
        <br><br>
          <br><br><br><br><br><br>
        <div class="row center">
          <h2 class="header col s12  light" style=" color: rgb(128,128,128)">Luttons contre le gaspillage alimentaire</h2>
        </div>
        <br><br>
          
      </div>
    </div>
    <div class="parallax"><img src="core/img/background.jpeg" alt="Solidarite"></div>
  </div>




 <div class="container" id="apropos">
    <div class="section">

      <div class="row">
        <div class="col s12 center">
          <h3><i class="mdi-content-send brown-text"></i></h3>
          <h4 style=" color: rgb(112,63,63)">A propos</h4>
          <p class="left-align light">Notre problématique consiste à éradiquer le fait que les fournisseurs de produits alimentaires tel que les restaurants, les fast-food et les supermarchés jettent leur excès de produits à la poubelle.
          Cette plateforme est destinée à mettre en relation les associations sociales  qui ont pour but d’aider et d’apporter une assistance bénévole aux personnes démunies, notamment dans le domaine alimentaire par l'accès à des repas ou produits alimentaires gratuits, et les fournisseurs de produits alimentaires.</p>
        </div>
      </div>

    </div>
  </div>
    
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h3 class="header col s12 light" style=" color: rgb(128,128,128)">Une plateforme interactive de communication</h3>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="core/img/p1.jpg" alt="Unsplashed background img 2"></div>
  </div>

   <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">flash_on</i></h2>
            <h5 class="center"  style=" color: rgb(112,63,63)">Publications rapides des nouvèlles en temps réel</h5>

            <p class="light">Les fournisseurs de produits alimentaires tel que les restaurants, les supermarchés et les fast food peuvent publier pour dire que des produits sont disponibles.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">group</i></h2>
            <h5 class="center" style=" color: rgb(112,63,63)">Entrez en contact avec d'autres organisations</h5>
            <p class="light">Soyez en collaboration avec un ou plusieurs organisations avec ou sans contrat selon vos préférences.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center brown-text"><i class="material-icons">settings</i></h2>
            <h5 class="center" style=" color: rgb(112,63,63)">Gérer vos publications</h5>
          
            <p class="light">Concernant les fournisseurs, Vous pouvez connaitre la liste des donateurs qui ont répondu à une publication et entrer en contact avec eux.</p>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php include "core/footer.php" ;?>
<!--Modal Connexion -->
<?php include "core/mes_modals.php";?>



</body>
<!--  Scripts-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="core/js/materialize.js"></script>
<script src="core/js/init.js"></script>
<script src="core/js/monjs.js"></script>
</html>
