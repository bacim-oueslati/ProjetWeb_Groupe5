<?php  
class commande
{
	private $id;
	private $idClient;
	private $prixTotal;
	private $etat;
	private $date;
	
		function __construct($id, $idClient, $prixTotal, $etat, $date)
		{
			$this->id=$id;
			$this->idClient=$idClient;
			$this->prixTotal=$prixTotal;
			$this->etat=$etat;
			$this->date=$date;
			
		}

		function get_id()
		{	
			return $this->id;
		}
		function get_idClient()
		{	
			return $this->idClient;
		}
		function get_prixTotal()
		{	
			return $this->prixTotal;
		}
		function get_etat()
		{	
			return $this->etat;
		}
		function get_date()
		{	
			return $this->date;
		}
		
}




?>