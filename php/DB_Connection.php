<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbb= "test";
    $db = new mysqli($servername, $username, $password, $dbb) or die('database connection failed');
?>