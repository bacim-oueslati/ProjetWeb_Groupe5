<!doctype html>

<!-- Tout ce qui est affiché à l'administrateur/pharmacien -->

<html>
	<head>
	<meta charset="utf-8">
		<title>
			Twitter Bootstrap Tutorial
		</title>
		
		<!--Bootstrap style-->

		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/tab.css" >
		<!--Bootstrap script-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style >
      img 
    {
        width:500px;
    }

    p
    { 
       width : 600px;

    }

</style>
	</head>
	
  <body >
      <?php
			require_once 'c1.php';
			require_once 'c2.php';
			$cbd=new connection("localhost","test","root","");

			$crd=new crud();
			
			if(isset($_POST['envoyer']))
 {
    // Simple PHP Upload Script:  http://coursesweb.net/php-mysql/

$uploadpath = 'images/';      // directory to store the uploaded files
$max_size = 990000000000000000000000000000000000000000000000000000000;          // maximum file size, in KiloBytes
$alwidth = 9000;            // maximum allowed width, in pixels
$alheight = 8000;           // maximum allowed height, in pixels
$allowtype = array('bmp', 'gif', 'jpg', 'jpe', 'png','pdf','php','docx','doc');        // allowed extensions

if(isset($_FILES['fileup']) && strlen($_FILES['fileup']['name']) > 1) {
  $uploadpath = $uploadpath . basename( $_FILES['fileup']['name']);       // gets the file name
  $sepext = explode('.', strtolower($_FILES['fileup']['name']));
  $type = end($sepext);       // gets extension
     // gets image width and height
  $err = '';         // to store the errors

  // Checks if the file has allowed type, size, width and height (for images)
  if(!in_array($type, $allowtype)) $err .= 'The file: <b>'. $_FILES['fileup']['name']. '</b> not has the allowed extension type.';
  if($_FILES['fileup']['size'] > $max_size*1000) $err .= '<br/>Maximum file size must be: '. $max_size. ' MB.';
  if(isset($width) && isset($height) && ($width >= $alwidth || $height >= $alheight)) $err .= '<br/>The maximum Width x Height must be: '. $alwidth. ' x '. $alheight;

  // If no errors, upload the image, else, output the errors
  if($err == '') {
    if(move_uploaded_file($_FILES['fileup']['tmp_name'], $uploadpath)) { 
      echo 'File: <b>'. basename( $_FILES['fileup']['name']). '</b> successfully uploaded:';
      echo '<br/>File type: <b>'. $_FILES['fileup']['type'] .'</b>';
      echo '<br />Size: <b>'. number_format($_FILES['fileup']['size']/1024, 3, '.', '') .'</b> KB';
      if(isset($width) && isset($height)) echo '<br/>Image Width x Height: '. $width. ' x '. $height;
      
    }
    else echo '<b>Unable to upload the file.</b>';
  }
  
}
  


     
     
        
     if($_POST['mp']=="")
     {
         echo '<script>alert("champs obligatoire")</script>';
         echo ' <a href="index.php" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span>Retour </a>';
         echo " <form method='POST'> ";
        
     }
     else{
      
     $crd->add(basename( $_FILES['fileup']['name']),$_POST['mp'],$_POST['descr'],$_POST['title'],$_POST['dc'],"bacim",$cbd->con);
    
    
    echo "<script> alert('Added successfuly ! ')</script>";
    echo ' <a href="index.php" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span>Retour </a>';
    echo "</form>";
  
     }
 
}
 
if(isset($_POST['aff']))
 {
   
    echo " <form method='POST'> ";
    echo ' <a href="index.php" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span>Retour </a>';
    echo "</form>"; 
    $crd->aff($cbd->con);
 }
 if(isset($_POST['sup']))
 {
    echo " <form method='POST'> ";
    echo ' <a href="index.php" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span>Retour </a>';
    echo "</form>";
   
    $crd->sup( $_POST['title'],$cbd->con);
 }
 if(isset($_POST['up']))
 {
    echo " <form method='POST'> ";
    echo ' <a href="index.php" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span>Retour </a>';
    echo "</form>";
    $crd->up( $_FILES['fileup']['name'],$_POST['mp'],$cbd->con);
 }
 if(isset($_POST['re']))
 {
    echo " <form method='POST'> ";
    echo ' <a href="index.php" class="btn btn-info "><span class="glyphicon glyphicon-chevron-left"></span>Retour </a>';
    echo "</form>";
    $crd->re( $_FILES['fileup']['name'],$cbd->con);
 }
 if(isset($_POST['ret']))
 {
    header('location: index.php');
 }
 
?>

  </body>
</html>