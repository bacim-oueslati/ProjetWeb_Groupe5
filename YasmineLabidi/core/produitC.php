<?php 
include_once "D:\wamp64\www\Achref\Project2\config.php";
class produitC{

      function retrieveProducts(){

        $sql="SELECT * From produit";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function retrieveProductById($id){

        $sql="SELECT * From produit WHERE id='$id'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
        function editProduct($idProduit,$quantite){
        $sql="UPDATE produit SET qt='$quantite' where  id='$idProduit'";
         $db = config::getConnexion();
        try{
       $db->query($sql);
            }
         catch (Exception $e){
         die('Erreur: '.$e->getMessage());
        }
    }
}
 ?>
