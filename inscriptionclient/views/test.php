<?php
session_start();
require '../vendor/autoload.php';
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';
$message="";
$userC = new UtilisateurC();

if (isset($_POST['submitpost'])) {
    if (!empty($_POST['g-recaptcha-response']))
    {   $connected=$userC->connexionUser($_POST["email"],$_POST["password"]);
        if($connected!=null) {

            $recaptcha =  new \ReCaptcha\ReCaptcha('6LfxDR4aAAAAAN-YRxD1vAgVtinRvVKiA4bQ9s8A');

            $resp = $recaptcha->setExpectedHostname('localhost')
                ->verify($_POST['g-recaptcha-response']);
            if ($resp->isSuccess()) {
                var_dump('captcha valide');
            } else {
                $errors = $resp->getErrorCodes();
                var_dump('captcha invalide');
                var_dump($errors);
            }

            var_dump($connected);
        

            $_SESSION['login'] = $connected['login'];

            $_SESSION['email'] = $connected['email'];
            $_SESSION['id'] = $connected['id'];
            $_SESSION['prenom'] = $connected['prenom'];
            $_SESSION['nom'] = $connected['nom'];

            $_SESSION['password'] = $connected['password'];
   
            header('location:profil.php');

        }


    else

        $message = "verifier votre login et mot de passe or captcha invalid";}
else
    $message = "verifier votre login et mot de passe or captcha invalid";}
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
            async defer>
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="" method="post">
                            <h3 class="text-center text-info">Sign In</h3>
                            <div class="form-group">
                                <label for="email" class="text-info">Email:</label><br>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="password">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="g-recaptcha" data-sitekey="6LfxDR4aAAAAAP3V0OLEwtc_0xfEn2V7dnPSEVf9"></div>
        <br/>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Remember me</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="submit" name="submitpost" class="btn btn-info btn-md" value="submit">
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
