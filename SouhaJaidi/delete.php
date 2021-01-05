<?php
    include 'classes/reclam.class.php';
    $rec = new reclam;
    $rec->deleteReclamation($_GET['id_rec']);
    header('Location:index.php?notif=delete');