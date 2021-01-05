<?PHP
	include "../config.php";
	require_once '../Model/admin.php';

	class adminC {

        function ajouteradmin($admin){
            $sql="INSERT INTO admin (nom, prenom, age, email, login, password) 
			VALUES (:nom,:prenom,:age,:email, :login, :password)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'nom' => $admin->getNom(),
                    'prenom' => $admin->getPrenom(),
                    'age' => $admin->getAge(),
                    'email' => $admin->getEmail(),
                    'login' => $admin->getLogin(),
                    'password' => $admin->getPassword()
                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }
        function connexionUser($email,$password){
            $sql="SELECT * FROM admin WHERE Email='" . $email . "' and password = '". $password."'";
            $db = config::getConnexion();
            $x=null;
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    // $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    //$message = $x['role'];
                }
            }
            catch (Exception $e){
                $message= " ".$e->getMessage();
            }
            return $x;
        }


        function entiteadmin(){

            $sql="SELECT * FROM admin";

            $db = config::getConnexion();
            try{
                $liste = $db->query($sql);
                return $liste;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }

        function afficheradmin(){
			
			$sql="SELECT * FROM admin";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimeradmin($id){
			$sql="DELETE FROM admin WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifieradmin($admin, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE admin SET 
						nom = :nom, 
						prenom = :prenom,
						age = :age,
						email = :email,
						login = :login,
						password = :password
					WHERE id = :id'
				);
				$query->execute([
					'nom' => $admin->getNom(),
					'prenom' => $admin->getPrenom(),
                    'age' => $admin->getAge(),
					'email' => $admin->getEmail(),
					'login' => $admin->getLogin(),
					'password' => $admin->getPassword(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererUtilisateur($id){
			$sql="SELECT * from admin where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		function recupererUtilisateur1($id){
			$sql="SELECT * from admin where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();
				
				$user = $query->fetch(PDO::FETCH_OBJ);
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		/*function connexionUser($email,$password){
            $sql="SELECT * FROM admin WHERE Email='" . $email . "' and Password = '". $password."'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }*/

	}



?>