<?php

/* Connexion à la base de données */

class connection
{
  public $lh ="localhost";
  public $lh1 ="root";
  public $lh2 ="test";
  public $lh3 ="";
  public $con;
  public $em;
  public $mp;
  function __construct($lh,$lh2,$lh1,$lh3)
  {
    try 
    {
      $this->con = new PDO("mysql:host=$this->lh;dbname=$this->lh2",$this->lh1,$this->lh3,
      [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC]);
    } 
    catch(PDOExceptio $e) 
    {
      echo $e->getMessage();
    }
  }
}
?>