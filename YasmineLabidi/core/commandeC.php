<?php 
include_once "D:\wamp64\www\Achref\Project2\config.php";
class commandeC{

function addCommande($commande){
        
        $sql="insert into commande (id,idClient,prixTotal,etat,date) values (:id,:idClient,:prixTotal,:etat,:date)";
        $db = config::getConnexion();
        try{
        //$db->prepare prépare la requète sql à l'affectation des données avec bindvalue
        $req=$db->prepare($sql);
        //On utilise les getters car les attributs des classes sont de type private
        $id=$commande->get_id();
        $idClient=$commande->get_idClient();
        $prixTotal=$commande->get_prixTotal();
        $etat=$commande->get_etat();
        $date=$commande->get_date();

       
         
    

        //On utilise bindValue pour éviter la faille de sécurité SQL Injection !!!!!! IMPORTANT !!!!!!! Question fréquente
        $req->bindValue(':id',$id);
        $req->bindValue(':idClient',$idClient);
        $req->bindValue(':prixTotal',$prixTotal);
        $req->bindValue(':etat',$etat);
        $req->bindValue(':date',$date);        
        
        
        //$req->execute() execute la requête
            $req->execute();

        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }

      }

    function retrieveCommandes(){

        $sql="SELECT * From commande";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

        function retrieveCommande($idUser,$etat){

        $sql="SELECT * From commande WHERE  idClient='$idUser' AND etat='$etat'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function editCommande($id,$etat){
        $sql="UPDATE commande SET etat='$etat' where id='$id'";
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
