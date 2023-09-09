<?php
session_start();
include "DB_Connection.php";

if (isset($_GET['removefavorite'])) {
    $item = $_GET['removefavorite'];

    // Verifica se l'item è nei preferiti dell'utente e lo rimuove
    $stmt = $db->prepare("DELETE FROM favorites WHERE favorite = ? AND idUser = ?");
    $stmt->bind_param("ii", $item, $_SESSION["idUser"]);
    $stmt->execute();
    $stmt->close();
}

header('Location: Favorites.php');
?>
