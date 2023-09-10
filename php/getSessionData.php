<?php
session_start();
$response = array('session_userRole' => $_SESSION['role']);
header('Content-Type: application/json');
echo json_encode($response);
?>
