<?php

include "../../entities/panier.php";
include "../../core/panierC.php";
include "../../entities/produit.php";
include "../../core/produitC.php";

$id=$_GET['id'];

$panier1C= new panierC();
$panier=$panier1C->retrievePanierById(1,$id);
$row  = $panier -> fetch();
$qt=$row['quantite']+1;

$produit1C= new produitC();
$produit=$produit1C->retrieveProductById($id);
$row1  = $produit -> fetch();
$qtA=$row1['qt'];





if ($qtA-$qt>=0)
{
$panier1C->editPanier(1,$id,$qt);
$message="PM";
header("location:panier.php?message=".$message);
}
else {
$message="SI";
header("location:panier.php?message=".$message);
}
?>