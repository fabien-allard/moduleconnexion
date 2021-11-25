<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style-formulaire/admin.css" />
</head>
<body>
  <!--Début Barre de Naviguation --->
<nav>
<div>
        <li><a href="index.php"><img src="images/Fabcod.gif" alt="Logo" width="120px" height="120px"></a></li>
    </div>
                <div class="Onglet">
                    <li> <a href="inscription.php">Inscription</a></li>
                    <li> <a href="Connexion.php">Connexion</a></li>
                    <li> <a href="Profil.php">Profils</a></li>
                    <li> <a href="Admin.php">Admin</a></li>
                </div>
            </nav>
<!--Fin Barre de Naviguation --->
<?php
require ('config.php');
?>

<!--Début Du Header ---> <header>
<h1>Bienvenue sur la Page Admin</h1>
</header>
<!--Fin Du Header --->
<?php
  session_start();
    require 'config.php';
    if($_SESSION['admin']=="1"){
    $sql=mysqli_query($connexion,"SELECT * FROM utilisateurs");
    $array =mysqli_fetch_all($sql);
    echo "-id-|-login-|-prenom-|-nom-|-mdp-|<br>";
  foreach($array as $colonne => $contenu){
  for($i=0; isset($contenu[$i]);$i++){
    echo $contenu[$i]," ";
  }
    echo "<br>";
  }
    echo '<a href="deconnexion.php">Déconnexion</a>';
}
  else{
      echo "Accès Interdit !!!";
      header("Refresh:2 url=connexion.php");
}
  ?>
<div>
<section class="Liste-users">
  <h1>Liste des Utilisateurs qui ont créé un compte</h1>
</section>
</div>
</div>
<footer>
    <div class="contenu-footeur">
        <hr style="height: 1px; color: rgb(22, 172, 177); width: 100%; border: 1px straight #000;">
            <h3>Contact</h3>
            <p>Tel: 0487546547</p>
            <div>
            <p>Emails: Marseille13@laplateforme.io</p>
            <p>Adresse: 8 Rue d'Hozier</p>
            <p>Marseille 13002</p>
            <hr style="height: 1px; color: rgb(22, 172, 177); width: 100%; border: 1px straight #000;">
            <p>Copyright © 2021-2022 </p>
            <p>All rights reserved.</p>
            <p>Created by DreamCod !</p>
</div>
</div>
</div>
</footer>
<!-----Fin du Footeur-->
</body>
</html>