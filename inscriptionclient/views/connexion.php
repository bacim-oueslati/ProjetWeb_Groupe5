<?php
    include_once '../Model/Utilisateur.php';
    include_once '../Controller/UtilisateurC.php';

    $error = "";

    // create user
    $user = null;

    // create an instance of the controller
    $userC = new UtilisateurC();
    if (
        isset($_POST["nom"]) &&
        isset($_POST["prenom"]) &&
        isset($_POST["email"]) &&
        isset($_POST["login"]) &&
        isset($_POST["pass"])
    ) {
        if (
            !empty($_POST["nom"]) &&
            !empty($_POST["prenom"]) &&
            !empty($_POST["email"]) &&
            !empty($_POST["login"]) &&
            !empty($_POST["pass"])
        ) {
            $user = new Utilisateur(
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['login'],
                $_POST['pass']
            );
            $userC->ajouterUtilisateur($user);
            header('Location:profil.php');
        }
        else
            $error = "Missing information";
    }

    
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" >
		<title>Startup 4.2 - Project</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="i/favicon.png" type="image/x-icon">
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css2?family=Baloo+Da+2:wght@100;200;300;400;500;600;700;800;900&family=Balthazar:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
		<!-- Bootstrap 4.5.2 CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<!-- Slick 1.8.1 jQuery plugin CSS (Sliders) -->
		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<!-- Fancybox 3 jQuery plugin CSS (Open images and video in popup) -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
		<!-- AOS 2.3.4 jQuery plugin CSS (Animations) -->
		<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
		<!-- FontAwesome CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
		<!-- Startup CSS (Styles for all blocks) - Remove ".min" if you would edit a css code -->
		<link href="css/style.min.css" rel="stylesheet" />
		<!-- jQuery 3.5.1 -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	</head> 
	<body>
