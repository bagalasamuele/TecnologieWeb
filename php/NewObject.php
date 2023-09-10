<?php
session_start();
include "DB_Connection.php";
include "../html/head.html";
include "../html/header.html";


if (isset($_POST['submit'])) {
    $itemName = $_POST['nomeOggetto'];
    $description = $_POST['descrizione'];
    $price = $_POST['prezzo'];
    $imgPath = $_POST['imgPath'];
    $condition = $_POST['condition']; // Aggiunto il campo 'condition'

    if ($itemName && $description && $price && $imgPath && $condition) {
        $query = "INSERT INTO vintage_items(nameItem, description, price, imgPath, `condition`)
        VALUES('$itemName', '$description', '$price', '$imgPath', '$condition') ";

        if ($db->query($query) === TRUE) {
            echo '<div class="alert alert-success" role="alert">Inserimento avvenuto con successo</div>';
            header('Location: CheckNewItem.php');
            exit();
        } else {
            echo '<div class="alert alert-danger" role="alert">Errore: ' . $db->error . '</div>';
        }
    } else {
        echo '<div class="alert alert-warning" role="alert">Riempire tutti i campi</div>';
    }
}
?>

<body>
    <div class="container">
        <section>
            <div class="text-center">
                <h2>Inserisci i dettagli sull'oggetto:</h2>
            </div>
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="form-group">
                        <label for="nomeOggetto">Nome:</label>
                        <input type="text" class="form-control" name="nomeOggetto" required>
                    </div>
                    <div class="form-group">
                        <label for="descrizione">Descrizione:</label>
                        <textarea class="form-control" name="descrizione" rows="5" placeholder="Inserisci la descrizione" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="prezzo">Prezzo:</label>
                        <input type="number" step="0.01" class="form-control" name="prezzo" required>
                    </div>
                    <div class="form-group">
                        <label for="imgPath">Immagine (URL):</label>
                        <input type="url" class="form-control" name="imgPath" required>
                    </div>
                    <div class="form-group">
                        <label for="condition">Condizione:</label>
                        <input type="text" class="form-control" name="condition" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Inserisci</button>
                </form>
            </div>
        </section>
    </div>
</body>
<?php include "../html/footer.html"; ?>
</html>
