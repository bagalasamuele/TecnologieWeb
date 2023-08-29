<html>
<?php include "../html/head.html"; ?>
<?php include "../html/header.html"; ?>
<?php


session_start();
include "../php/DB_Connection.php";
include "../php/Check_Login.php";

$rows = array(); // Inizializza $rows come un array vuoto

if (isset($_POST['submit'])) {
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    if (empty($nickname) || empty($password)) {
        echo "Riempire tutti i campi";
    } else {
        $nickname = strip_tags($nickname);
        $nickname = $db->real_escape_string($nickname);
        $password = strip_tags($password);
        $password = $db->real_escape_string($password);
        $password = md5($password);
        $query = $db->query("SELECT idUtente, nickname FROM users WHERE nickname='$nickname' AND password='$password'");
        if ($query->num_rows == 1) {
            while ($row = $query->fetch_object()) {
                $_SESSION['idUtente'] = $row->idUtente; // Corretto il nome della variabile
            }
            header('Location: "/TecnologieWeb/index.php"'); // Aggiunto chiusura delle virgolette
            exit;
        } else {
            echo 'Nickname o password errati';
        }
    }
}

$rows = $db->query("SELECT nickname FROM users WHERE idUser='$_SESSION[idUser]'");


?>

<body>
    <section class="container">
        <h2>
            <?php
            foreach ($rows as $row) {
                ?>
                Bentornato
                <?= $row["nickname"] ?>!
            </h2>
        <?php } ?>

        <div class="row">
    <?php
    $minItemId = 1;
    $maxItemId = 20; // Modifica questo valore in base al numero totale di oggetti vintage
        
    $randomItemIds = array_rand(range($minItemId, $maxItemId), 6); // Modifica il numero di elementi visualizzati
        
    foreach ($randomItemIds as $itemId) {
        $stmt = $db->prepare("SELECT * FROM vintage_items WHERE idItem = ?");
        $stmt->bind_param("i", $itemId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <div class="col-4 mb-4">
                <div class="card">
                    <a href="dettaglio_oggetto.php?id=<?= $row["idItem"] ?>" class="thumb-menu">
                        <img class="card-img-top" src="<?= $row["imgPath"] ?>" alt="<?= $row["nameItem"] ?>">
                    </a>
                    <div class="card-body">
                        <h6 class="card-title">
                            <?= $row["nameItem"] ?>
                        </h6>
                        <p class="card-text">
                            <?= $row["description"] ?>
                        </p>
                        <p class="card-text"><strong>Price:</strong> €
                            <?= $row["price"] ?>
                        </p>
                        <p class="card-text"><strong>Condition:</strong>
                            <?= $row["condition"] ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
        }

        $stmt->close();
    }
    ?>
</div>





    </section>
</body>

<?php include "../html/footer.html"; ?>

</html>