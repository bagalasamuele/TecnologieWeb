<?php
    #check login
    if (!isset($_SESSION['idUser'])){
    header('Location: /TecnologieWeb/php/Index.php');
    exit();
    }
?>