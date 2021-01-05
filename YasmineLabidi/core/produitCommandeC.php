<?php 
include_once "D:\wamp64\www\Achref\Project2\config.php";
class produitCommandeC{

function addProduitCommande($produitCommande){
        
        $sql="insert into produitcommande (id,idProduit,idCommande,quantite) values (:id,:idProduit,:idCommande,:quantite)";
        $db = config::getConnexion();
        try{
        //$db->prepare prépare la requète sql à l'affectation des données avec bindvalue
        $req=$db->prepare($sql);
        //On utilise les getters car les attributs des classes sont de type private
        $id=$produitCommande->get_id();
        $idProduit=$produitCommande->get_idProduit();
        $idCommande=$produitCommande->get_idCommande();
        $quantite=$produitCommande->get_quantite();
    

       
         
    

        //On utilise bindValue pour éviter la faille de sécurité SQL Injection !!!!!! IMPORTANT !!!!!!! Question fréquente
        $req->bindValue(':id',$id);
        $req->bindValue(':idProduit',$idProduit);
        $req->bindValue(':idCommande',$idCommande);
        $req->bindValue(':quantite',$quantite);      
        
        
        //$req->execute() execute la requête
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

      }

  function retrieveProduitCommande($id){

        $sql="SELECT * From `produitcommande` WHERE idCommande='$id'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    /*
    function retrieveCommandeValides(){

        $sql="SELECT * From commande WHERE etat='validee'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

        function retrieveCommande($idUser,$prix,$etat){

        $sql="SELECT * From commande WHERE etat='$etat' AND idClient='$idUser' AND prixTotal='$prix'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
*/
}
 ?>
