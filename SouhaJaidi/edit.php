<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Editer la Réclamtion N°<?= $_GET['id_rec'] ?></title>
</head>
<body>
    <?php
        include './classes/reclam.class.php';
        $rec = new reclam;
        if (!empty($_POST)) {
            $rec->updateReclamation($_POST['id_rec'], $_POST['reclamation'], $_POST['type_rec'], $_POST['Avis']);
            header('Location:index.php?notif=update');
            exit();
        } else {
            $showrec = $rec->showOneReclamation($_GET['id_rec']);
            $data = $showrec->fetch();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Editer la réclamation </h3>
        </div>
        <fieldset>
            <legend>Mettre à jour la réclamation  N°<?= $_GET['id_rec'] ?></legend>
            <form action="" method="post">
                <input type="hidden" value="<?= $data['id_rec'] ?>" name="id_rec">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="reclamation">Réclamation</label>
                            <input type="text" value="<?= $data['reclamation'] ?>" required name="reclamation" class="form-control" id="reclamation">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type_rec">Type_rec</label>
                            <input type="text" value="<?= $data['type_rec'] ?>" required name="type_rec" class="form-control" id="type_rec">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Avis">Avis</label>
                            <input type="text" value="<?= $data['Avis'] ?>" required name="Avis" class="form-control" id="Avis">
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