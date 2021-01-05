<?php
include "../../entities/panier.php";
include "../../core/panierC.php";
$id=$_GET['id'];
$panier1C=new panierC();
$panier1C->deletePanier($id,1);
$message="PR";
header("location:panier.php?message=".$message);
?>