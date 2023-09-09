<?php
session_start();
include "../html/head.html";
include "../html/header.html";
include "../php/DB_Connection.php";
include "../php/Check_Login.php";
?>

<body>
    <div class="container mt-5">
        <?php
        // Verifica se è stato fornito un ID valido
        if (isset($_GET["id"])) {
            $idItem = $_GET["id"];
            $stmt = $db->prepare("SELECT * FROM vintage_items WHERE idItem = ?");
            $stmt->bind_param("i", $idItem);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <section>
                    <div class="row">
                        <div class="col-md-12 text-center mb-4">
                            <h1><?= $row["nameItem"]; ?></h1>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-md-6">

                                <img src="<?= $row["imgPath"] ?>" alt="" class="img-fluid border border-dark">
                            </div>
                            <div class="col-md-6">
                                <div>
                                    <h3><span>Descrizione</span></h3>
                                    <p><?= $row["description"] ?></p>
                                </div>
                                <div>
                                    <h3><span>Prezzo</span></h3>
                                    <p>€<?= number_format($row["price"], 2) ?></p>


                                     <form method="get" action="../php/AddFavorite.php">
                                         <input type="hidden" name="addfavorite" value="<?= $row["idItem"] ?>">
                                         <button class="btn btn-primary" title="Aggiungi ai preferiti">Aggiungi alla Lista desideri</button>
                                     </form>

                                </div>
                            </div>
                        </div>
                    </section>
        <?php
                }
            } else {
                echo "Nessun oggetto trovato con questo ID.";
            }
            $stmt->close();
        } else {
            echo "ID dell'oggetto non fornito.";
        }
        ?>
    </div>
</body>

<?php include "../html/footer.html"; ?>

</html>
