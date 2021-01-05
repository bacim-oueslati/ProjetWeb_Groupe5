<?php 
include_once "D:\wamp64\www\Achref\Project2\config.php";
class userC{

    function retrieveUserById($id){

        $sql="SELECT * From user WHERE id='$id'";
        $db = config::getConnexion();
        try{
        $liste=$db->query($sql);
        return $liste;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}
 ?>
