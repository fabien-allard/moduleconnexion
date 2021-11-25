<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-formulaire/forminscription.css">
    <title>Formulaire-Inscription</title>
</head>


<body>
    <nav>
                <div class="Onglet">
                <li><a href="index.php">Accueil</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="profil.php">Profils</a></li>
                </div>
            </nav>
    
<!--Début Du Header ---> <header>
<h1>Bienvenue sur le Formulaire d'inscription</h1>
</header>
<!--Fin Du Header --->

<div>
<?php
    require('config.php');
    if(isset($_POST['Send'])){
    if (mysqli_connect_errno()) {
        echo "Erreur de connexion à la bdd" . mysqli_connect_error();
    }
    elseif($_POST['mypass'] == $_POST['confirm_password']){
    $nom=$_POST['name'];
    $firstname=$_POST['firstname'];
    $mylog=$_POST['mylog'];
    $mypass = $_POST['mypass'];
    $logutilise=mysqli_query($connexion,"SELECT login FROM utilisateurs WHERE login='$mylog'");
    if($logutilise->num_rows == 0){
    $sql=mysqli_query($connexion,"INSERT INTO utilisateurs(nom ,prenom,login,password)
    VALUES('$nom','$firstname','$mylog','$mypass')");
    echo "Enregistrement de l'inscription réussit ! vous allez être rediriger vers la page de connexion";
    header("Refresh: 4;url=connexion.php");
    }
    else{
    echo "Nom d'utilisateur déjà utilisé";
        }
    }
}

?>
</div>


<!--debut du formulaire --->
<form class="box" action="#" method="POST">
    <h1 class="box-logo box-title"><img src="images/Fabcod.gif" width ="80px" height="80px"></a></h1>
    <h1 class="box-title">S'inscrire</h1>
    <input type=text class="box-input" name="mylog" placeholder="Nom d'Utilisateur" required><br>
        <input type=text class="box-input" name="firstname"  placeholder="prenom" required><br>
        <input type=text class="box-input" name="name" placeholder="nom" required><br>
        <input type=password class="box-input" name="mypass" placeholder="Mot de Passe"required><br>
        <input type=password class="box-input" name="confirm_password" placeholder="Confirmation  du Mot de Passe" required><br>
        <input type="submit" value="S'inscrire" class="box-button" name="Send">
        <p>Déjà inscrit ? Connectez-vous <a href="connexion.php">ici</a></p>
    </form>

</form>



<footer>
    <div class="contenu-footeur">
        <hr style="height: 1px; color: rgb(22, 172, 177); width: 100%; border: 1px straight #000;">
            <h3>Contact</h3>
            <p>Tel: 0487546547</p>
            <div>
            <p>Emails: Marseille13@laplateforme.io</p>
            <p>Adresse: 8 Rue d'Hozier</p>
            <p>Ville: Marseille 13002</p>
            <hr style="height: 1px; color: rgb(22, 172, 177); width: 100%; border: 1px straight #000;">
            <p>Copyright © 2021-2022 </p>
            <p>All rights reserved.</p>
            <p>Created by DreamCod !</p>
</div>
</div>
</footer>
<!-----Fin du Footeur-->
</body>
</html>