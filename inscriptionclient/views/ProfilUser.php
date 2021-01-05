<?php
// On prolonge la session
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: login.php');
   }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Utilisateur</title>
</head>
<body>
<button><a href="deconnexion.php">Déconnecter</a></button>
<hr>
<?php
// Il est bien connecté
echo 'Bienvenue Utilisateur ', $_SESSION['nom'].' '.$_SESSION['prenom'];
?>
</body>
</html>