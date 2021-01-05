<!doctype html>

<!-- Tout ce qui est affiché à l'utilisateur -->

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
		<style >
      p
      {
         width:150px;
      }
      </style>

	</head>
	
  <body>
  <header>
        <nav > Mettre le nav bar du template ici lorsque elle est prete ! </nav>
    
            <h1 >Actualités</h1>

        <hr/>
        <br/>
    </header>
  <main>
      <?php
			require_once 'c1.php';
			require_once 'c2.php';
			$cbd=new connection("localhost","test","root","");

			$crd=new crud();
			
            $crd->aff($cbd->con);
?>
</main>
<footer>
        <address><i>123NoWhereStreet</i></address>
    </footer> 

  </body>
</html>