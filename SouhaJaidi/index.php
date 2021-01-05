<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Gestion des réclamations</title>
</head>
<body>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Liste des réclamations</h3>
        </div>
        <?php if (isset($_GET['notif'])): ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <?php
                    if ($_GET['notif'] == 'add') echo 'réclamation ajouté avec succés';
                    if ($_GET['notif'] == 'update') echo 'réclamation modifié avec succés';
                    if ($_GET['notif'] == 'delete') echo 'réclamation supprimé avec succés';
                ?>
            </div>
        <?php endif ?>
        <br>
        <a href="create.php" class="btn btn-primary">Nouvelle Réclamation</a>
        <br>
        <br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID_Rec</th>
                    <th>Reclamation</th>
                    <th>Type_Rec</th>
                    <th>Avis</th>
                
                </tr>
            </thead>
            <tbody>
                <?php
                    include 'classes/reclam.class.php';
                    $rec = new reclam;
                    $listreclamation = $rec->readAllReclamation();
                    $data= $listreclamation->fetchAll(); //une autre façon pour fetcher les données
                    // une autre façon pour ouvrir une structure entre le php et le HTML
                    //on ouvre la boucle avec les deux points(:)
                    foreach($data as $recData):
                    ?>
                        <tr>
                            <td><?= $recData['id_rec'] ?></td>   
                            <td><?= $recData['reclamation'] ?></td>   
                            <td><?= $recData['type_rec'] ?></td>   
                            <td><?= $recData['Avis'] ?></td>   
                           
                            <td>
                                <a href='edit.php?id_rec=<?= $recData['id_rec'] ?>' class="btn btn-outline-warning">Editer</a>&nbsp;&nbsp;
                                <a href='delete.php?id_rec=<?= $recData['id_rec'] ?>' class="btn btn-outline-danger">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach //on ferme la boucle qu'on a ouvert précédemment avec php ?>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
