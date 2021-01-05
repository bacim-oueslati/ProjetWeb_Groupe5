<?php

include "../../entities/panier.php";
include "../../core/panierC.php";

$id=$_GET['id'];

$panier1C= new panierC();
$panier=$panier1C->retrievePanierById(1,$id);
$row  = $panier -> fetch();
$qt=$row['quantite'];
if ($qt<=1)
header("location:panier.php");
else {
$nqt=$qt-1;
$panier1C->editPanier(1,$id,$nqt);
$message="PM";
header("location:panier.php?message=".$message);
}
?>