<!doctype html>

<html>
	<head>
	<meta charset="utf-8">
		<title>
			Twitter Bootstrap Tutorial
		</title>
		
		<!--Bootstrap style-->

		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/tab.css" >
    <link rel="stylesheet" href="style.css"/>
		<!--Bootstrap script-->
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
        <script>
        $(document).ready(function(){
            $("#sh").click(function()
            {
            
                $("#f4").css("display","block");
            
               
            });
            $("#sh").dblclick(function()
            {
            
                
            
                $("#f4").toggle();
            });
        
        });
        </script>
		<style >
      p
      {
         width:150px;
      }
input[type="submit"]
{
    margin-left:2px;
    background-color:navy;
    color:white;
}
input[type="Reset"]
{
    background-color:navy;
    color:white;
}
}
      /*stars*/
      *{
    margin: 0;
    padding: 0;
}
.rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}

/* Modified from: https://github.com/mukulkant/Star-rating-using-pure-css */
      </style>

	</head>
	
  <body>
  <header>
  <div class="container">
<div class="row">
 <div class="col-md-12" >
 <h4  style="background-color:navy;color:white ;" >  Mettre le nav bar du template ici lorsque elle est prete ! </h4>
    
            <h1 style="background-color:blue;color:white ;"  >Actualités</h1>
</div>
</div>
</div>
        <hr/>
        
    </header>
  <main>
<?php
require_once 'c1.php';
require_once 'c2.php';
$cbd=new connection("localhost","test","root","");

$crd=new crud();

if(isset($_POST['cv']))
{
    echo '<div class="container">';
echo '<div class="row">';
echo ' <div class="col-md-6" style="height:150px">';

    echo"<img src='images/".$_POST['cv']."'"."alt='n' class='img-responsive thumbnail' style='margin-right:0px;height:100%;width:800px'/>";

echo ' </div>';
echo '</div>';
echo '</div>';
    
}
if(isset($_POST['cvn']))
{
    echo '<div class="container">';
    echo '<div class="row">';
    echo ' <div class="col-md-12" >';
    echo"<p style='height:100%; width : 100%;'>".$_POST['cvn']."</p>";
    echo ' </div>';
echo '</div>';
echo '</div>';
echo '</br>';
}

echo '<div class="container">';
echo '<div class="row">';
echo ' <div class="col-md-12"  style="height:150px">';
echo "<a id='sh'>Comments : </a>";

echo '<form name="formulaire" method="POST" action="com.php" id="f4" style="display:none;">';
$crd->affcom("",$cbd->con);
echo '<input type="text" name="comment" style="width:100%" />';
echo' </br>';
echo ' <input type="submit" value="Envoyer" name="env">';
echo ' <input type="submit" value="Modifier" name="mdf">';
echo '  <input type="reset" value="Supprimer" name="sup">';
echo '<input type="text" value="'.$_POST['cv'].'"'.'name="cvco" style="color:white;;display:none;border:1px solid white"/>';

echo' <div class="rate">';
echo' </br>';
echo '  <input type="radio" id="star5" name="rate" value="5" />';
echo ' <label for="star5" title="text">5 stars</label>';
echo ' <input type="radio" id="star4" name="rate" value="4" />';
echo '<label for="star4" title="text">4 stars</label>';
echo' <input type="radio" id="star3" name="rate" value="3" />';
echo ' <label for="star3" title="text">3 stars</label>';
echo '  <input type="radio" id="star2" name="rate" value="2" />';
echo ' <label for="star2" title="text">2 stars</label>';
echo  '<input type="radio" id="star1" name="rate" value="1" />';
echo ' <label for="star1" title="text">1 star</label>';
echo '</div>';

echo '</br>';
echo'</form>';

echo ' </div>';
echo '</div>';
echo '</div>';

?>

</main>
<footer>
<div class="container">
<div class="row">
 <div class="col-md-12" >
<h1 style="background-color:red;color:white ">123NoWhereStreet</h1>
</div>
</div>
</div>
</footer>
</body>
</html>