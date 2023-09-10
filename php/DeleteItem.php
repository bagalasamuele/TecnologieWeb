<?php

// Includi il file di connessione al database
include "DB_Connection.php";

// Verifica se è stato passato un parametro 'idItem' tramite GET
if (isset($_GET['idItem'])) {
    // Ottieni l'ID dell'oggetto dall'URL
    $idItem = $_GET['idItem'];

    // Esegui la query per eliminare l'oggetto dal database
    $query = "DELETE FROM vintage_items WHERE idItem = $idItem";

    if ($db->query($query) === TRUE) {
        // Reindirizza alla pagina del carrello o a qualsiasi altra pagina desiderata
        header('Location: ../pages/MyObjects.php');
        exit();
    } else {
        // Gestisci l'errore se la query di eliminazione fallisce
        echo "Errore durante l'eliminazione: " . $db->error;
    }
} else {
    // Gestisci il caso in cui 'idItem' non sia stato passato
    echo "ID dell'oggetto non fornito.";
}

