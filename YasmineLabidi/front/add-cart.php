<?php 

include "../../entities/panier.php";
include "../../core/panierC.php";
include "../../entities/produit.php";
include "../../core/produitC.php";

$qt=$_POST['qt'];
$id=$_GET['id'];

$produit1C= new produitC();
$produit=$produit1C->retrieveProductById($id);
$row  = $produit -> fetch();
if ($row['qt'] >= $qt){
$panier1C= new panierC();
$panier=$panier1C->retrievePanierById(1,$id);
if ($panier->rowCount() == 0)
	{
		$panierToAdd= new Panier(0,1,$id,$qt);
		$panier1C->addPanier($panierToAdd);
		$message="PA";
		header("location:panier.php?message=".$message);
	}
else
	{
		$row  = $panier -> fetch();
		$qtNew=$row['quantite']+$qt;
		$panier1C->editPanier(1,$id,$qtNew);
		$message="PM";
		header("location:panier.php?message=".$message);
	}
}
else
{
	$message="SI";
	header("location:fiche-produit.php?id=".$id."&message=".$message);
}
?>