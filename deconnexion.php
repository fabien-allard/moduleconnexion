<?php
//initialiser la session
session_start();
unset($_SESSION['succes']);
unset($_SESSION['identifiant']);
unset($_SESSION['admin']);
//détruire la session
session_destroy();
echo 'Chargement....';
{
    //redirection vers la page d'accueil
    header("Refresh:2;url=index.php");
}
?>