<?php  
class produitCommande
{
	private $id;
	private $idProduit;
	private $idCommande;
	private $quantite;


	
		function __construct($id, $idProduit, $idCommande,$quantite)
		{
			$this->id=$id;
			$this->idProduit=$idProduit;
			$this->idCommande=$idCommande;
			$this->quantite=$quantite;
		
		}

		function get_id()
		{	
			return $this->id;
		}
		function get_idProduit()
		{	
			return $this->idProduit;
		}
		function get_idCommande()
		{	
			return $this->idCommande;
		}
		function get_quantite()
		{	
			return $this->quantite;
		}
		
		
}




?>