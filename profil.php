<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style-formulaire/myprofil.css" />
</head>
<body>
    

<!--Début Barre de Naviguation --->
<nav>
                <div class="Onglet">
                <li> <a href="index.php">Accueil</a></li>
                    <li> <a href="inscription.php">Inscription</a></li>
                    <li> <a href="deconnexion.php">Se déconnecter</a></li>
                </div>
            </nav>
<!--Fin Barre de Naviguation --->

<!--Début Du Header ---> <header>
<h1>Bienvenue sur votre profil</h1>
</header>
<!--Fin Du Header --->
<?php
require ("config.php");
    session_start();
    if(isset($_SESSION['succes'])){
    $id=$_SESSION['identifiant'];
    $sql=mysqli_query($connexion,"SELECT nom,prenom,login,password FROM utilisateurs WHERE id='$id'");
    $array =mysqli_fetch_all($sql);
    $nom= $array[0][0];
    $prenom=$array[0][1];
    $login=$array[0][2];
    $password=$array[0][3];
    if(isset($_POST['Send'])){
    if($_POST['name']!=$nom || $_POST['prenom']!= $prenom || $_POST['login'] != $login || $_POST['mdp'] != $password) {
    $name=$_POST['name'];
    $subname=$_POST['prenom'];
    $loging=$_POST['login'];
    $mdp=$_POST['mdp'];
        $modif=mysqli_query($connexion,"UPDATE utilisateurs SET prenom='$subname', nom='$name', login='$loging', password='$mdp'  WHERE  id = '$id'");
        unset ($_POST['Send']);
        header("Refresh:4;url=index.php");

        
    }
    else{
        echo 'Validez le formulaire uniquement si vous voulez changer des données';
    }
    }
}
?>


<form class="box" action="#" method="POST">
    <h1 class="box-logo box-title"><img src="images/Fabcod.gif" width ="80px" height="80px"></a></h1>
    <h1 class="box-title">Modification de vos données</h1>
    <input type=text class="box-input" name="login" placeholder="Nom d'Utilisateur" required><br>
        <input type=text class="box-input" name="prenom"  placeholder="prenom" required><br>
        <input type=text class="box-input" name="nom" placeholder="nom" required><br>
        <input type=password class="box-input" name="mdp" placeholder="Mot de Passe"required><br>
        <input type="submit" value="Enregistrer" class="box-button" name="Send">
</form>


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
