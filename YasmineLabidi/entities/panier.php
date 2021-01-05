<?php  
class panier
{
	private $id;
	private $idClient;
	private $idProduit;
	private $quantite;

	
		function __construct($id, $idClient, $idProduit, $quantite)
		{
			$this->id=$id;
			$this->idClient=$idClient;
			$this->idProduit=$idProduit;
			$this->quantite=$quantite;
		}

		function get_id()
		{	
			return $this->id;
		}
		function get_idClient()
		{	
			return $this->idClient;
		}
		function get_idProduit()
		{	
			return $this->idProduit;
		}
		function get_quantite()
		{	
			return $this->quantite;
		}

}




?>