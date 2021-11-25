<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-formulaire/maconnexion.css">
    <title>Connexion</title>
</head>

<body>
<nav>
                <div class="Onglet">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                    <li><a href="profil.php">Profils</a></li>
                    <li><a href="admin.php">Admin</a></li>
                </div>
            </nav>
<!--Début Du Header ---> <header>
<h1>Bienvenue sur le Formulaire de Connexion</h1>
</header>
<!--Fin Du Header --->

<?php
    require('config.php');
    if(isset($_POST['Send'])){
        $login=$_POST['login'];
        $monpw=$_POST['pass'];
        $sql=mysqli_query($connexion,"SELECT id,password,prenom FROM utilisateurs WHERE login='$login' AND password='$monpw'");
        $array =mysqli_fetch_all($sql);
        if($array[0]==0){
            echo"Nom d'utilisateur ou mot de passe incorrect";
        }
        //debut de session d'utilisateur admin
        elseif($array[0][2]=="admin"){
            echo "Redirection vers la page admin";
            session_start();
            $_SESSION['admin']=1;
            $_SESSION['succes']=1;
            $_SESSION['identifiant']=$array[0][0];
            header("Refresh:4; url=admin.php");
        }
        //sinon debut de session utlisateur
        else{
                session_start();
                $_SESSION['succes']=1;
                $_SESSION['identifiant']=$array[0][0];
                echo "Bienvenue ",$array[0][2];
                header("Refresh:4; url=profil.php");
            }
}
?>

<form class="box" action="#" method="POST" name="login">
<h1 class="box-logo box-title"><img src="images/Fabcod.gif" width ="80px" height="80px"></h1>
<h1 class="box-title">Connexion</h1>
<input type="text" class="box-input" name="login" placeholder="Nom d'utilisateur">
<input type="password" class="box-input" name="pass" placeholder="Mot de passe">
<input type="submit" value="Connexion " name="Send" class="box-button">
<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire ici !</a></p>
</form>


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