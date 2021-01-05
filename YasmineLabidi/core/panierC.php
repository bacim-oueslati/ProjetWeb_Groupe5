<?php 
include_once "D:\wamp64\www\Achref\Project2\config.php";
class panierC{

function addPanier($panier){
        
        $sql="insert into panier (id,idClient,idProduit,quantite) values (:id,:idClient,:idProduit,:quantite)";
        $db = config::getConnexion();
        try{
        //$db->prepare prépare la requète sql à l'affectation des données avec bindvalue
        $req=$db->prepare($sql);
        //On utilise les getters car les attributs des classes sont de type private
        $id=$panier->get_id();
        $idClient=$panier->get_idClient();
        $idProduit=$panier->get_idProduit();
        $quantite=$panier->get_quantite();
       
         
    

        //On utilise bindValue pour éviter la faille de sécurité SQL Injection !!!!!! IMPORTANT !!!!!!! Question fréquente
        $req->bindValue(':id',$id);
        $req->bindValue(':idClient',$idClient);
        $req->bindValue(':idProduit',$idProduit);
        $req->bindValue(':quantite',$quantite);
        
        
        
        //$req->execute() execute la requête
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

      }
          function retrievePaniers($id){

        $sql="SELECT * From panier WHERE idClient='$id'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    function retrievePanierById($id,$idProduit){

        $sql="SELECT * From panier WHERE idClient='$id' AND idProduit='$idProduit'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function deletePanier($id,$idClient){
        $sql="DELETE FROM `panier` WHERE `idProduit` = '$id' AND `idClient` = '$idClient'";
            $db = config::getConnexion();
        try{
       $db->query($sql);
            }
         catch (Exception $e){
         die('Erreur: '.$e->getMessage());
        }
    }
    function editPanier($idClient,$idProduit,$quantite){
        $sql="UPDATE panier SET quantite='$quantite' where idClient='$idClient' AND idProduit='$idProduit'";
         $db = config::getConnexion();
        try{
       $db->query($sql);
            }
         catch (Exception $e){
         die('Erreur: '.$e->getMessage());
        }
    }
        function countPanier($idClient){

        $sql="SELECT COUNT(*) as total FROM panier WHERE idClient='$idClient'";
        $connection = mysqli_connect("localhost", "root", "","project2");
        try{
        $result=mysqli_query($connection,$sql);
        $data=mysqli_fetch_assoc($result);
        return $data;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function clearPanier($idClient){
        $sql="DELETE FROM `panier` WHERE `idClient` = '$idClient'";
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
