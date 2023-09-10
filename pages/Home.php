<?php
include "../html/head.html";
include "../html/header.html";
session_start();
include "../php/DB_Connection.php";
include "../php/Check_Login.php";

if (isset($_POST['submit'])) {
    $nickname = $_POST['nickname'];
    $password = $_POST['password'];

    if (empty($nickname) || empty($password)) {
        echo "Riempire tutti i campi";
    } else {
        $nickname = $db->real_escape_string(strip_tags($nickname));
        $password = $db->real_escape_string(strip_tags($password));

        $query = $db->prepare("SELECT idUtente, nickname, password FROM users WHERE nickname = ?");
        $query->bind_param("s", $nickname);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password'])) {
                $_SESSION['idUtente'] = $row['idUtente'];
                header('Location: "/TecnologieWeb/index.php"');
                exit;
            } else {
                echo 'Password errata';
            }
        } else {
            echo 'Utente non trovato';
        }
    }
}

$rows = $db->query("SELECT nickname FROM users WHERE idUser = '$_SESSION[idUser]'");

$lastItemIdQuery = "SELECT MAX(idItem) AS maxItemId FROM vintage_items";
$lastItemIdResult = $db->query($lastItemIdQuery);
$lastItemIdRow = $lastItemIdResult->fetch_assoc();
$lastItemId = $lastItemIdRow['maxItemId'];

$maxItemId = $lastItemId;
$minItemId = 1;
$numberOfItems = 6; // Numero di elementi visualizzati

$itemIds = range($minItemId, $maxItemId);
shuffle($itemIds); // Mischia l'array degli ID

$selectedItemIds = array_slice($itemIds, 0, $numberOfItems); // Prendi i primi $numberOfItems ID

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
        foreach ($selectedItemIds as $itemId) {
            $stmt = $db->prepare("SELECT * FROM vintage_items WHERE idItem = ? AND idUser != ?");
            $stmt->bind_param("ii", $itemId, $_SESSION['idUser']);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <div class="col-sm-12 col-md-6  col-lg-4 mb-4">
                    <div class="card">
                        <a href="Object.php?id=<?= $row["idItem"] ?>" class="thumb-menu">
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
