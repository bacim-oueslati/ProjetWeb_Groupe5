<?php
include "../../entities/commande.php";
include "../../core/commandeC.php";

$id=$_GET['id'];

$commande1C=new commandeC();
$commande1C->editCommande($id,"Acceptee");
header("location:liste-commandes.php");
?>