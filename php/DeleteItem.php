<?php
include "DB_Connection.php";

if (isset($_GET['idItem'])) {
    // Ottieni l'ID dell'oggetto dall'URL
    $idItem = $_GET['idItem'];
    $query = "DELETE FROM vintage_items WHERE idItem = $idItem";

    if ($db->query($query) === TRUE) {

        header('Location: ../pages/MyObjects.php');
        exit();
    } else {

        echo "Errore durante l'eliminazione: " . $db->error;
    }
} else {

    echo "ID dell'oggetto non fornito.";
}

