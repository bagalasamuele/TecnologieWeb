<?php
session_start();
include "DB_Connection.php";
include "../html/head.html";
include "../html/header.html";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['purchase'])) {
    // Esegui l'acquisto e rimuovi gli oggetti dal carrello e dalla tabella "vintage_items"
    $idUser = $_SESSION['idUser'];
    $queryR = "SELECT vintage_items.idItem FROM vintage_items INNER JOIN favorites ON vintage_items.idItem = favorites.favorite WHERE favorites.idUser='$idUser'";
    $result = $db->query($queryR);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $idItem = $row['idItem'];
            // Esegui la query per rimuovere l'oggetto dalla tabella "vintage_items"
            $queryDelete = "DELETE FROM vintage_items WHERE idItem='$idItem'";
            $db->query($queryDelete);
        }
    }

    // Ora puoi rimuovere tutti gli oggetti dal carrello
    $queryDeleteFavorites = "DELETE FROM favorites WHERE idUser='$idUser'";
    if ($db->query($queryDeleteFavorites)) {
        $message = "Acquisto effettuato con successo!";
    } else {
        $message = "Errore durante l'acquisto.";
    }
}
?>

<body>
<div class="container">
    <section>
        <div class="row">
            <div class="col">
                <div class="text-center">
                    <h1>Il tuo carrello</h1>
                </div>
            </div>
        </div>

        <?php
        $i = 0;
        $arr = array();
        $queryR = "SELECT vintage_items.idItem, vintage_items.nameItem, vintage_items.imgPath FROM vintage_items INNER JOIN favorites ON vintage_items.idItem = favorites.favorite INNER JOIN users ON favorites.idUser = users.idUser WHERE users.idUser='$_SESSION[idUser]' ORDER BY vintage_items.nameItem";
        $rows = $db->query($queryR);
        $count = mysqli_num_rows($rows);
        if ($count == 0) {
            ?>
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h3>Non hai ancora inserito nessun oggetto tra i preferiti.</h3>
                        <p>Torna indietro per aggiungerne alcuni:<br>
                            <input type="button" onclick="document.location.href='Home.php';" value="Home" class="btn btn-primary mt-4"></p>
                    </div>
                </div>
            </div>
            <?php
        }

        echo '<div class="row">';

        foreach ($rows as $row) {
            $arr[] = array(
                'idItem' => $row['idItem'],
                'nomeOggetto' => $row['nameItem'],
                'imgOggetto' => $row['imgPath']
            );
        }

        foreach ($arr as $print) {
            ?>
            <div class="col-md-4 my-2">
                <div class="card">
                    <img src="<?= $print["imgOggetto"] ?>" class="card-img-top" alt="<?= $print["nomeOggetto"] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= $print["nomeOggetto"] ?></h5>
                        <form action="../pages/Object.php" method="get">
                            <input type="hidden" name="id" value="<?= $print["idItem"] ?>">
                            <button type="submit" class="btn btn-primary">Visualizza</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        }
        echo '</div>';
        ?>

        <form method="post" action="">
            <div class="text-center">
                <button type="submit" name="purchase" class="btn btn-success mt-4">Effettua Acquisto</button>
            </div>
        </form>

    </section>
</div>
</body>
<?php include "../html/footer.html"; ?>
