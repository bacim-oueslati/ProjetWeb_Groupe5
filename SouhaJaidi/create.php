<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Nouvelle Réclamation</title>
</head>
<body>
    <?php
        if (!empty($_POST)) {
            include './classes/reclam.class.php';
            $rec = new reclam;
            $rec->addNewReclamation($_POST['reclamation'], $_POST['type_rec'], $_POST['Avis']);
            header('Location:index.php?notif=add');
            exit();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Vous etes la bienvenue dans le SAV Opera</h3>
        </div>
        <fieldset>
            <legend>Créer Une Réclamation</legend>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reclamation">Réclamation</label>
                            <input type="text" required name="reclamation" class="form-control" id="reclamation">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <legend>Pouvez-vous nous decrire la situation</legend>
                            <label for="type_rec">Type_De_Reclamation</label>
                            <input type="text" required name="type_rec" class="form-control" id="type_rec">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <legend> Merci de nous donner ton avis </legend>
                            <label for="Avis">Avis</label>
                            <input type="text" required name="Avis" class="form-control" id="Avis">
                        </div>
                    </div>
                 
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-outline-primary">Enregistrer</button>
                    </div>
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-block btn-outline-secondary">Annuler</button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>