<!-- Navigation Mobile type 2 -->
	<a class="open_menu color-main bg-light radius_full">
		<i class="fas fa-bars lh-40">
		</i>
	</a>
	<div class="navigation_mobile bg-light type2">
		<a class="close_menu color-main">
			<i class="fas fa-times">
			</i>
		</a>
		<div class="px-40 pt-60 pb-60 text-center inner">
			<div>
				<a href="#" class="f-heading f-22 link color-main mb-20">
					Home
				</a>
			</div>
			<div>
				<a href="#" class="f-heading f-22 link color-main mb-20">
					Popular
				</a>
			</div>
			<div>
				<a href="#" class="f-heading f-22 link color-main mb-20">
					Recent
				</a>
			</div>
			<div>
				<a href="#" class="f-heading f-22 link color-main mb-20">
					Featured
				</a>
			</div>
			<div>
				<a href="#" class="f-heading f-22 link color-main mb-20">
					Designers
				</a>
			</div>
			<div>
				<a href="#" class="f-heading f-22 link color-main mb-20">
					Team
				</a>
			</div>
			<div>
				<a href="#" class="f-12 link color-main op-7 text-uppercase sp-20 mb-20">
					Help
				</a>
			</div>
			<div>
				<a href="#" class="f-12 link color-main op-7 text-uppercase sp-20 mb-20">
					F.A.Q.
				</a>
			</div>
			<div>
				<a href="#" class="f-12 link color-main op-7 text-uppercase sp-20 mb-20">
					Support
				</a>
			</div>
			<div>
				<a href="#" class="f-12 link color-main op-7 text-uppercase sp-20 mb-20">
					About Us
				</a>
			</div>
			<div>
				<a href="#" class="f-12 link color-main op-7 text-uppercase sp-20 mb-20">
					Blog
				</a>
			</div>
			<div>
				<a href="#" class="f-12 link color-main op-7 text-uppercase sp-20 mb-20">
					Careers
				</a>
			</div>
			<div class="socials mt-60">
				<a href="#" target="_blank" class="link color-main f-18 mx-10">
					<i class="fab fa-twitter">
					</i>
				</a>
				<a href="#" target="_blank" class="link color-main f-18 mx-10">
					<i class="fab fa-facebook">
					</i>
				</a>
				<a href="#" target="_blank" class="link color-main f-18 mx-10">
					<i class="fab fa-dribbble">
					</i>
				</a>
				<a href="#" target="_blank" class="link color-main f-18 mx-10">
					<i class="fab fa-instagram">
					</i>
				</a>
				<a href="#" target="_blank" class="link color-main f-18 mx-10">
					<i class="fab fa-behance">
					</i>
				</a>
			</div>
		</div>
	</div>
	<!-- Header 2 -->
		<header class="pt-190 pb-120 bg-dark header_2">
			<nav class="header_menu_2 transparent pt-30 pb-30 mt-20">
				<div class="container px-xl-0">
					<div class="row justify-content-between align-items-baseline">
						<div class="col-md-4" data-aos="zoom-in" data-aos-delay="150">
							<div>
							</div>
						</div>
						<div class="col-md-6 d-flex justify-content-end align-items-center" data-aos="zoom-in" data-aos-delay="150">
							<a href="#" class="link color-white f-18 mx-15">
								Reclamation
							</a>
							<a href="#" class="link color-white f-18 mx-15">
								Marche
							</a>
							<a href="test.php" class="btn sm action-2 mx-15">
								Se Connceter
							</a>
						</div>
					</div>
				</div>
			</nav>
			<div class="container">
				<div class="mb-3 logo color-white d-block d-xl-none text-center logo_mobile" data-aos="zoom-in" data-aos-delay="0">
					Startup
				</div>
				<h1 class="big color-white text-center" data-aos="zoom-in" data-aos-delay="0">
					E-Pharma le site leader du e-commerce pharmaceutique
				</h1>
				<div class="mw-620 mx-auto mt-35 f-22 color-white op-7 text-center text-adaptive" data-aos="zoom-in" data-aos-delay="50">
					Notre site offre une service luxueuse afin de faciliter le contact entre le malade et sa pharmacie
				</div>
				<form action="form-handler.php" method="POST" class="row align-items-center justify-content-center no-gutters mt-70" data-aos="zoom-in" data-aos-delay="100">
					<div class="col-xl-5 col-lg-6 col-md-8 col-sm-9 d-flex flex-wrap justify-content-center justify-content-md-between holder">
						<input type="email" name="email" placeholder="Votre Adresse Mail" required="required" class="input mw-320 lg border-transparent-white focus-white color-white placeholder-transparent-white f-20">
						<button class="btn action-1 lg">
							Envoyer
						</button>
					</div>
				</form>
				<div class="color-white op-3 text-center mt-35" data-aos="zoom-in" data-aos-delay="150">
					<span>
						Lorsque vous vous connecter , vous devez accepter nos
						<br>
					</span>
					<a href="#" class="link color-white">
						Conditions d'utilisation
					</a>
				</div>
			</div>
		</header>
		<!-- Form 2 -->
			<section>
				<div class="container px-xl-0">
					<div class="row justify-content-center text-center text-md-left">
						<div class="col-lg-5 col-md-6 col-sm-10">
							<form action="" method="Post" >
								<div>
									<label for="login">Login</label>
									<input type="text" name="login" required>
								</div>
								<div>
									<label for="name">Name</label>
									<input type="text" name="nom"  required>
									
								</div>
								<div>
									<label for="name">Prenom</label>
									<input type="text" name="prenom"  required>
								</div>
								<div>
									<label for="email">Email</label>
									<input type="email" name="email"  required>
								</div>
							  <label>
									Password
									<input type="password" name="pass" required>
								</label>
								<head>
                                </body>
								</div>
								<button type="reset">Reset</button>
								<button type="submit">Envoyer </button>
							</form>
						</div>

						<div class="col-sm-1">
						</div>
							<img src="uploads/1.png" srcset="uploads/1.png 2x" alt="" class="h-full absolute">
						
					</div>
				</div>
			</section>
			<!-- Ecommerce 2 -->

				<section class="pt-100 pb-60 ecommerce_2">
					<div class="container px-xl-0">
						<div class="row justify-content-center">
							<div class="col-md-10 col-lg-7 col-xl-6">
								<div class="mx-auto mb-30 px-30 pt-30 pb-30 radius20 d-flex flex-column-reverse flex-sm-row justify-content-between color-heading product" data-aos="zoom-in" data-aos-delay="0">
									<div class="mr-20 d-flex flex-column justify-content-between left">
										<div class="top">
