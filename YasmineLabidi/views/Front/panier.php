<!DOCTYPE html>
<html lang="en">

<head>
  <?php
 if (isset($_GET['message'])) {
    $message=$_GET['message'];
  }
    include "../../entities/produit.php";
  include "../../core/produitC.php";
    include "../../entities/panier.php";
  include "../../core/panierC.php";
$panier1C=new panierC();
$items=$panier1C->countPanier(1);
$panier=$panier1C->retrievePaniers(1);
$produit1C=new produitC();
  ?>
  <title>Pharmative &mdash; Colorlib Template</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">


  <link rel="stylesheet" href="css/aos.css">

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

  <div class="site-wrap">


    <div class="site-navbar py-2">

      <div class="search-wrap">
        <div class="container">
          <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
          <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
          </form>
        </div>
      </div>

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="index.html" class="js-logo-clone"><strong class="text-primary">Pharma</strong>tive</a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li><a href="index.html">Home</a></li>
                <li class="active"><a href="shop.html">Store</a></li>
                <li class="has-children">
                  <a href="#">Products</a>
                  <ul class="dropdown">
                    <li><a href="#">Supplements</a></li>
                    <li class="has-children">
                      <a href="#">Vitamins</a>
                      <ul class="dropdown">
                        <li><a href="#">Supplements</a></li>
                        <li><a href="#">Vitamins</a></li>
                        <li><a href="#">Diet &amp; Nutrition</a></li>
                        <li><a href="#">Tea &amp; Coffee</a></li>
                      </ul>
                    </li>
                    <li><a href="#">Diet &amp; Nutrition</a></li>
                    <li><a href="#">Tea &amp; Coffee</a></li>
                    
                  </ul>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number"><?php echo $items['total']; ?></span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0">
            <a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> 
            <strong class="text-black">Cart</strong>
          </div>
        </div>
      </div>
    </div>

   <?php
   if (isset($message)){   
   if ($message=="PA")
   { 
?>    
   <!-- Info section -->
   <br>
    <div class="col-md-12">
      <div class="alert alert-success" role="alert">
        Produit ajouté au panier !
      </div>
    </div>
<!--end of Info section -->



<?php
  }
  else if ($message=="PM"){
    ?>
    <!-- Info section -->
   <br>
    <div class="col-md-12">
      <div class="alert alert-info" role="alert">
        Quantité mise à jour !
      </div>
    </div>
<!--end of Info section -->
<?php
  }
  else if ($message=="PR"){
    ?>

    <!-- Info section -->
   <br>
    <div class="col-md-12">
      <div class="alert alert-warning" role="alert">
        Produit retiré du panier !
      </div>
    </div>
<!--end of Info section -->

    <?php
  }
  else if ($message=="SI"){
    ?>
    <!-- Info section -->
   <br>
    <div class="col-md-12">
      <div class="alert alert-danger" role="alert">
        Stock épuisé !
      </div>
    </div>
<!--end of Info section -->
<?php
  }
}
    ?>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <form class="col-md-12" method="post" enctype="multipart/form-data">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    <th class="product-quantity">Quantity</th>
                    <th class="product-total">Total</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                  $total=0;
                    foreach ($panier as $row) {
                   $produit=$produit1C->retrieveProductById($row['idProduit']);
                   $row1=$produit->fetch();
                   $tot=$row['quantite']*$row1['price'];
                   $total+=$tot;
                   ?>
                  <tr>
                    <td class="product-thumbnail">
                      <img src="<?php echo 'data:image/jpeg;base64,'.base64_encode($row1['image']).'' ;?>" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="h5 text-black"><?php echo $row1['name']; ?></h2>
                    </td>
                    <td><?php echo $row1['price']; ?> TND</td>
                    <td>
                      <div class="input-group mb-3" style="max-width: 120px;">
                        <div class="input-group-prepend">
                          <a style="display: inherit;" href="minus.php?id=<?php echo $row['idProduit']; ?>" class="btn btn-outline-primary" type="button">-</a>
                        </div>
                        <input type="text" class="form-control text-center" value="<?php echo $row['quantite']; ?>" placeholder=""
                          aria-label="Example text with button addon" aria-describedby="button-addon1" name="qt">
                        <div class="input-group-append">
                          <a style="display: inherit;" href="plus.php?id=<?php echo $row['idProduit']; ?>" class="btn btn-outline-primary" type="button">+</a>
                        </div>
                      </div>
    
                    </td>
                    <td><?php echo $tot; ?> TND</td>
                    <td><a href="delete-item.php?id=<?php echo $row['idProduit']; ?>" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                  <?php
              }
              ?>
                </tbody>
              </table>
            </div>
          
        </div>
    
        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">

              </form>
              <div class="col-md-6">
                <a href="produits.php"><button class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Total Brut :</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo $total; ?> TND</strong>
                  </div>
                </div>
                   <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">TVA (18%) :</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo ($total*0.18); ?> TND</strong>
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-6">
                    <span class="text-black">Total :</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black"><?php echo ($total+$total*0.18); ?> TND</strong>
                  </div>
                </div>
    
                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location='commander.php?tot=<?php echo $total+$total*0.18; ?>'">Confirmer</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">

            <div class="block-7">
              <h3 class="footer-heading mb-4">About <strong class="text-primary">Pharmative</strong></h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
                sed dolorum excepturi iure eaque, aut unde.</p>
            </div>

          </div>
          <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Navigation</h3>
            <ul class="list-unstyled">
              <li><a href="#">Supplements</a></li>
              <li><a href="#">Vitamins</a></li>
              <li><a href="#">Diet &amp; Nutrition</a></li>
              <li><a href="#">Tea &amp; Coffee</a></li>
            </ul>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                <li class="email">emailaddress@domain.com</li>
              </ul>
            </div>


          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
              Copyright &copy;
              <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made
              with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank"
                class="text-primary">Colorlib</a>
              <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>

        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

</body>

</html>