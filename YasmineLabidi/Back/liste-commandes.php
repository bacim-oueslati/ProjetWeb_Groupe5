<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <?php
      include "../../entities/commande.php";
      include "../../core/commandeC.php";
       include "../../entities/user.php";
      include "../../core/userC.php";
     $commandeC=new commandeC();
     $listC=$commandeC->retrieveCommandes();
     $userC= new userC();
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pharmacie | Liste Commandes</title>
    <meta name="description" content="Dashboard Pharmacie">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
   
   <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                        <a href="../front/produits.php" target="_blank"> <i class="menu-icon fa fa-globe"></i>Front </a>

                    </li>
                    <h3 class="menu-title">Gestion du site</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-credit-card"></i>Gestion des commandes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-list"></i><a href="liste-commandes.php">Liste des commandes</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                        </div>
                    </div>

          

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Gestion Commandes</a></li>
                            <li class="active">Liste Commandes</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title"> Listes des commandes : </strong>
                                
                               <br>
                               <br><a href="exportCommandes.php" type="button" class="btn btn-secondary" target="_blank"><i class="fa fa-file"></i> Export to PDF</a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            
                                            <th> Nom </th>
                                            <th> Prix Total </th>
                                            <th> Date </th>
                                            <th> Etat </th>
                                            <th> Détails </th>
                                           <th> Actions </th>

                                        </tr>
                                    </thead>
                                   <tbody>
                                    <?php
                                                 foreach ($listC as $row){
            $userId=$row['idClient'];
            $usersList=$userC->retrieveUserById($userId);
                foreach ($usersList as $row1) {
                   
                
        
        ?>
                                                <tr>
                                                <td><?php echo $row1['name']; ?></td>
                                                <td><?php echo $row['prixTotal']; ?> TND</td>
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['etat']; ?></td>
                                                <td><a href="historique.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-dark"><i class="fa fa-list"></i> Consulter</a></td>
                                                <td><?php 
                                                    if ($row['etat']=="Recue"){?>
                                                    <a href="accept.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-info"><i class="fa fa-check-circle"></i> Accepter</a>
                                                    <a href="reject.php?id=<?php echo $row['id']; ?>" type="button" class="btn btn-danger"><i class="fa fa-ban"></i> Refuser</a>
                                                    <?php } ?>
                                                </td>                                           
                                          
                                                </tr>
                                                       <?php
                                                       }
                                             }
                                             ?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="assets/js/init-scripts/data-table/datatables-init.js"></script>


</body>

</html>
