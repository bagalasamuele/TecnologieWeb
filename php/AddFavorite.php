<?php
session_start();
include "DB_Connection.php";

if (isset($_GET['addfavorite'])) {
    $item = $_GET['addfavorite'];

    // Verifica se l'item è già nei preferiti dell'utente
    $query = $db->prepare("SELECT favorite FROM favorites WHERE favorite = ? AND idUser = ?");
    $query->bind_param("ii", $item, $_SESSION["idUser"]);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows == 0) { // L'item non è nella tabella dei preferiti ancora
        $stmt = $db->prepare("INSERT INTO favorites(idUser, favorite) VALUES (?, ?)");
        $stmt->bind_param("ii", $_SESSION["idUser"], $item);
        $stmt->execute();
        $stmt->close();
    }
}

header('Location: Favorites.php');
?>