<li><a href="panier.html">panier</a></li>
											<div class="f-14 semibold text-uppercase sp-20 brand">
											</div>
											<div class="mb-15 f-22 semibold color-main title">
												Panadol Extra
											</div>
											<ul class="m-0 py-0 pl-10">
												<li class="mb-10">
													Paracetamol
												</li>
												<li class="mb-10">
													Caffeine
												</li>
												<li class="mb-10">
													500 mg/65 mg  
												</li>
											</ul>
										</div>
										<div class="mt-25 d-flex align-items-center bottom">
											<a href="#" class="btn mr-15 sm border-gray color-main medium f-16">
												Ajouter au panier
											</a>
											<span class="f-14 semibold text-uppercase sp-20 action-2">
												2.800 dt
											</span>
										</div>
									</div>
									<img src="uploads/17995panadolextraadvance14455x455v11.jpg" srcset="uploads/17995panadolextraadvance14455x455v11.jpg 2x" alt="" class="radius10 mb-30 mb-sm-0 mw-230 flex-shrink-0 align-self-start">
								</div>
								<div class="mx-auto mb-30 px-30 pt-30 pb-30 radius20 d-flex flex-column-reverse flex-sm-row justify-content-between color-heading product" data-aos="zoom-in" data-aos-delay="0">
									<div class="mr-20 d-flex flex-column justify-content-between left">
										<div class="top">
											<div class="f-14 semibold text-uppercase sp-20 brand">
											</div>
											<div class="mb-15 f-22 semibold color-main title">
												Efferalgan 
											</div>
											<ul class="m-0 py-0 pl-10">
												<li class="mb-10">
													Paracetamol
												</li>
												<li class="mb-10">
													Arome fruit rouge 
												</li>
												<li class="mb-10">
													8 comprimés effervisent 
												</li>
											</ul>
										</div>
										<div class="mt-25 d-flex align-items-center bottom">
											<a href="#" class="btn mr-15 sm border-gray color-main medium f-16">
												Ajouter au panier
											</a>
											<span class="f-14 semibold text-uppercase sp-20 action-2">
												1.700 DT
											</span>
										</div>
									</div>
									<img src="uploads/efferalganvitaminec16comprimeseffervescents.jpg" srcset="uploads/efferalganvitaminec16comprimeseffervescents.jpg 2x" alt="" class="radius10 mb-30 mb-sm-0 mw-230 flex-shrink-0 align-self-start">
								</div>
							</div>
							<div class="col-md-10 col-lg-7 col-xl-6">
								<div class="mx-auto mb-30 px-30 pt-30 pb-30 radius20 d-flex justify-content-between color-heading product big" data-aos="zoom-in" data-aos-delay="50">
									<div class="d-flex flex-column justify-content-between">
										<div class="top">
											<div class="f-14 semibold text-uppercase sp-20 brand">
											</div>
											<div class="mb-15 f-22 semibold color-main title">
												Maxilase
											</div>
											<ul class="m-0 py-0 pl-10">
												<li class="mb-10">
													Maux de gorge 
												</li>
												<li class="mb-10">
													Sirop
												</li>
												<li class="mb-10">
													Alpha-Amylase 
													<br> 200 U.CEIP/ml
												</li>
												<li class="mb-10">
													Gout mandarine 
												</li>
											</ul>
											<img src="uploads/maxilasemauxdegorgesiropflacon200ml.png" srcset="uploads/maxilasemauxdegorgesiropflacon200ml.png 2x" alt="" class="radius10 mt-10 mb-25 w-full">
											<div class="text-adaptive">
												Le médicament Maxilase comprimés contient une enzyme anti-inflammatoire et anti-oedémateuse, l'alpha-amylase. Maxilase va soulager l'inflammation aiguë et l'oedème en cas de maux de gorge peu intenses et sans fièvre, chez l'adulte.
											</div>
										</div>
										<div class="mt-25 d-flex align-items-center bottom">
											<a href="#" class="btn mr-15 sm border-gray color-main medium f-16">
												Ajouter au panier 
											</a>
											<span class="f-14 semibold text-uppercase sp-20 action-2">
												3.000 DT
											</span>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
		<!-- forms alerts -->
		<div class="alert alert-success alert-dismissible fixed-top alert-form-success" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Thanks for your message!
		</div>
		<div class="alert alert-warning alert-dismissible fixed-top alert-form-check-fields" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			Please, fill in required fields.
		</div>
		<div class="alert alert-danger alert-dismissible fixed-top alert-form-error" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="message">An error occurred while sending data :( Please, check if your hosting supports PHP and check how to set form data sending <a href="https://designmodo.com/startup/documentation/#form-handler" target="_blank" class="link color-transparent-white">here</a>.</div>
		</div>

		<!-- gReCaptcha popup (uncomment if you need a recaptcha integration) -->
		<!--
		<div class="bg-dark op-8 grecaptcha-overlay"></div>
		<div class="bg-light radius10 w-350 h-120 px-20 pt-20 pb-20 grecaptcha-popup">
			<div class="w-full h-full d-flex justify-content-center align-items-center">
				<div id="g-recaptcha" data-sitekey="PUT_YOUR_SITE_KEY_HERE"></div>
			</div>
		</div>
		<script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
		-->
		<!-- Bootstrap 4.5.2 JS -->
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
		<!-- Fancybox 3 jQuery plugin JS (Open images and video in popup) -->
		<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
		<!-- 
			Google maps JS API 
			Don't forget to replace the key "AIzaSyDP6Ex5S03nvKZJZSvGXsEAi3X_tFkua4U" to your own! 
			Learn how to get a key: https://help.designmodo.com/article/startup-google-maps-api/ 
		-->
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDP6Ex5S03nvKZJZSvGXsEAi3X_tFkua4U"></script>
		<!-- Slick 1.8.1 jQuery plugin JS (Sliders) -->
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<!-- AOS 2.3.4 jQuery plugin JS (Animations) -->
		<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
		<!-- Maskedinput jQuery plugin JS (Masks for input fields) -->
		<script src="js/jquery.maskedinput.min.js"></script>
		<!-- Startup JS (Custom js for all blocks) -->
		<script src="js/script.js"></script>
	</body>
</html>