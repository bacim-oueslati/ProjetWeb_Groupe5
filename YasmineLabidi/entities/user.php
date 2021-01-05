<?php  
class user
{
	private $id;
	private $name;

	
		function __construct($id, $name)
		{
			$this->id=$id;
			$this->name=$name;
		
		}

		function get_id()
		{	
			return $this->id;
		}
		function get_name()
		{	
			return $this->name;
		}
		
}




?>