<?php
session_start();
include "DB_Connection.php";
include "../html/head.html";
include "../html/header.html";
?>

<body>
    <div class="container">
        <section>
            <div class="row">
                <div class="col">
                    <div class="text-center">
                        <h1>La tua lista desideri</h1>
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
                                <button type="submit" class="btn btn-primary">Vai al tuo oggetto</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
                $i++;
            }
            echo '</div>';
            ?>
        </section>
    </div>
</body>
<?php include "../html/footer.html"; ?>

