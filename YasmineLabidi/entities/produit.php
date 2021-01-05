<?php  
class produit
{
	private $id;
	private $name;
	private $price;
	private $qt;
	private $image;
	
	
		function __construct($id, $name, $price, $qt, $image)
		{
			$this->id=$id;
			$this->name=$name;
			$this->price=$price;
			$this->qt=$qt;
			$this->image=$image;
		
		}

		function get_id()
		{	
			return $this->id;
		}
		function get_name()
		{	
			return $this->name;
		}
		function get_price()
		{	
			return $this->price;
		}
		function get_qt()
		{	
			return $this->qt;
		}
		function get_image()
		{	
			return $this->image;
		}
		
}




?>