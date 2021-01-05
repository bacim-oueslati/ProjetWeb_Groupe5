<?php
include "../../entities/commande.php";
include "../../core/commandeC.php";
include "../../entities/panier.php";
include "../../core/panierC.php";
include "../../entities/produitCommande.php";
include "../../core/produitCommandeC.php";
include "../../entities/produit.php";
include "../../core/produitC.php";

$prix=$_GET['tot'];
$date=date("yy/m/d");
$etat="Recue";

$commande= new commande(0,1,$prix,$etat,$date);
$commande1C= new commandeC();
$commande1C->addCommande($commande);



$commandeP=$commande1C->retrieveCommande(1,$etat);
$row  = $commandeP -> fetch();
$idCommande=$row['id'];




$panier1C=new panierC();
$panier=$panier1C->retrievePaniers(1);

$produitCommande1C= new produitCommandeC();
$produit1C=new produitC();

foreach ($panier as $row1) {

$idProduit=$row1['idProduit'];
$quantite=$row1['quantite'];



$produitCommande= new produitCommande(0,$idProduit,$idCommande,$quantite);
$produitCommande1C->addProduitCommande($produitCommande);

$produit=$produit1C->retrieveProductById($idProduit);
$row2  = $produit -> fetch();
$qt=$row2['qt'];
$nQt=$qt-$quantite;
$produit1C->editProduct($idProduit,$nQt);

}
$panier1C->clearPanier(1);
header("location:thankyou.php");

?>