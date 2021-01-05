<?php

/* Comments : */

require_once 'c1.php';
require_once 'c2.php';
$cbd=new connection("localhost","test","root","");

$crd=new crud();


    
if(isset($_POST['env']))
{
    $crd->addcom($_POST['cvco'],$_POST['comment'],"bassem",$cbd->con);
    
}
if(isset($_POST['mdf']))
{
    $crd->upc($_POST['cvco'],$_POST['comment'],"bassem",$cbd->con);
    
}
?>