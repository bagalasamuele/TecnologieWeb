<?php
    include "/TecnologieWeb/php/DB_Connection.php";
    session_start(); 
    session_destroy(); 
    header('Location: /TecnologieWeb/index.php');
    exit();
?>