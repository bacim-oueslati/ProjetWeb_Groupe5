f<?php

    require 'dbconnect.class.php';

    class reclam
    {
        private $cnx;

        public function __construct()
        {
            $db = new BasesDonnees;
            $this->cnx = $db->connectDB();
        }

        public function readAllReclamation()
        {
            try {
                $req = 'SELECT * FROM reclam';
                $result = $this->cnx->prepare($req);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function showOneReclamation($id_rec)
        {
            try {
                $req = 'SELECT * FROM reclam WHERE id_rec= :reclam_id';
                $result = $this->cnx->prepare($req);
                $result->bindParam(':reclam_id', $id_rec);
                $result->execute();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function addNewReclamation($reclamation, $type_rec,$Avis)
        {
            try {
                $sql = "INSERT INTO reclam(reclamation,type_rec,Avis) VALUES (:reclam_reclamation,:reclam_type_rec,:reclam_Avis)";
            $result = $this->cnx->prepare($sql);
            $result->bindparam(":reclam_reclamation", $reclamation);
            $result->bindparam(":reclam_type_rec", $type_rec);
            $result->bindparam(":reclam_Avis", $Avis);
            $result->execute();
            return $result;
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
        }

        public function updateReclamation($id_rec, $reclamation,$type_rec, $Avis)
        {
            try {
                $sql = 'UPDATE reclam
                        SET reclamation = :reclam_reclamation,
                            type_rec = :reclam_type_rec,
                            Avis = :reclam_Avis
                            
                        WHERE id_rec = :reclam_id';
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":reclam_id", $id_rec);
                $result->bindparam(":reclam_reclamation", $reclamation);
                $result->bindparam(":reclam_type_rec", $type_rec);
                $result->bindparam(":reclam_Avis", $Avis);
        
                $result->execute();
                return $result;

            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
        public function deleteReclamation($id_rec)
        {
            try {
                $sql = 'DELETE FROM reclam WHERE id_rec = :reclam_id';
                $result = $this->cnx->prepare($sql);
                $result->bindparam(":reclam_id", $id_rec);
                $result->execute();
                return $result;
            } catch (PDOException $exception) {
                echo $exception->getMessage();
            }
        }
    }